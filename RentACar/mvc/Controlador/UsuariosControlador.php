<?php

namespace Controlador;

use \Framework\DW3Sessao;
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

    public function pesquisar()
    {
        $cpf = $_POST['cpf-busca'];
        $usuario = Usuario::buscarRegistroUsuario(self::removerMascara($cpf));
        
        $this->visao('usuarios/atualizar.php', ['usuario' => $usuario], 'principal.php');
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

        $usuario->setPrimeiroNome(mb_strtolower($usuario->getPrimeiroNome(),'UTF-8'));
        $usuario->setSobrenome(mb_strtolower($usuario->getSobrenome(), 'UTF-8'));
        $usuario->setEmail(mb_strtolower($usuario->getEmail(), 'UTF-8'));

        if($usuario->isValido() && !Usuario::cpfExiste($usuario)){
            $usuario->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        }else{
            $this->setErros($usuario->getValidacaoErros());
            $this->visao('usuarios/criar.php',[],'principal.php');
        }
    }
}