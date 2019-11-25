<?php
    namespace Teste\Unitario;
    
    use \Teste\Teste;
    use \Modelo\Cliente;

    class TesteCliente extends Teste
    {
        private $cpf = '00000000001';

        public function testeInserir()
        {
            $cliente = new Cliente(
                'darth',
                'vader',
                $this->cpf,
                '42999998888',
                'darthvader@disney.com',
                '85000000',
                '8'
            );

            $cliente->salvar();
        }

        public function testeBuscarRegistroCliente()
        {
            $this->testeInserir();

            $cliente = Cliente::buscarRegistroCliente($this->cpf);
            $this->verificar($cliente->getCpf() == $this->cpf);
        }

        public function testeCpfExiste()
        {
            $this->testeInserir();
            $cliente = Cliente::buscarRegistroCliente($this->cpf);

            $existe = Cliente::cpfExiste($cliente);
            $this->verificar($existe == true);
        }

        public function testeBuscarId()
        {
            $this->testeInserir();

            $cliente= Cliente::buscarId(1);
            $this->verificar(($cliente->getId() == 1) && ($cliente->getCpf() == $this->cpf));
        }

        public function testeAtualizar()
        {
            $this->testeInserir();
            $clienteAntes = Cliente::buscarRegistroCliente($this->cpf);
            $clienteAtualizar = Cliente::buscarRegistroCliente($this->cpf);
            
            $clienteAtualizar->setPrimeiroNome('Fernanda');
            $clienteAtualizar->salvar();

            $clienteAtualizar = Cliente::buscarRegistroCliente($this->cpf);

            $this->verificar(($clienteAtualizar->getPrimeiroNome()) != ($clienteAntes->getPrimeiroNome()));
        }
    }
?>