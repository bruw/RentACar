<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Usuario extends Modelo
{
    const INSERIR = 'INSERT INTO usuarios(primeiro_nome, sobrenome, cpf, celular, email, cep, numero, senha) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    const BUSCAR_REGISTRO = 'SELECT * FROM usuarios WHERE cpf = ?';
    const BUSCAR_ID = 'SELECT id, cpf FROM usuarios WHERE id= ?';

    private $id;
    private $primeiroNome;
    private $sobrenome;
    private $cpf;
    private $celular;
    private $email;
    private $cep;
    private $numero;
    private $senha;
    private $senhaPlana;

    public function __construct(
        $primeiroNome,
        $sobrenome,
        $cpf,
        $celular,
        $email,
        $cep,
        $numero,
        $senhaPlana,
        $id = null
    ) {
        $this->primeiroNome = $primeiroNome;
        $this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->celular = $celular;
        $this->email = $email;
        $this->cep = $cep;
        $this->numero = $numero;
        $this->senhaPlana = $senhaPlana;
        $this->senha = password_hash($senhaPlana, PASSWORD_BCRYPT);
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

    public function verificarSenha($senhaPlana)
    {
        return password_verify($senhaPlana, $this->senha);
    }

    public function removerMascara($atributo)
    {
        $atributo = str_replace("(", "", $atributo);
        $atributo = str_replace(")", "", $atributo);
        $atributo = str_replace("-", "", $atributo);
        $atributo = str_replace(".", "", $atributo);

        return $atributo;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->primeiroNome);
        $comando->bindValue(2, $this->sobrenome);
        $comando->bindValue(3, $this->cpf);
        $comando->bindValue(4, $this->celular);
        $comando->bindValue(5, $this->email);
        $comando->bindValue(6, $this->cep);
        $comando->bindValue(7, $this->numero);
        $comando->bindValue(8, $this->senha);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function buscarRegistroUsuario($cpf)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_REGISTRO);
        $comando->bindValue(1, $cpf);
        $comando->execute();
        $registro = $comando->fetch();
        $usuario = null;
        
        if ($registro) {
            $usuario = new Usuario(
                $registro['primeiro_nome'],
                $registro['sobrenome'],
                $registro['cpf'],
                $registro['celular'],
                $registro['email'],
                $registro['cep'],
                $registro['numero'],
                null,
                $registro['id']
            );

            $usuario->senha = $registro['senha'];
        }

        return $usuario;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id);
        $comando->execute();
        $registro = $comando->fetch();
       
        return new Usuario(
            null,
            null,
            $registro['cpf'],
            null,
            null,
            null,
            null,
            $registro['id']
        );
    }

    public function cpfExiste($usuario)
    {
        $registroUsuario = self::buscarRegistroUsuario($usuario->getCpf());

        if ($registroUsuario !== null) {
            $usuario->setErroMensagem('cpf', 'Este CPF já consta em nossa base de dados...');
            return true;
        } else {
            return false;
        }
    }

    protected function verificarErros()
    {
        $patternPrimeiroNome = "/^([A-Z]|[a-z]){2,25}$/";
        $patternSobrenome = "/^(([A-Z]|[a-z]|[Á-Ú]|[á-ú]){2,25}(\s)?)+$/";
        $patternCpf = "/^[0-9]{11}$/";
        $patternCelular = "/^[0-9]{10,20}$/";
        $patternCep = "/^[0-9]{8}$/";
        $patternNumero = "/^[0-9]{1,5}$/";
        $patternSenha = "/^[0-9]{4,8}$/";

        if (strpos($this->email, "@") === false) {
            $this->setErroMensagem('email', 'Email Inválido... Faltou o @');
        }

        if (preg_match($patternPrimeiroNome, $this->primeiroNome) == false) {
            $this->setErroMensagem('primeiroNome', 'Primeiro nome não pode conter dígitos, ser vazio ou conter espaços');
        }

        if (preg_match($patternSobrenome, $this->sobrenome) == false) {
            $this->setErroMensagem('sobrenome', 'Sobrenome não pode conter dígitos ou ser vazio');
        }

        if (preg_match($patternCpf, $this->cpf) == false) {
            $this->setErroMensagem('cpf', 'Cpf deve possuir 11 dígitos sem letras');
        }

        if (preg_match($patternCelular, $this->celular) == false) {
            $this->setErroMensagem('celular', 'Celular deve possuir no mínimo 10 dígitos sem letras');
        }

        if (preg_match($patternCep, $this->cep) == false) {
            $this->setErroMensagem('cep', 'Cep deve possuir 8 dígitos');
        }

        if (preg_match($patternNumero, $this->numero) == false) {
            $this->setErroMensagem('numero', 'Número deve possuir no mínimo 1 e no máximo 5 dígitos ');
        }

        if (preg_match($patternSenha, $this->senhaPlana) == false) {
            $this->setErroMensagem('senha', 'Apenas números. Mínimo 4, máximo 8 dígitos. ');
        }
    }
}
