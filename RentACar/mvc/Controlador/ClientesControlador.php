<?php

namespace Controlador;

use \Modelo\Cliente;

class ClientesControlador extends Controlador
{
    public function criar()
    {
        $this->visao('clientes/criar.php', [], 'principal.php');
    }

    public function atualizar()
    {
        $this->visao('clientes/atualizar.php', [], 'principal.php');
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

        if($cliente->isValido()){
            $cliente->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        }else{
            $this->setErros($cliente->getValidacaoErros());
            $this->visao('clientes/criar.php',[],'principal.php');
        }
       
    }

    public function sucesso()
    {
        $this->visao('clientes/sucesso.php');
    }
}
