<?php
    namespace Teste\Unitario;
    
    use \Teste\Teste;
    use \Modelo\Veiculo;
    use \Modelo\Locacao;
    use \Modelo\Cliente;
    use \Modelo\Reparo;

    class TesteVeiculo extends Teste
    {
        private $chassi = '0001';

        public function testeInserir()
        {
            $veiculo = new Veiculo(
                $this->chassi,
                'dmc',
                'delorean',
                '1',
                '1000',
                null,
                0,
                0
            );
            
            $veiculo->salvar();
           
            $veiculoSalvo = Veiculo::buscarRegistroVeiculo($veiculo->getChassi());
            $chassiSalvo = $veiculoSalvo->getChassi();

            $this->verificar($chassiSalvo == $this->chassi);
        }

        public function testeBuscarRegistroVeiculo()
        {
            $this->testeInserir();
            $veiculo = Veiculo::buscarRegistroVeiculo($this->chassi);
            $this->verificar(($veiculo->getModelo() == 'delorean') && ($veiculo->getChassi() == $this->chassi));
        }

        public function testeAtulizar()
        {
            $this->testeInserir();

            $veiculoAntes = Veiculo::buscarRegistroVeiculo($this->chassi);
            $veiculoAtualizado = Veiculo::buscarRegistroVeiculo($this->chassi);

            $veiculoAtualizado->setMontadora('chevrolet');
            $veiculoAtualizado->salvar();
            $veiculoAtualizado = Veiculo::buscarRegistroVeiculo($veiculoAtualizado->getChassi());

            $this->verificar($veiculoAntes->getMontadora() != $veiculoAtualizado->getMontadora());
        }

        public function testeBuscarId()
        {
            $this->testeInserir();

            $veiculoId = Veiculo::buscarId(1);
            $this->verificar(($veiculoId->getId() == 1) && ($veiculoId->getChassi() == $this->chassi));
        }

        public function testeBuscarTodos()
        {
            $this->testeInserir();
            $veiculoFusca = new Veiculo($this->chassi,'vw','fusca', '1', '2000', null, 0, 0);
            $veiculoFusca->salvar();
            $veiculoKombi = new Veiculo($this->chassi,'vw','kombi', '1', '3000', null, 0, 0);
            $veiculoKombi->salvar();
            $veiculoOpala = new Veiculo($this->chassi,'gm','opala', '1', '4000', null, 0, 0);
            $veiculoOpala->salvar();

            $veiculos = Veiculo::buscarTodos(4, 0);

            $this->verificar(count($veiculos) == 4);
            $this->verificar($veiculos[0]->getChassi() == $this->chassi);
            $this->verificar($veiculos[3]->getPrecoDiaria() == 4000);

        }

        public function testeContarTodos()
        {
            $this->testeInserir();
            $veiculoFusca = new Veiculo($this->chassi,'vw','fusca', '1', '2000', null, 0, 0);
            $veiculoFusca->salvar();
            $veiculoKombi = new Veiculo($this->chassi,'vw','kombi', '1', '3000', null, 0, 0);
            $veiculoKombi->salvar();
            $veiculoOpala = new Veiculo($this->chassi,'gm','opala', '1', '4000', null, 0, 0);
            $veiculoOpala->salvar();

            $veiculos = Veiculo::contarTodos();
            $this->verificar($veiculos == 4);
        }

        public function testeBuscarLocacoesFinalizadas()
        {
            $this->testeInserir();
            $veiculo = Veiculo::buscarRegistroVeiculo($this->chassi);

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

            $locacao = new Locacao('2019-11-11', '2019-11-12', '500', '1', '1', '0', '2019-11-11', '0');
            $locacao->salvar();

            $locacoes = $veiculo->buscarLocacoesFinalizadas($veiculo->getChassi());

            $this->verificar($locacoes[0]->getStatusLocacao() == 0);
            $this->verificar($locacoes[0]->getTotal() == 500);
        }

        public function testeBuscarReparosFinalizadas()
        {
            $this->testeInserir();
            $veiculo = Veiculo::buscarRegistroVeiculo($this->chassi);

            $reparo = new Reparo('2019-11-11', null, null, $veiculo->getId(), 0);
            $reparo->salvar();
            $reparo = Reparo::buscarRegistroReparo(1);
            $reparo->setTotal('100');
            $reparo->setStatusReparo('1');
            $reparo->setDataSaida('2019-11-12');
            $reparo->salvar();

            $reparos = $veiculo->buscarReparosFinalizados($veiculo->getChassi());

            $this->verificar($reparos[0]->getStatusReparo() == 1);
            $this->verificar($reparos[0]->getTotal() == 100);
        }

    }
?>