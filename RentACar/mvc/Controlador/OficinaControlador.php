<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Veiculo;
use \Modelo\Reparo;

class OficinaControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $reparos = Reparo::buscarTodos();
        $veiculos = [];

        foreach($reparos as $reparo){
                $idVeiculo = $reparo->getIdVeiculo();
                $idVeiculo = Veiculo::buscarId($idVeiculo);
                $veiculo = Veiculo::buscarRegistroVeiculo($idVeiculo->getChassi());
                $veiculos [] = $veiculo;
        }

        $this->visao('oficina/index.php', 
        ['veiculos' => $veiculos,
        'reparos' => $reparos,
        'reparoFinalizado' => DW3Sessao::getFlash('reparoFinalizado')],
        'principal.php');
    }

    public function enviarOficina()
    {
        $this->verificarLogado();

        $this->visao(
            'oficina/enviar-oficina.php',
            [
                'naoEncontrado' => DW3Sessao::getFlash('naoEncontrado'),
                'estaLocado' => DW3Sessao::getFlash('estaLocado'),
                'estaNaOficina' => DW3Sessao::getFlash('estaNaOficina'),
                'sucesso' => DW3Sessao::getFlash('sucesso')
            ],
            'principal.php'
        );
    }

    public function armazenar()
    {   
        $this->verificarLogado();

        $chassi = $_POST['veiculo-oficina'];
        $veiculo = Veiculo::buscarRegistroVeiculo($chassi);
        $statusOficina = 1;
        $veiculo->setStatusOficina($statusOficina);

        $reparo = new Reparo(
            date('Y-m-d'),
            null,
            null,
            $veiculo->getId()
        );

        $veiculo->salvar();
        $reparo->salvar();

        DW3Sessao::setFlash('sucesso', 'Veiculo enviado para Oficina!');
        $this->redirecionar(URL_RAIZ . 'oficina/enviar-oficina');
    }

    public function atualizar($chassi)
    {   
        $this->verificarLogado();

        $statusOficina = 0;
        $statusReparo = 1;

        $veiculo = Veiculo::buscarRegistroVeiculo($chassi);
       
        $veiculo->setStatusOficina($statusOficina);
        
        $idReparo = $_POST['id-reparo'];
        $reparo = Reparo::buscarRegistroReparo($idReparo);
        $dataSaida = date('Y-m-d');
        $total = $_POST['valor-reparo'];

        $reparo->setDataSaida($dataSaida);
        $reparo->setTotal($total);
        $reparo->setStatusReparo($statusReparo);

        if($reparo->isValido()){
            $veiculo->salvar();
            $reparo->salvar();
            DW3Sessao::setFlash('reparoFinalizado', 'Reparo finalizado!');

            $this->redirecionar(URL_RAIZ . 'oficina');
        }
        else {
            $this->setErros($reparo->getValidacaoErros());
            $inputErro = $chassi;

            $reparos = Reparo::buscarTodos();
            $veiculos = [];
    
            foreach($reparos as $reparo){
                    $idVeiculo = $reparo->getIdVeiculo();
                    $idVeiculo = Veiculo::buscarId($idVeiculo);
                    $veiculo = Veiculo::buscarRegistroVeiculo($idVeiculo->getChassi());
                    $veiculos [] = $veiculo;
            }
            
            $this->visao('oficina/index.php',[
                'inputErro' =>  $inputErro,
                'reparos' => $reparos,
                'veiculos' => $veiculos,
            ],'principal.php');
        }
    }

    public function pesquisar()
    {
        $this->verificarLogado();
        
        $chassi = $_GET['chassi-busca'];
        $veiculo = Veiculo::buscarRegistroVeiculo(self::removerMascara($chassi));

        if ($veiculo->getChassi() == null) {
            DW3Sessao::setFlash('naoEncontrado', 'Este veículo não existe em nossa base de dados...');
            $this->redirecionar(URL_RAIZ . 'oficina/enviar-oficina');
        } else {
            if ($veiculo->getStatusOficina() == 1) {
                DW3Sessao::setFlash('estaNaOficina', 'Este veículo já está na oficina');
                $this->redirecionar(URL_RAIZ . 'oficina/enviar-oficina');
            } else {
                if ($veiculo->getStatusLocacao() == 1) {
                    DW3Sessao::setFlash('estaLocado', 'Este veículo está alugado...');
                    $this->redirecionar(URL_RAIZ . 'oficina/enviar-oficina');
                } else {
                    $this->visao(
                        'oficina/enviar-oficina.php',
                        ['veiculo' => $veiculo],
                        'principal.php'
                    );
                }
            }
        }
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
