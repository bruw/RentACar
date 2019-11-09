<?php

namespace Controlador;

use \Modelo\Usuario;

class UsuariosControlador extends Controlador
{
    public function criar()
    {
        $this->visao('usuarios/criar.php',[],'principal.php');
    }

    public function atualizar()
    {
        $this->visao('usuarios/atualizar.php',[],'principal.php');
    }

    public function armazenar()
    {
        $usuario = new Usuario(
            $_POST['primeiroNome'],
            $_POST['sobrenome'],
            $_POST['cpf'],
            $_POST['celular'],
            $_POST['email'],
            $_POST['cep'],
            $_POST['numero'],
            $_POST['senha']
        );

        $usuario->setCpf($usuario->removerMascara($usuario->getCpf()));
        $usuario->setCelular($usuario->removerMascara($usuario->getCelular()));
        $usuario->setCep($usuario->removerMascara($usuario->getCep()));

        $usuario->setPrimeiroNome(strtolower($usuario->getPrimeiroNome()));
        $usuario->setSobrenome(strtolower($usuario->getSobrenome()));
        $usuario->setEmail(strtolower($usuario->getEmail()));

        if($usuario->isValido()){
            $usuario->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        }else{
            $this->setErros($usuario->getValidacaoErros());
            $this->visao('usuarios/criar.php',[],'principal.php');
        }
    }
}