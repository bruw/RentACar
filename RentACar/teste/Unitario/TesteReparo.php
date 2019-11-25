<?php
    namespace Teste\Unitario;
    
    use \Teste\Teste;
    use \Modelo\Reparo;
    use \Modelo\Veiculo;

    class TesteReparo extends Teste
    {
        private $id = 1;
        private $chassi = 0001;
        
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

            $reparo = new Reparo('2019-11-11', null, null, 1, 0);
            $reparo->salvar();

            $reparoSalvo = Reparo::buscarRegistroReparo($this->id);
           
            $this->verificar($reparoSalvo->getdataEntrada() == '2019-11-11');
        }

        public function testeAtualizarReparo()
        {
            $this->testeInserir();

            $reparo = Reparo::buscarRegistroReparo($this->id);

            $reparo->setDataSaida('2019-11-12');
            $reparo->setTotal(200);
            $reparo->setStatusReparo(1);
            $reparo->salvar();

            $reparo = Reparo::buscarRegistroReparo($this->id);
            $this->verificar($reparo->getDataSaida() == '2019-11-12');
            $this->verificar($reparo->getTotal() == 200);
            $this->verificar($reparo->getStatusReparo() == 1);
        }

        public function testeBuscarId()
        {
            $this->testeInserir();

            $reparoId = Reparo::buscarId($this->id);
            $this->verificar($reparoId->getId() == $this->id);

        }

        public function testeBuscarRegistroReparo()
        {
            $this->testeInserir();
            $reparo = Reparo::buscarRegistroReparo($this->id);

            $this->verificar($reparo->getdataEntrada() == '2019-11-11');
            $this->verificar($reparo->getId() == $this->id);
        }

        public function testeBuscarTodos()
        {
            $veiculo1 = new Veiculo('0001','dmc','delorean','1','10',null,0,0);
            $veiculo1->salvar();

            $veiculo2 = new Veiculo('0002','dmc','delorean','1','100',null,0,0);
            $veiculo2->salvar();

            $veiculo3 = new Veiculo('0003','dmc','delorean','1','1000',null,0,0);
            $veiculo3->salvar();

            $veiculo4 = new Veiculo('0004','dmc','delorean','1','10000',null,0,0);
            $veiculo4->salvar();
           
            $reparo1 = new Reparo('2019-11-11', null, null, 1, 0);
            $reparo1->salvar();

            $reparo2 = new Reparo('2019-11-12', null, null, 2, 0);
            $reparo2->salvar();

            $reparo3 = new Reparo('2019-11-13', null, null, 3, 0);
            $reparo3->salvar();

            $reparo4 = new Reparo('2019-11-14', null, null, 4, 0);
            $reparo4->salvar();

            $reparos = Reparo::buscarTodos();

            $this->verificar($reparos[0]->getDataEntrada() == '2019-11-11');
            $this->verificar($reparos[0]->getIdVeiculo() == 1);

            $this->verificar($reparos[3]->getDataEntrada() == '2019-11-14');
            $this->verificar($reparos[3]->getIdVeiculo() == 4);

        }

        public function testeContarTodos()
        {
            $this->testeInserir();

            $reparos = Reparo::contarTodos();
            $this->verificar($reparos == 1);
        }

        public function testeTotalReparos()
        {
            $veiculo1 = new Veiculo( $this->chassi,'dmc','delorean','1','1000',null,0,0);
            $veiculo1->salvar();

            $veiculo2 = new Veiculo( $this->chassi,'dmc','delorean','1','1000',null,0,0);
            $veiculo2->salvar();

            $reparo1 = new Reparo('2019-11-11', null, null, 1, 0);
            $reparo1->salvar();

            $reparo2 = new Reparo('2019-11-12', null, 0, 2, 0);
            $reparo2->salvar();

            $reparo1->setDataSaida('2019-11-12');
            $reparo1->setTotal(100);
            $reparo1->setStatusReparo(1);
            $reparo1->salvar();
            
            $reparo2->setDataSaida('2019-11-13');
            $reparo2->setTotal(50);
            $reparo2->setStatusReparo(1);
            $reparo2->salvar();

            $totalReparos = Reparo::totalReparos('2019-11-11', '2019-11-13');
            $this->verificar($totalReparos[0] == '150');
        }

    }
?>