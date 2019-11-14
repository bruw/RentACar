<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Cliente;

class ClientesControlador extends Controlador
{

    public function criar()
    {
        $this->visao('clientes/criar.php', [], 'principal.php');
    }

    public function editar()
    {
        $this->visao('clientes/atualizar.php', [], 'principal.php');
    }

    public function pesquisar()
    {
        $cpf = $_POST['cpf-busca'];
        $cliente = Cliente::buscarRegistroCliente(self::removerMascara($cpf));

        $this->visao('clientes/atualizar.php', ['cliente' => $cliente], 'principal.php');
    }

    public function armazenar()
    {
        $cliente = new Cliente(
            $_POST['primeiroNome'],
            $_POST['sobrenome'],
            $_POST['cpf'],
            $_POST['celular'],
            $_POST['email'],
            $_POST['cep'],
            $_POST['numero']
        );

        $cliente->setPrimeiroNome(mb_strtolower($cliente->getPrimeiroNome(), 'UTF-8'));
        $cliente->setSobrenome(mb_strtolower($cliente->getSobrenome(), 'UTF-8'));
        $cliente->setEmail(mb_strtolower($cliente->getEmail(), 'UTF-8'));

        $cliente->setCpf($cliente->removerMascara($cliente->getCpf()));
        $cliente->setCelular($cliente->removerMascara($cliente->getCelular()));
        $cliente->setCep($cliente->removerMascara($cliente->getCep()));
        

        if ($cliente->isValido() && !Cliente::cpfExiste($cliente)) {
            $cliente->salvar();
            DW3Sessao::setFlash('mensagemFlash', 'Mensagem cadastrada.');

           
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        } else {
            $this->setErros($cliente->getValidacaoErros());
            $this->visao('clientes/criar.php', [], 'principal.php');
        }
    }

    public function atualizar($id)
    {
        $cliente = Cliente::buscarId($id);

        $registroCliente = $cliente->buscarRegistroCliente($cliente->getCpf());
        $cliente->setCpf($registroCliente->getCpf());

        $cliente->setPrimeiroNome($_POST['primeiroNome']);
        $cliente->setSobrenome($_POST['sobrenome']);

        $cliente->setCelular($_POST['celular']);
        $cliente->setEmail($_POST['email']);

        $cliente->setCep($_POST['cep']);
        $cliente->setNumero($_POST['numero']);

        $cliente->setPrimeiroNome(mb_strtolower($cliente->getPrimeiroNome(), 'UTF-8'));
        $cliente->setSobrenome(mb_strtolower($cliente->getSobrenome(), 'UTF-8'));
        $cliente->setEmail(mb_strtolower($cliente->getEmail(), 'UTF-8'));

        $cliente->setCpf($cliente->removerMascara($cliente->getCpf()));
        $cliente->setCelular($cliente->removerMascara($cliente->getCelular()));
        $cliente->setCep($cliente->removerMascara($cliente->getCep()));

        if ($cliente->isValido()) {
            $cliente->salvar();
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
        } else {
            $this->setErros($cliente->getValidacaoErros());
            $this->visao('clientes/atualizar.php', ['cliente' => $cliente], 'principal.php');
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
