<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Reparo extends Modelo
{
    const INSERIR = 'INSERT INTO reparos(id_veiculo, data_entrada, status_reparo) VALUES (?, ?, ?)';
    const ATUALIZAR = 'UPDATE reparos SET data_saida = ?, total = ?, status_reparo = ?  WHERE id = ?';
    const BUSCAR_ID = 'SELECT id FROM reparos WHERE id = ?';
    const BUSCAR_REGISTRO = 'SELECT * FROM reparos WHERE id = ?';
    const BUSCAR_TODOS = 'SELECT * FROM reparos WHERE status_reparo = 0 ORDER BY data_entrada DESC';
    const TOTAL_REPAROS = 'SELECT SUM(total) FROM reparos WHERE status_reparo = 1 AND (data_entrada >= ?) AND (data_saida <= ?)';

    private $idVeiculo;
    private $id;
    private $dataEntrada;
    private $dataSaida;
    private $total;
    private $statusReparo;

    public function __construct(
        $dataEntrada,
        $dataSaida,
        $total = null,
        $idVeiculo,
        $statusReparo = 0,
        $id = null


    ) {
        $this->dataEntrada =  $dataEntrada;
        $this->dataSaida = $dataSaida;
        $this->total = $total;
        $this->idVeiculo = $idVeiculo;
        $this->statusReparo = $statusReparo;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdVeiculo()
    {
        return $this->idVeiculo;
    }

    public function setIdVeiculo($idVeiculo)
    {
        $this->idVeiculo = $idVeiculo;
    }

    public function getStatusReparo()
    {
        return $this->reparo;
    }

    public function setStatusReparo($statusReparo)
    {
        $this->statusReparo = $statusReparo;
    }

    public function getdataEntrada()
    {
        return $this->dataEntrada;
    }

    public function set($dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;
    }

    public function getDataSaida()
    {
        return $this->dataSaida;
    }

    public function setDataSaida($dataSaida)
    {
        $this->dataSaida = $dataSaida;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }


    public function salvar()
    {
        if ($this->id == null) {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->idVeiculo);
        $comando->bindValue(2, $this->dataEntrada);
        $comando->bindValue(3, $this->statusReparo);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->dataSaida);
        $comando->bindValue(2, $this->total);
        $comando->bindValue(3, $this->statusReparo);
        $comando->bindValue(4, $this->id);
        $comando->execute();
    }


    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id);
        $comando->execute();
        $registro = $comando->fetch();

        return new Reparo(
            null,
            null,
            null,
            null,
            null,
            $registro['id']
        );
    }

    public static function buscarRegistroReparo($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_REGISTRO);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();

        return new Reparo(
            $registro['data_entrada'],
            $registro['data_saida'],
            $registro['total'],
            $registro['id_veiculo'],
            $registro['status_reparo'],
            $registro['id']
        );
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);

        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Reparo(
                $registro['data_entrada'],
                $registro['data_saida'],
                $registro['total'],
                $registro['id_veiculo'],
                $registro['status_reparo'],
                $registro['id']
            );
        }

        return $objetos;
    }

    public static function totalReparos($dataInicio, $dataFim)
    {
        $comando = DW3BancoDeDados::prepare(self::TOTAL_REPAROS);
        $comando->bindValue(1, $dataInicio);
        $comando->bindValue(2, $dataFim);
        $comando->execute();
        $registro = $comando->fetch();
      
        return $registro;
    }


    protected function verificarErros()
    {
        $patternTotalManutencao = "/^[1-9]{1}\d{1,4}$/";

       if (preg_match($patternTotalManutencao, $this->total) == false) {
            $this->setErroMensagem('totalReparo', 'Valor mínimo R$10 e máximo R$99999. Não usar 
            "." ponto ou "," virgula...');
        }

    }
}
