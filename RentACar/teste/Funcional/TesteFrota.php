<?php

namespace Teste\Funcional;

use \Teste\Teste;
use \Framework\DW3BancoDeDados;
use \Modelo\Veiculo;

class TesteFrota extends Teste
{
    public function testeCriar()
    {
        $this->logar();

        $resposta = $this->get(URL_RAIZ . 'frota/criar');
        $this->verificarContem($resposta, 'Cadastro de Veículo');
    }

    public function testeEditar()
    {
        $this->logar();

        $resposta = $this->get(URL_RAIZ . 'frota/editar');
        $this->verificarContem($resposta, 'Atualizar dados do Veículo');
    }

    public function testeArmazenar()
    {
        $this->logar();

        $resposta = $this->post(URL_RAIZ . 'frota', [
            'chassi' => '0001',
            'montadora' => 'dmc',
            'modelo' => 'delorean',
            'categoriaId' => '1',
            'preco' => '50'
        ]);

        $this->verificarRedirecionar($resposta, URL_RAIZ . 'frota/criar');
        $resposta = $this->get(URL_RAIZ . 'frota/criar');

        $this->verificarContem($resposta, 'Veiculo cadastrado com sucesso!');
        $query = DW3BancoDeDados::query('SELECT * FROM veiculos WHERE chassi = "0001"');
        $bdVeiculos = $query->fetchAll();
        $this->verificar(count($bdVeiculos) == 1);
    }

    public function testeAtualizar()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $resposta = $this->patch(URL_RAIZ . 'frota/atualizar/' . $veiculo->getId(), [
            'montadora' => 'vw',
            'modelo' => 'delorean',
            'categoriaId' => '1',
            'precoDiaria' => '50'
        ]);

        $this->verificarRedirecionar($resposta, URL_RAIZ . 'frota/editar');
        $resposta = $this->get(URL_RAIZ . 'frota/editar');
        $this->verificarContem($resposta, 'Veículo atualizado com sucesso!');

        $query = DW3BancoDeDados::query('SELECT * FROM veiculos WHERE chassi = "0001"');
        $bdVeiculos = $query->fetchAll();
        $this->verificar(count($bdVeiculos) == 1);
    }

    public function testePesquisar()
    {
        $this->logar();

        $resposta = $this->post(URL_RAIZ . 'frota', [
            'chassi' => '0001',
            'montadora' => 'dmc',
            'modelo' => 'delorean',
            'categoriaId' => '1',
            'preco' => '50'
        ]);

        $resposta = $this->get(URL_RAIZ . 'frota/pesquisar', ['chassi-busca' => '0001']);
        $this->verificarContem($resposta, 'dmc');
        $this->verificarContem($resposta, 'delorean');
    }
}
