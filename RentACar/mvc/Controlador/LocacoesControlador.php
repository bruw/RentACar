<?php

namespace Controlador;

use Framework\DW3Sessao;
use Modelo\Cliente;
use Modelo\Veiculo;
use Modelo\Locacao;


class LocacoesControlador extends Controlador
{
    public function carrosDisponiveis()
    {
        $veiculo = Veiculo::buscarRegistroVeiculo(0001);
        $veiculo2 = Veiculo::buscarRegistroVeiculo(0002);
        $sucesso = DW3Sessao::getFlash('locacaoSucesso');

        $this->visao('locacoes/carros-disponiveis.php', [
            'veiculo' => $veiculo,
            'veiculo2' => $veiculo2, 'sucesso' => $sucesso], 'principal.php');
    }


    public function criar($chassi)
    {
        $veiculo = Veiculo::buscarRegistroVeiculo($chassi);
        $this->visao('locacoes/criar.php', ['veiculo' => $veiculo], 'principal.php');
    }

    public function pesquisar($chassi)
    {
        $veiculo = Veiculo::buscarRegistroVeiculo($chassi);

        $cpf = $_GET['cpf-busca'];
        $cliente = Cliente::buscarRegistroCliente(self::removerMascara($cpf));

        if ($cliente->getCpf() == null) {
            $naoEncontrado = 'Cliente inexistente em nossa base de dados';

            $this->visao(
                'locacoes/criar.php',
                [
                    'veiculo' => $veiculo,
                    'naoEncontrado' => $naoEncontrado
                ],
                'principal.php'
            );
        } else {
            $this->visao(
                'locacoes/criar.php',
                [
                    'veiculo' => $veiculo,
                    'cliente' => $cliente
                ],
                'principal.php'
            );
        }
    }

    public function armazenar()
    {

        $dataAtual = date('Y-m-d');
        $dataPrevistaEntrega = date_format(date_create($_POST['dataPrevistaEntrega']), 'Y-m-d');

        $total = $_POST['total'];
        $idVeiculo = $_POST['veiculo'];
        $idCliente = $_POST['cliente'];

        $locacao = new Locacao(
            $dataAtual,
            $dataPrevistaEntrega,
            $total,
            $idVeiculo,
            $idCliente
        );

        if ($locacao->isValido() && (floatval($total) != null)) {
            $locacao->salvar();

            DW3Sessao::setFlash('locacaoSucesso', 'Locação realizada com Sucesso!');

            $this->redirecionar('locacoes/carros-disponiveis');
        } else {
            $veiculo = Veiculo::buscarId($_POST['veiculo']);
            $veiculo = Veiculo::buscarRegistroVeiculo($veiculo->getChassi());

            $cliente = Cliente::buscarId($_POST['cliente']);
            $cliente = Cliente::buscarRegistroCliente($cliente->getCpf());

            $totalNulo = 'Nenhuma data para devolução foi selecioanda....';
           
            $this->setErros($locacao->getValidacaoErros());
            $this->visao('locacoes/criar.php', 
            ['veiculo' => $veiculo, 
            'cliente' => $cliente,
            'totalNulo' => $totalNulo], 
            'principal.php');
        }
    }

    public function calcularTotal($chassi, $cpfCliente)
    {
        $cliente = Cliente::buscarRegistroCliente($cpfCliente);
        $veiculo = Veiculo::buscarRegistroVeiculo($chassi);
        $diaria = $veiculo->getPrecoDiaria();
        $dataAtual = date('Y-m-d');
        $dataAtual = date('Y-m-d', strtotime('-1 day', strtotime($dataAtual)));
        $dataPrevistaEntrega = date_format(date_create($_GET['dataPrevistaEntrega']), 'Y-m-d');

        if (strtotime($dataPrevistaEntrega) >= strtotime($dataAtual)) {
            $totalSegundos = strtotime($dataPrevistaEntrega) - strtotime($dataAtual);
            $totalDias = (int) ceil($totalSegundos / (60 * 60 * 24));
            $valorTotal = $totalDias * $diaria;

            $this->visao(
                'locacoes/criar.php',
                [
                    'veiculo' => $veiculo,
                    'cliente' => $cliente,
                    'valorTotal' => $valorTotal
                ],
                'principal.php'
            );
        } else {
            $this->visao(
                'locacoes/criar.php',
                [
                    'veiculo' => $veiculo,
                    'cliente' => $cliente
                ],
                'principal.php'
            );
        }
    }

    public function devolucao()
    {
        $this->visao('locacoes/devolucao.php', [], 'principal.php');
    }

    public static function removerMascara($atributo)
    {
        $atributo = str_replace("(", "", $atributo);
        $atributo = str_replace(")", "", $atributo);
        $atributo = str_replace("-", "", $atributo);
        $atributo = str_replace(".", "", $atributo);

        return $atributo;
    }
}
