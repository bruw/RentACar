<?php

namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Cliente;

class ClienteControlador extends Controlador
{
    public function criar()
    {
        $this->verificarLogado();

        $this->visao('clientes/criar.php', 
        ['mensagem' => DW3Sessao::getFlash('mensagem')], 
       'principal.php');
    }

    public function editar()
    {
        $this->verificarLogado();

        $this->visao('clientes/atualizar.php', 
        ['mensagem' => DW3Sessao::getFlash('mensagem'), 
        'naoEncontrado' => DW3Sessao::getFlash('naoEncontrado')],
        'principal.php');
    }

    public function pesquisar()
    {
        $this->verificarLogado();
        $cpf = $_GET['cpf-busca'];

        $cliente = Cliente::buscarRegistroCliente(Controlador::removerMascara($cpf));

        if($cliente->getCpf() == null){
            DW3Sessao::setFlash('naoEncontrado', 'Cliente inexistente em nossa base de dados');
            $this->redirecionar(URL_RAIZ . 'clientes/editar');
        }else{
            $this->visao('clientes/atualizar.php', ['cliente' => $cliente], 'principal.php');
        }
    }

    public function armazenar()
    {
        $this->verificarLogado();
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

        $cliente->setCpf(Controlador::removerMascara($cliente->getCpf()));
        $cliente->setCelular(Controlador::removerMascara($cliente->getCelular()));
        $cliente->setCep(Controlador::removerMascara($cliente->getCep()));

        if ($cliente->isValido() && !Cliente::cpfExiste($cliente)) {
            $cliente->salvar();
            DW3Sessao::setFlash('mensagem', 'Cliente cadastrado com sucesso!');
            
            $this->redirecionar('clientes/criar');
        } else {
            $this->setErros($cliente->getValidacaoErros());
            $this->visao('clientes/criar.php', [], 'principal.php');
        }
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
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

        $cliente->setCpf(Controlador::removerMascara($cliente->getCpf()));
        $cliente->setCelular(Controlador::removerMascara($cliente->getCelular()));
        $cliente->setCep(Controlador::removerMascara($cliente->getCep()));

        if ($cliente->isValido()) {
            $cliente->salvar();
            DW3Sessao::setFlash('mensagem', 'Cadastro Atualizado com sucesso!');
            
            $this->redirecionar(URL_RAIZ . 'clientes/editar');
        } else {
            $this->setErros($cliente->getValidacaoErros());
            $this->visao('clientes/atualizar.php', ['cliente' => $cliente], 'principal.php');
        }
    }
}
