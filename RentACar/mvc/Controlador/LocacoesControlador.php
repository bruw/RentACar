<?php
namespace Controlador;

use Modelo\Veiculo;

class LocacoesControlador extends Controlador
{
    public function carrosDisponiveis()
    {
        $veiculo = Veiculo::buscarRegistroVeiculo(0001);
        $this->visao('locacoes/carros-disponiveis.php',['veiculo' => $veiculo],'principal.php');
    }

    public function devolucao()
    {
        $this->visao('locacoes/devolucao.php',[],'principal.php');
    }
}
