<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Locacao extends Modelo
{
    const INSERIR = 'INSERT INTO locacoes(data_locacao, data_prevista_entrega, total, 
    id_veiculo, id_cliente, status_locacao, data_devolucao, multa_atraso) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    const BUSCAR_ID = 'SELECT id, id_veiculo, id_cliente FROM locacoes WHERE id= ?';

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

    public function setDataLocacao()
    {
        $this->dataLocacao = date('d-m-Y');
    }

    public function salvar()
    {
       $this->inserir();
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
            $registro['id_veiculo'],
            $registro['id_cliente'],
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

    protected function verificarErros()
    {
        $dataAtual = date('d-m-Y');

        if (strtotime($this->dataPrevistaEntrega) < strtotime($dataAtual)) {
            $this->setErroMensagem('dataInferior', 'A data para devolução do veículo deve ser maior 
            ou igual a data atual...');
        }

        if ($this->dataPrevistaEntrega === null) {
            $this->setErroMensagem('dataInexistente', 'Informe uma data...');
        }
    }

}
