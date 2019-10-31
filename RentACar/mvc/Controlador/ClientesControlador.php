<?php 
namespace Controlador;

class ClientesControlador extends Controlador
{
    public function criar()
    {
        $this->visao('clientes/criar.php',[],'principal/principal.php');
    }

    public function atualizar()
    {
        $this->visao('clientes/atualizar.php',[],'principal/principal.php');
    }
}
