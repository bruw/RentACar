<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Locacao extends Modelo
{
    const INSERIR = 'INSERT INTO locacoes(data_locacao, data_prevista_entrega, total, 
    id_veiculo, id_cliente, status_locacao, data_devolucao, multa_atraso) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    const BUSCAR_ID = 'SELECT id FROM locacoes WHERE (id_cliente = ? AND status_locacao = 0)';
    const BUSCAR_REGISTRO = 'SELECT id, data_locacao, data_prevista_entrega, data_devolucao, multa_atraso,
    total, status_locacao, id_veiculo, id_cliente FROM locacoes WHERE id = ?';
    const ATUALIZAR = 'UPDATE locacoes SET data_devolucao = ?, multa_atraso = ?, total = ?, status_locacao = ? WHERE id = ?';

    private $id;
    private $dataLocacao;
    private $dataPrevistaEntrega;
    private $dataDevolucao;
    private $multaAtraso;
    private $total;
    private $statusLocacao;
    private $idVeiculo;
    private $idCliente;

    public function __construct(
        $dataLocacao,
        $dataPrevistaEntrega,
        $total,
        $idVeiculo,
        $idCliente,
        $statusLocacao = 0,
        $dataDevolucao = null,
        $multaAtraso = null,
        $id = null
    ) {
        $this->dataLocacao = $dataLocacao;
        $this->dataPrevistaEntrega = $dataPrevistaEntrega;
        $this->total = $total;
        $this->idVeiculo = $idVeiculo;
        $this->idCliente = $idCliente;
        $this->statusLocacao = $statusLocacao;
        $this->dataDevolucao = $dataDevolucao;
        $this->multaAtraso = $multaAtraso;
        $this->id = $id;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getDataLocacao()
    {
        return $this->dataLocacao;
    }

    public function setDataLocacao($data)
    {
        if($data == null){
            $this->dataLocacao = date('d-m-Y');
        }else{
            $this->dataLocacao = $data;
        }
        
    }

    public function getIdVeiculo()
    {
        return $this->idVeiculo;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getDataPrevistaEntrega()
    {
        return $this->dataPrevistaEntrega;
    }

    public function setDataPrevistaEntrega($dataPrevistaEntrega)
    {
        return $this->dataPrevistaEntrega = $dataPrevistaEntrega;
    }

    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    }

    public function setDataDevolucao($dataDevolucao)
    {
        return $this->dataDevolucao = $dataDevolucao;
    }

    public function getMultaAtraso()
    {
        return $this->multaAtraso;
    }

    public function setMultaAtraso($multaAtraso)
    {
        return $this->multaAtraso = $multaAtraso;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        return $this->total = $total;
    }

    public function getStatusLocacao()
    {
        return $this->statusLocacao;
    }

    public function setStatusLocacao($statusLocacao)
    {
        return $this->statusLocacao = $statusLocacao;
    }
    

    public function formatarDataBr($data)
    {
        $dataFormatada = date_format(date_create($data), 'd-m-Y');

        return $dataFormatada;
    }

    public function salvar()
    {
        if($this->id == null){
            $this->inserir();
        }else{
            $this->atualizar();
        }
       
    }

    public function removerMascara($atributo)
    {
        $atributo = str_replace("(", "", $atributo);
        $atributo = str_replace(")", "", $atributo);
        $atributo = str_replace("-", "", $atributo);
        $atributo = str_replace(".", "", $atributo);

        return $atributo;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id);
        $comando->execute();
        $registro = $comando->fetch();

        return new Locacao(
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            $registro['id']
        );
    }

    public static function buscarRegistro($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_REGISTRO);
        $comando->bindValue(1, $id);
        $comando->execute();
        $registro = $comando->fetch();

        return new Locacao(
            $registro['data_locacao'],
            $registro['data_prevista_entrega'],
            $registro['total'],
            $registro['id_veiculo'],
            $registro['id_cliente'],
            $registro['status_locacao'],
            $registro['data_devolucao'],
            $registro['multa_atraso'],
            $registro['id']
        );
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->dataLocacao);
        $comando->bindValue(2, $this->dataPrevistaEntrega);
        $comando->bindValue(3, $this->total);
        $comando->bindValue(4, $this->idVeiculo);
        $comando->bindValue(5, $this->idCliente);
        $comando->bindValue(6, $this->statusLocacao);
        $comando->bindValue(7, $this->dataDevolucao);
        $comando->bindValue(8, $this->multaAtraso);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->dataDevolucao);
        $comando->bindValue(2, $this->multaAtraso);
        $comando->bindValue(3, $this->total);
        $comando->bindValue(4, $this->statusLocacao);
        $comando->bindValue(5, $this->id);
        $comando->execute();
    }

    protected function verificarErros()
    {
        $dataAtual = date('d-m-Y');

        if (strtotime($this->dataPrevistaEntrega) < strtotime($dataAtual)) {
            $this->setErroMensagem('dataInferior', 'A data para devolução do veículo deve ser maior 
            ou igual a data atual...');
        }

        if ($this->dataPrevistaEntrega == null) {
            $this->setErroMensagem('dataInexistente', 'Informe uma data...');
        }
    }

}
