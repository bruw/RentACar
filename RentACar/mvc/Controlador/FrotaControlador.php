<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Veiculo;

class FrotaControlador extends Controlador
{
    public function criar()
    {
        $this->visao('frota/criar.php', [], 'principal.php');
    }

    public function editar()
    {
        $this->visao('frota/atualizar.php', [], 'principal.php');
    }


    public function atualizar($id)
    {
        $veiculo = Veiculo::buscarId($id);

        if (empty($_POST['categoria'])) {
            $registroDoVeiculo = $veiculo->buscarRegistroVeiculo($veiculo->getChassi());
            $veiculo->setIdCategoria($registroDoVeiculo->getIdCategoria());
        } else {
            $veiculo->setIdCategoria($_POST['categoria']);
        }

        $veiculo->setMontadora($_POST['montadora']);
        $veiculo->setModelo($_POST['modelo']);
        $veiculo->setPrecoDiaria($_POST['precoDiaria']);

        $veiculo->setMontadora(mb_strtolower($veiculo->getMontadora(), 'UTF-8'));
        $veiculo->setModelo(mb_strtolower($veiculo->getModelo(), 'UTF-8'));

        if ($veiculo->isValido()) {
            $veiculo->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        } else {
            $this->setErros($veiculo->getValidacaoErros());
            $categoria = $veiculo->nomeCategoria($veiculo->getIdCategoria());
            $this->visao('frota/atualizar.php', ['veiculo' => $veiculo, 'categoria' => $categoria], 'principal.php');
        }
    }

    public function pesquisar()
    {
        $chassi = $_POST['chassi-busca'];
        $veiculo = Veiculo::buscarRegistroVeiculo(self::removerMascara($chassi));
        $categoria = $veiculo->nomeCategoria($veiculo->getIdCategoria());

        $this->visao('frota/atualizar.php', ['veiculo' => $veiculo, 'categoria' => $categoria], 'principal.php');
    }

    public function enviarOficina()
    {
        $this->visao('frota/enviar-oficina.php', [], 'principal.php');
    }

    public function oficina()
    {
        $this->visao('frota/oficina.php', [], 'principal.php');
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


        $veiculo->setChassi(mb_strtolower($veiculo->getChassi(), 'UTF-8'));
        $veiculo->setMontadora(mb_strtolower($veiculo->getMontadora(), 'UTF-8'));
        $veiculo->setModelo(mb_strtolower($veiculo->getModelo(), 'UTF-8'));

        if ($veiculo->isValido() && !Veiculo::chassiExiste($veiculo)) {
            $veiculo->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        } else {
            $this->setErros($veiculo->getValidacaoErros());
            $this->visao('frota/criar.php', ['veiculo' => $veiculo], 'principal.php');
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
