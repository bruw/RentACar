<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Veiculo extends Modelo
{
    const INSERIR = 'INSERT INTO veiculos(chassi, montadora, modelo, id_categoria, preco_diaria, descricao, 
    status_oficina, status_locacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

    private $chassi; 
    private $montadora; 
    private $modelo;
    private $precoDiaria; 
    private $descricao;
    private $statusOficina; 
    private $statusLocacao;
    private $foto;
    private $id;
    private $idCategoria; 

    public function __construct(
    $chassi, 
    $montadora,
    $modelo,
    $precoDiaria, 
    $descricao,
    $statusOficina = 0,
    $statusLocacao = 0,
    $foto = null,
    $id = null,
    $idCategoria = 1
    ) { 
        $this->chassi=  $chassi;
        $this->montadora = $montadora;
        $this->modelo = $modelo;
        $this->precoDiaria = $precoDiaria;
        $this->descricao = $descricao;
        $this->statusOficina = $statusOficina;
        $this->statusLocacao =  $statusLocacao;
        $this->foto = $foto;
        $this->id = $id;
        $this->idCategoria = $idCategoria;
    }

    public function getId()
    {
        return $this->id;
    }
   
    public function getIdCategoria()
    {
        return $this->id;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function getChassi()
    {
        return $this->chassi;
    }

    public function setChassi($chassi)
    {
        $this->chassi = $chassi;
    }

    public function getMontadora()
    {
        return $this->montadora;
    }

    public function setMontadora($montadora)
    {
        $this->montadora = $montadora;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getPrecoDiaria()
    {
        return $this->precoDiaria;
    }

    public function setPrecoDiaria($precoDiaria)
    {
        $this->precoDiaria = $precoDiaria;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getStatusOficina()
    {
        return $this->statusOficina;
    }

    public function setStatusOficina($statusOficina)
    {
        $this->statusOficina = $statusOficina;
    }

    public function getStatusLocacao()
    {
        return $this->statusLocacao;
    }

    public function setStatusLocacao($statusLocacao)
    {
        $this->statusLocacao = $statusLocacao;
    }

    public function salvar()
    {
        $this->inserir();
    }

    /*
    private function salvarImagem()
    {
        if (DW3ImagemUpload::isValida($this->foto)) {
            $nomeCompleto = PASTA_PUBLICO . "img/veiculos{$this->id}.png";
            DW3ImagemUpload::salvar($this->foto, $nomeCompleto);
        }
    }
    */
    
    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->chassi, PDO::PARAM_STR);
        $comando->bindValue(2, $this->montadora, PDO::PARAM_STR);
        $comando->bindValue(3, $this->modelo, PDO::PARAM_STR);
        $comando->bindValue(4, $this->idCategoria, PDO::PARAM_STR);
        $comando->bindValue(5, $this->precoDiaria, PDO::PARAM_STR);
        $comando->bindValue(6, $this->descricao, PDO::PARAM_STR);
        $comando->bindValue(7, $this->statusOficina, PDO::PARAM_STR);
        $comando->bindValue(8, $this->statusLocacao, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }
}