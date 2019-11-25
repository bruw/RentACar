<?php

namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class LoginControlador extends Controlador
{
    public function index()
    {
        if (empty(DW3Sessao::get('usuario'))) {
            $this->visao('inicial/index.php', [], 'index.php');
        } else {
            $this->redirecionar(URL_RAIZ . 'locacoes');
        }
    }

    public function armazenar()
    {
        $usuario = Usuario::buscarRegistroUsuario(Controlador::removerMascara($_POST['cpf']));

        if ($usuario && $usuario->verificarSenha($_POST['senha'])) {
            DW3Sessao::set('usuario', $usuario->getId());
            $this->redirecionar(URL_RAIZ . 'locacoes');
        } else {
            $this->setErros(['login' => 'CPF ou Senha Inválida']);
            $this->visao('inicial/index.php');
        }
    }

    public function destruir()
    {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ);
    }
}
