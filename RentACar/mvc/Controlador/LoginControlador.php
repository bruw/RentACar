<?php
namespace Controlador;

class LoginControlador extends Controlador
{
    public function index()
    {
        $this->visao('inicial/index.php',[],'Login/index.php');
    }
}