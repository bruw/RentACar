<?php

namespace Controlador;

use Framework\DW3Sessao;
use \Modelo\Veiculo;
use \Modelo\Locacao;
use \Modelo\Reparo;

class RelatoriosControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();

        $this->visao(
            'relatorios/index.php',
            [
                'naoEncontrado' => DW3Sessao::getFlash('naoEncontrado'),
                'naoPossuiMovimentacao' => DW3Sessao::getFlash('naoPossuiMovimentacao')
            ],
            'principal.php'
        );
    }

    public function mostrarReparos()
    {
        $this->verificarLogado();

        $chassi = $_GET['chassi-busca'];
        $veiculo = Veiculo::buscarRegistroVeiculo($chassi);

        if ($veiculo->getChassi() !== null) {
            $locacoes = Veiculo::buscarLocacoesFinalizadas($chassi);
            $totalLocacoes = 0;


            foreach ($locacoes as $locacao) {
                $totalLocacoes += $locacao->getTotal();
            }

            $reparos = Veiculo::buscarReparosFinalizados($chassi);
            $totalReparos = 0;

            foreach ($reparos as $reparo) {
                $totalReparos += $reparo->getTotal();
            }

            if (($totalLocacoes == 0) && ($totalReparos == 0)) {
                DW3Sessao::setFlash('naoPossuiMovimentacao', 'Este veículo ainda não possui registros 
                de locação e manutenção');

                $this->redirecionar(URL_RAIZ . 'relatorios');
            } else {
                $lucro = $totalLocacoes - $totalReparos;

                $this->visao(
                    'relatorios/index.php',
                    [
                        'veiculo' => $veiculo,
                        'locacoes' => $locacoes,
                        'totalLocacao' => $totalLocacoes,
                        'reparos' => $reparos,
                        'totalReparos' => $totalReparos,
                        'lucro' => $lucro
                    ],
                    'principal.php'
                );
            }
        } else {
            DW3Sessao::setFlash('naoEncontrado', 'Veículo inexistente em nossa base de dados...');
            $this->redirecionar(URL_RAIZ . 'relatorios');
        }
    }

    public function mostrarBalanco()
    {
        $this->verificarLogado();

        $dataInicio =  date_format(date_create($_GET['data-inicio']), 'Y-m-d');
        $dataFim = date_format(date_create($_GET['data-fim']), 'Y-m-d');
        $relatorioSelecionado = $_GET['relatorio-selecionado'];

        if (strtotime($dataInicio) <= strtotime($dataFim)) {
            $totalLocacoes = Locacao::totalLocacoes($dataInicio, $dataFim);
            $totalLocacoes = $totalLocacoes[0];

            $totalReparos = Reparo::totalReparos($dataInicio, $dataFim);
            $totalReparos = $totalReparos[0];

            if (($totalReparos === null) && ($totalLocacoes === null)) {
                $naoExisteRegistro = 'Não existe registros para o período informado...';

                $this->visao(
                    'relatorios/index.php',
                    [
                        'naoExisteRegistro' => $naoExisteRegistro,
                        'relatorioSelecionado' => $relatorioSelecionado
                    ],
                    'principal.php'
                );
            } else {
                if ($totalLocacoes === null) {
                    $lucroEmpresa = $totalReparos * -1;
                    $totalLocacoes = 0;
                } else {
                    if ($totalReparos === null) {
                        $lucroEmpresa = $totalLocacoes;
                        $totalReparos = 0;
                    } else {
                        $lucroEmpresa = $totalLocacoes - $totalReparos;
                    }
                }

                $this->visao(
                    'relatorios/index.php',
                    [
                        'dataInicio' => $dataInicio,
                        'dataFim' => $dataFim,
                        'totalLocacoes' => $totalLocacoes,
                        'totalReparos'  => $totalReparos,
                        'lucroEmpresa' => $lucroEmpresa,
                        'relatorioSelecionado' => $relatorioSelecionado,
                        'exibirBalanco' => 'exibirBalanco'

                    ],
                    'principal.php'
                );
            }
        } else {
            $dataInferior = 'Data de ínicio deve ser menor do que data de fim...';

            $this->visao(
                'relatorios/index.php',
                [
                    'relatorioSelecionado' => $relatorioSelecionado,
                    'dataInferior' => $dataInferior
                ],
                'principal.php'
            );
        }
    }
}
