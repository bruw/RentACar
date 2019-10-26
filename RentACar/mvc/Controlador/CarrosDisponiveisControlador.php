<?php
namespace Controlador;


class CarrosDisponiveisControlador extends Controlador
{
    public function carros()
    {
        $this->visao('frota/carros-disponiveis.php',[],'veiculos-disponiveis/veiculos.php');
    }
}
