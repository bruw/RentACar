<?php
    namespace Teste\Unitario;
    
    use \Teste\Teste;
    use \Modelo\Locacao;
    use \Modelo\Veiculo;
    use \Modelo\Cliente;

    class TesteLocacao extends Teste
    {
        private $id = 1;
        private $totalLocacao = 200;
        private $dataInicio = '2019-11-25';
        private $dataPrevista = '2019-11-26';
        private $dataFim = '2019-11-26';

        public function testeInserir()
        {
            $veiculo = new Veiculo('0001','vw','kombi','1','10',null,0,0);
            $veiculo->salvar();
            
            $cliente = new Cliente(
                'darth',
                'vader',
                '00000000001',
                '42999998888',
                'darthvader@disney.com',
                '85000000',
                '8'
            );
            $cliente->salvar();

            $locacao = new Locacao($this->dataInicio, $this->dataPrevista, $this->totalLocacao,
            '1','1','0',$this->dataFim, '0');
            $locacao->salvar();

            $locacao = Locacao::buscarRegistro($this->id);
           
            $this->verificar($locacao->getId() == $this->id);
            $this->verificar($locacao->getTotal() == $this->totalLocacao);
        }

        public function testeAtualizar()
        {
            $this->testeInserir();

            $locacao = Locacao::buscarRegistro($this->id);
            $locacao->setTotal(50);
            $locacao->setStatusLocacao(1);
            $locacao->salvar();

            $this->verificar($locacao->getTotal() == 50);
        }

        public function testeBuscarId()
        {
            $this->testeAtualizar();
            
            $locacao = Locacao::buscarId($this->id);
            $this->verificar($locacao->getId() == $this->id);
        }

        public function testeBuscarRegistro()
        {
            $this->testeInserir();

            $locacao = Locacao::buscarRegistro($this->id);
            $this->verificar($locacao->getId() == $this->id);
            $this->verificar($locacao->getTotal() == $this->totalLocacao);
        }

        public function testeTotalLocacoes()
        {
            $this->testeInserir();

            $totalLocacao = Locacao::totalLocacoes($this->dataInicio, $this->dataFim);
            $this->verificar($totalLocacao[0] == $this->totalLocacao);
        }
    }
?>