<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Veiculo;
use \Modelo\Categoria;

class FrotaControlador extends Controlador
{
    public function criar()
    {
        $this->verificarLogado();

        $this->visao(
            'frota/criar.php',
            [
                'mensagem' => DW3Sessao::getFlash('mensagem'),
                'categorias' => Categoria::buscarTodos()
            ],
            'principal.php'
        );
    }

    public function editar()
    {
        $this->verificarLogado();

        $this->visao(
            'frota/atualizar.php',
            [
                'mensagem' => DW3Sessao::getFlash('mensagem'),
                'naoEncontrado' => DW3Sessao::getFlash('naoEncontrado')
            ],
            'principal.php'
        );
    }

    public function armazenar()
    {
        $this->verificarLogado();

        $foto = array_key_exists('foto', $_FILES) ? $_FILES['foto'] : null;

        $veiculo = new Veiculo(
            $_POST['chassi'],
            $_POST['montadora'],
            $_POST['modelo'],
            $_POST['categoriaId'],
            $_POST['preco'],
            $foto
        );


        $veiculo->setChassi(mb_strtolower($veiculo->getChassi(), 'UTF-8'));
        $veiculo->setMontadora(mb_strtolower($veiculo->getMontadora(), 'UTF-8'));
        $veiculo->setModelo(mb_strtolower($veiculo->getModelo(), 'UTF-8'));

        if ($veiculo->isValido() && !Veiculo::chassiExiste($veiculo)) {
            $veiculo->salvar();
            DW3Sessao::setFlash('mensagem', 'Veiculo cadastrado com sucesso!');
            $this->redirecionar(URL_RAIZ . 'frota/criar');
        } else {
            $this->setErros($veiculo->getValidacaoErros());

            $this->visao(
                'frota/criar.php',
                [
                    'categoriaId' => $_POST['categoriaId'],
                    'categorias' => Categoria::buscarTodos()
                ],
                'principal.php'
            );
        }
    }

    public function atualizar($id)
    {
        $this->verificarLogado();

        $veiculo = Veiculo::buscarId($id);

        $veiculo->setMontadora($_POST['montadora']);
        $veiculo->setModelo($_POST['modelo']);
        $veiculo->setPrecoDiaria($_POST['precoDiaria']);
        $veiculo->setIdCategoria($_POST['categoriaId']);

        $veiculo->setMontadora(mb_strtolower($veiculo->getMontadora(), 'UTF-8'));
        $veiculo->setModelo(mb_strtolower($veiculo->getModelo(), 'UTF-8'));

        if ($veiculo->isValido()) {
            $veiculo->salvar();
            DW3Sessao::setFlash('mensagem', 'Veículo atualizado com sucesso!');

            $this->redirecionar(URL_RAIZ . 'frota/editar');
        } else {
            $this->setErros($veiculo->getValidacaoErros());
            $categoria = $veiculo->nomeCategoria($veiculo->getIdCategoria());

            $this->visao(
                'frota/atualizar.php',
                [
                    'veiculo' => $veiculo,
                    'categoria' => $categoria
                ],
                'principal.php'
            );
        }
    }

    public function pesquisar()
    {
        $this->verificarLogado();

        $chassi = $_GET['chassi-busca'];
        $veiculo = Veiculo::buscarRegistroVeiculo(Controlador::removerMascara($chassi));

        if ($veiculo->getChassi() == null) {
            DW3Sessao::setFlash('naoEncontrado', 'Este veículo não existe em nossa base de dados...');
            $this->redirecionar(URL_RAIZ . 'frota/editar');
        } else {
            $this->visao(
                'frota/atualizar.php',
                [
                    'veiculo' => $veiculo,
                    'categorias' => Categoria::buscarTodos()
                ],
                'principal.php'
            );
        }
    }
}
