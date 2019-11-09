<?php

namespace Controlador;

use \Modelo\Veiculo;

class FrotaControlador extends Controlador
{
    public function criar()
    {
        $this->visao('frota/criar.php',[],'principal.php');
    }

    public function atualizar()
    {
        $this->visao('frota/atualizar.php',[],'principal.php');
    }

    public function enviarOficina()
    {
        $this->visao('frota/enviar-oficina.php',[],'principal.php');
    }

    public function oficina()
    {
        $this->visao('frota/oficina.php',[],'principal.php');
    }

    public function armazenar()
    {
        $foto = array_key_exists('foto', $_FILES) ? $_FILES['foto'] : null;

        $veiculo = new Veiculo(
            $_POST['chassi'], 
            $_POST['montadora'], 
            $_POST['modelo'], 
            $_POST['categoria'],
            $_POST['preco'],
            $foto
        );


        $veiculo->setChassi(strtolower($veiculo->getChassi()));
        $veiculo->setMontadora(strtolower($veiculo->getMontadora()));
        $veiculo->setModelo(strtolower($veiculo->getModelo()));


        if($veiculo->isValido()){
            $veiculo->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        }else{
            $this->setErros($veiculo->getValidacaoErros());
            $this->visao('frota/criar.php',[],'principal.php');
        }
    }
}