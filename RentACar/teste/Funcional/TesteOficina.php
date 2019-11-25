<?php

namespace Teste\Funcional;

use \Teste\Teste;
use \Modelo\Veiculo;
use \Modelo\Reparo;

class TesteOficina extends Teste
{
    public function testeIndex()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $this->post(URL_RAIZ . 'oficina', [
            'veiculo-oficina' => $veiculo->getChassi()
        ]);

        $resposta = $this->get(URL_RAIZ . 'oficina');
        $this->verificarContem($resposta, 'Veículos na Oficina');
    }

    public function testeEnviarOficina()
    {
        $this->logar();

        $resposta = $this->get(URL_RAIZ . 'oficina/enviar-oficina');
        $this->verificarContem($resposta, 'Enviar veículo para oficina');
    }

    public function testeArmazenar()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $resposta = $this->post(URL_RAIZ . 'oficina', [
            'veiculo-oficina' => $veiculo->getChassi()
        ]);

        $this->verificarRedirecionar($resposta, URL_RAIZ . 'oficina/enviar-oficina');
        $resposta = $this->get(URL_RAIZ . 'oficina/enviar-oficina');
        $this->verificarContem($resposta, 'Veiculo enviado para Oficina!');
    }

    public function testeAtualizar()
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

        $this->verificarRedirecionar($resposta, URL_RAIZ . 'oficina');
        $resposta = $this->get(URL_RAIZ . 'oficina');
        $this->verificarContem($resposta, 'Reparo finalizado!');
    }

    public function testePesquisar()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $this->post(URL_RAIZ . 'oficina', [
            'veiculo-oficina' => $veiculo->getChassi()
        ]);

        $resposta = $this->get(URL_RAIZ . 'oficina/pesquisar', ['chassi-busca' => '0001']);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'oficina/enviar-oficina');
        $resposta = $this->get(URL_RAIZ . 'oficina/enviar-oficina');
        $this->verificarContem($resposta, 'Este veículo já está na oficina');
    }
}
