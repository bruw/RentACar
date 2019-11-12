<?php
namespace Controlador;

use \Framework\DW3Controlador;
use \Framework\DW3Sessao;
use \Modelo\Usuario;

abstract class Controlador extends DW3Controlador
{
    protected $usuario;

	protected function verificarLogado()
    {
        $usuario = $this->getUsuario();

        if ($usuario == null) {
        	$this->redirecionar(URL_RAIZ);
        }
    }

    protected function getUsuario()
    {
        if ($this->usuario == null) {
        	$usuario = DW3Sessao::get('usuario');
        }

        return $this->usuario;
    }
}
