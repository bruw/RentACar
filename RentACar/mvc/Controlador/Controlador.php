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
            $usuarioId = DW3Sessao::get('usuario');
            if ($usuarioId == null) {
                return null;
            }
            $this->usuario = Usuario::buscarId($usuarioId);
        }
        return $this->usuario;
    }

    public static function removerMascara($atributo)
    {
        $atributo = str_replace("(", "", $atributo);
        $atributo = str_replace(")", "", $atributo);
        $atributo = str_replace("-", "", $atributo);
        $atributo = str_replace(".", "", $atributo);

        return $atributo;
    }
}
