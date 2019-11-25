<?php

namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;
use \Modelo\Veiculo;
use \Modelo\Cliente;
use \Modelo\Locacao;


class TesteRelatorios extends Teste
{
    public function testeIndex()
    {
        $this->logar();

        $resposta = $this->get(URL_RAIZ . 'relatorios');
        $this->verificarContem($resposta, 'RELATÓRIOS');
    }

    public function testeMonstrarReparos()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $this->post(URL_RAIZ . 'oficina', [
            'veiculo-oficina' => $veiculo->getChassi()
        ]);

        $resposta = $this->patch(URL_RAIZ . 'oficina/atualizar/' . $veiculo->getChassi(), [
            'id-reparo' => 1,
            'valor-reparo' => 100
        ]);

        $resposta = $this->get(URL_RAIZ . 'relatorio/veiculo', [
            'chassi-busca' => $veiculo->getChassi()
        ]);

        $this->verificarContem($resposta, 'Delorean');
    }
}
