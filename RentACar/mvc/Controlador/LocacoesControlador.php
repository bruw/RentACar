<?php
namespace Controlador;


class LocacoesControlador extends Controlador
{
    public function carrosDisponiveis()
    {
        $this->visao('locacoes/carros-disponiveis.php',[],'principal/principal.php');
    }

    public function devolucao()
    {
        $this->visao('locacoes/devolucao.php',[],'principal/principal.php');
    }
}
