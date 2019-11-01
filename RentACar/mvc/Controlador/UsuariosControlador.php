<?php

namespace Controlador;

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
}