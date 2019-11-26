<?php

namespace Teste\Funcional;

use \Teste\Teste;
use \Modelo\Locacao;
use \Modelo\Veiculo;
use \Modelo\Cliente;
use \Controlador\LocacaoControlador;

class TesteLocacoes extends Teste
{
    public function testeIndex()
    {
        $this->logar();

        $resposta = $this->get(URL_RAIZ . 'locacoes');
        $this->verificarContem($resposta, 'Nenhum Veículo Disponível...');
    }

    public function testeCriar()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $resposta = $this->get(URL_RAIZ . 'locacoes/criar/' . $veiculo->getChassi());
        $this->verificarContem($resposta, 'Novo pedido de Locação');
    }

    public function testeClienteExiste()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $cliente = new Cliente(
            'creiton',
            'olavo',
            '00000000001',
            '42000000000',
            'creito@creito.com',
            '85000000',
            '7'
        );

        $cliente->salvar();

        $resposta = $this->get(
            URL_RAIZ . 'locacoes/cliente-existe/' . $veiculo->getChassi(),
            ['cpf-busca' => '00000000001']
        );

        $this->verificarContem($resposta, 'Creiton');
    }

    public function testeExisteLocacaoCliente()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $cliente = new Cliente(
            'creiton',
            'olavo',
            '00000000001',
            '42000000000',
            'creito@creito.com',
            '85000000',
            '7'
        );
        $cliente->salvar();


        $locacao = new Locacao('2019-11-25', '2019-11-26', 0, 1, 1, 1, null, 0);
        $locacao->salvar();

        $resposta = $this->get(
            URL_RAIZ . 'locacoes/existe-locacao-cliente',
            ['cpf-busca' => '00000000001']
        );

        $this->verificarContem($resposta, 'creiton');
    }

    public function testeArmazenar()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $cliente = new Cliente(
            'creiton',
            'olavo',
            '00000000001',
            '42000000000',
            'creito@creito.com',
            '85000000',
            '7'
        );
        $cliente->salvar();

        $resposta = $this->post(URL_RAIZ . 'locacoes', [
            'dataPrevistaEntrega' => '2019-11-26',
            'total' => '200',
            'veiculo' => 1,
            'cliente' => 1
        ]);

        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacoes');
        $resposta = $this->get(URL_RAIZ . 'locacoes');

        $this->verificarContem($resposta, 'Locação realizada com Sucesso!');
    }

    public function testeCalcularMultaAtraso()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $cliente = new Cliente(
            'creiton',
            'olavo',
            '00000000001',
            '42000000000',
            'creito@creito.com',
            '85000000',
            '7'
        );
        $cliente->salvar();

        $locacao = new Locacao('2019-11-22', '2019-11-24', 0, 1, 1, 1, null, 0);
        $locacao->salvar();

        $multaAtraso = LocacaoControlador::calcularMultaAtraso($locacao, $veiculo);

        $totalSegundos = strtotime(date('Y-m-d')) - strtotime(date('2019-11-24'));
        $diasAtraso = (int) ceil($totalSegundos / (60 * 60 * 24));

        $total = $diasAtraso * ($veiculo->getPrecoDiaria() * 1.20);

        $this->verificar($multaAtraso == $total);
    }

    public function testeEditar()
    {
        $this->logar();

        $veiculo = new Veiculo('0001', 'dmc', 'delorean', '1', '50');
        $veiculo->salvar();

        $cliente = new Cliente(
            'creiton',
            'olavo',
            '00000000001',
            '42000000000',
            'creito@creito.com',
            '85000000',
            '7'
        );
        $cliente->salvar();

        $locacao = new Locacao('2019-11-22', '2019-11-24', 0, 1, 1, 1, null, 0);
        $locacao->salvar();

        $resposta = $this->patch(URL_RAIZ . 'locacoes/1/editar', [
            'dataPrevistaEntrega' => '2019-11-27'
        ]);
        
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacoes/devolucao');
        $resposta = $this->get(URL_RAIZ . 'locacoes/devolucao');
        $this->verificarContem($resposta, 'Devolução realizada com sucesso!');
    }
}
