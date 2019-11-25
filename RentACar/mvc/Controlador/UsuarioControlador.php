<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Usuario;

class UsuarioControlador extends Controlador
{
    public function criar()
    {
        $this->verificarLogado();

        $mensagem = DW3Sessao::getFlash('mensagem');
        $this->visao('usuarios/criar.php', ['mensagem' => $mensagem], 'principal.php');
    }

    public function armazenar()
    {
        $this->verificarLogado();

        $usuario = new Usuario(
            $_POST['primeiro-nome'],
            $_POST['sobrenome'],
            $_POST['cpf'],
            $_POST['celular'],
            $_POST['email'],
            $_POST['cep'],
            $_POST['numero'],
            $_POST['senha']
        );

        $usuario->setCpf(Controlador::removerMascara($usuario->getCpf()));
        $usuario->setCelular(Controlador::removerMascara($usuario->getCelular()));
        $usuario->setCep(Controlador::removerMascara($usuario->getCep()));

        $usuario->setPrimeiroNome(mb_strtolower($usuario->getPrimeiroNome(), 'UTF-8'));
        $usuario->setSobrenome(mb_strtolower($usuario->getSobrenome(), 'UTF-8'));
        $usuario->setEmail(mb_strtolower($usuario->getEmail(), 'UTF-8'));

        if ($usuario->isValido() && !Usuario::cpfExiste($usuario)) {
            $usuario->salvar();
            DW3Sessao::setFlash('mensagem', 'Usuário cadastrado com sucesso!');

            $this->redirecionar(URL_RAIZ . 'usuarios/criar');
        } else {
            $this->setErros($usuario->getValidacaoErros());
            $this->visao('usuarios/criar.php', [], 'principal.php');
        }
    }
}
