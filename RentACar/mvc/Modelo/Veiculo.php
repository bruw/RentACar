<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;

class Veiculo extends Modelo
{
    const INSERIR = 'INSERT INTO veiculos(chassi, montadora, modelo, id_categoria, preco_diaria,
    status_oficina, status_locacao) VALUES (?, ?, ?, ?, ?, ?, ?)';

    private $chassi;
    private $montadora;
    private $modelo;
    private $idCategoria;
    private $precoDiaria;
    private $foto;
    private $statusOficina;
    private $statusLocacao;
    private $id;


    public function __construct(
        $chassi,
        $montadora,
        $modelo,
        $idCategoria = 1,
        $precoDiaria,
        $foto = null,
        $statusOficina = 0,
        $statusLocacao = 0,
        $id = null
    ) {
        $this->chassi =  $chassi;
        $this->montadora = $montadora;
        $this->modelo = $modelo;
        $this->idCategoria = $idCategoria;
        $this->precoDiaria = $precoDiaria;
        $this->statusOficina = $statusOficina;
        $this->statusLocacao =  $statusLocacao;
        $this->id = $id;
        $this->foto = $foto;
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
        $this->salvarImagem();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->chassi, PDO::PARAM_STR);
        $comando->bindValue(2, $this->montadora, PDO::PARAM_STR);
        $comando->bindValue(3, $this->modelo, PDO::PARAM_STR);
        $comando->bindValue(4, $this->idCategoria, PDO::PARAM_STR);
        $comando->bindValue(5, $this->precoDiaria, PDO::PARAM_STR);
        $comando->bindValue(6, $this->statusOficina, PDO::PARAM_STR);
        $comando->bindValue(7, $this->statusLocacao, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function getImagem()
    {
        $imagemNome = "{$this->id}.png";
        if (!DW3ImagemUpload::existe($imagemNome)) {
            $imagemNome = 'padrao.png';
        }
        return $imagemNome;
    }

    private function salvarImagem()
    {
        if (DW3ImagemUpload::isValida($this->foto)) {
            $nomeCompleto = PASTA_PUBLICO . "img/veiculos/{$this->id}.png";
            DW3ImagemUpload::salvar($this->foto, $nomeCompleto);
        }
    }

    protected function verificarErros()
    {
        $patternChassi = "/^([0-9]|[a-z]){4,17}$/";
        $patternPrecoDiaria = "/^[1-9]{1}([0-9]{1,2})?\.[0-9]{1,3}$/";

        if (preg_match($patternChassi, $this->chassi) == false) {
            $this->setErroMensagem('chassi', 'Deve conter no mínimo 4 e no máximo 17 caracteres');
        }

        if (preg_match($patternPrecoDiaria, $this->precoDiaria) == false) {
            $this->setErroMensagem('precoDiaria', 'Valor mínimo R$1.00 e Máximo R$999.999 (Usar "." ao invés de ",")');
        }
    }
}
