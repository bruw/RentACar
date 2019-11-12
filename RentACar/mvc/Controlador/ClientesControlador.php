<?php

namespace Controlador;

use \Modelo\Cliente;

class ClientesControlador extends Controlador
{
    public function criar()
    {
        $this->visao('clientes/criar.php', [], 'principal.php');
    }

    public function editar()
    {  
        $this->visao('clientes/atualizar.php', [], 'principal.php');
    }

    public function pesquisar()
    {
        $cpf = $_POST['cpf-busca'];
        $cliente = Cliente::buscarCpf(self::removerMascara($cpf));
        
        $this->visao('clientes/atualizar.php', ['cliente' => $cliente], 'principal.php');
    }

    public function armazenar()
    {
        $cliente = new Cliente(
            $_POST['primeiroNome'],
            $_POST['sobrenome'],
            $_POST['cpf'],
            $_POST['celular'],
            $_POST['email'],
            $_POST['cep'],
            $_POST['numero']
        );

        $cliente->setCpf($cliente->removerMascara($cliente->getCpf()));
        $cliente->setCelular($cliente->removerMascara($cliente->getCelular()));
        $cliente->setCep($cliente->removerMascara($cliente->getCep()));

        $cliente->setPrimeiroNome(strtolower($cliente->getPrimeiroNome()));
        $cliente->setSobrenome(strtolower($cliente->getSobrenome()));
        $cliente->setEmail(strtolower($cliente->getEmail()));


        if($cliente->isValido() && !$cliente->isCpfExiste($cliente)){
                $cliente->salvar();
                $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        }else{
            $this->setErros($cliente->getValidacaoErros());
            $this->visao('clientes/criar.php',[],'principal.php');
        }
       
    }

    public function atualizar($id)
    {   
        $cliente = Cliente::buscarId($id);
        $cliente->setPrimeiroNome($_POST['primeiroNome']);
        $cliente->setSobrenome($_POST['sobrenome']);
        $cliente->setCpf($_POST['cpf']);
        $cliente->setCelular($_POST['celular']);
        $cliente->setEmail($_POST['email']);
        $cliente->setCep($_POST['cep']);
        $cliente->setNumero($_POST['numero']);

        $cliente->setPrimeiroNome(strtolower($cliente->getPrimeiroNome()));
        $cliente->setSobrenome(strtolower($cliente->getSobrenome()));
        $cliente->setEmail(strtolower($cliente->getEmail()));

        $cliente->setCpf($cliente->removerMascara($cliente->getCpf()));
        $cliente->setCelular($cliente->removerMascara($cliente->getCelular()));
        $cliente->setCep($cliente->removerMascara($cliente->getCep()));

        if($cliente->isValido()){
            $cliente->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        }else{
            $this->setErros($cliente->getValidacaoErros());
            $this->visao('clientes/atualizar.php',['cliente' => $cliente],'principal.php');
        }
       
        
    }

    //verificar se esta sendo usado nesta classe 
    public static function removerMascara($atributo)
    {
       $atributo = str_replace("(", "", $atributo);
       $atributo = str_replace(")", "", $atributo);
       $atributo = str_replace("-", "", $atributo);
       $atributo = str_replace(".", "", $atributo);
       
       return $atributo;
    }
}
