<?php

namespace Controlador;

class FrotaControlador extends Controlador
{
    public function criar()
    {
        $this->visao('frota/criar.php',[],'principal/principal.php');
    }

    public function atualizar()
    {
        $this->visao('frota/atualizar.php',[],'principal/principal.php');
    }

    public function enviarOficina()
    {
        $this->visao('frota/enviar-oficina.php',[],'principal/principal.php');
    }

    public function oficina()
    {
        $this->visao('frota/oficina.php',[],'principal/principal.php');
    }
}