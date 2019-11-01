<?php

namespace Controlador;

class RelatoriosControlador extends Controlador
{
    public function relatorios()
    {
        $this->visao('relatorios/relatorios.php',[],'principal.php');
    }
}