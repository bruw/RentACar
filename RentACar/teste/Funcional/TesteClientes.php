<?php
    namespace Teste\Funcional;

    use \Teste\Teste;
    use \Framework\DW3BancoDeDados;
    use \Modelo\Cliente;

    class TesteClientes extends Teste
    {
        public function testeCriar()
        {   
            $this->logar();
            
            $resposta = $this->get(URL_RAIZ . 'clientes/criar');
            $this->verificarContem($resposta, 'Cadastro de Cliente');
        }

        public function testeEditar()
        {
            $this->logar();

            $resposta = $this->get(URL_RAIZ . 'clientes/editar');
            $this->verificarContem($resposta, 'Atualizar Dados do Cliente');
        }

        public function testeArmazenar()
        {
            $this->logar();

            $resposta = $this->post(URL_RAIZ . 'clientes', [
                    'primeiro-nome' => 'creiton',
                    'sobrenome' => 'olavo',
                    'cpf' => '00000000010',
                    'celular' => '42000000000',
                    'email' => 'creito@creito.com',
                    'cep' => '85000000', 
                    'numero' => '7'
            ]);

            $this->verificarRedirecionar($resposta, URL_RAIZ . 'clientes/criar'); 
            $resposta = $this->get(URL_RAIZ . 'clientes/criar');
            $this->verificarContem($resposta, 'Cliente cadastrado com sucesso!');
            $query = DW3BancoDeDados::query('SELECT * FROM clientes WHERE primeiro_nome = "creiton"');
            $bdClientes = $query->fetchAll();
            $this->verificar(count($bdClientes) == 1);
        }

        public function testePesquisar()
        {
            $this->logar();

            $resposta = $this->post(URL_RAIZ . 'clientes', [
                'primeiro-nome' => 'creiton',
                'sobrenome' => 'olavo',
                'cpf' => '00000000010',
                'celular' => '42000000000',
                'email' => 'creito@creito.com',
                'cep' => '85000000', 
                'numero' => '7'
            ]);

            $resposta = $this->get(URL_RAIZ . 'clientes/pesquisar', ['cpf-busca' => '00000000010']);
            
            $this->verificarContem($resposta, 'value="creiton"');
            
        }
        
    }