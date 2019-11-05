<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Cliente extends Modelo
{
    const INSERIR = 'INSERT INTO clientes(primeiro_nome, sobrenome, cpf, celular, email, cep, numero) 
    VALUES (?, ?, ?, ?, ?, ?, ?)';

    private $id;
    private $primeiroNome;
    private $sobrenome;
    private $cpf;
    private $celular;
    private $email;
    private $cep;
    private $numero;

    public function __construct(
        $primeiroNome,
        $sobrenome,
        $cpf,
        $celular,
        $email,
        $cep,
        $numero,
        $id = null
    ) {
        $this->primeiroNome = $primeiroNome;
        $this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->celular = $celular;
        $this->email = $email;
        $this->cep = $cep;
        $this->numero = $numero;
        $this->id = $id;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getPrimeiroNome()
    {
        return $this->primeiroNome;
    }

    public function setPrimeiroNome($primeiroNome)
    {
        $this->primeiroNome = $primeiroNome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
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

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->primeiroNome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->sobrenome, PDO::PARAM_STR);
        $comando->bindValue(3, $this->cpf, PDO::PARAM_STR);
        $comando->bindValue(4, $this->celular, PDO::PARAM_STR);
        $comando->bindValue(5, $this->email, PDO::PARAM_STR);
        $comando->bindValue(6, $this->cep, PDO::PARAM_STR);
        $comando->bindValue(7, $this->numero, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }
}
