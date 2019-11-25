<?php
    namespace Teste\Funcional;

    use \Teste\Teste;
    use \Framework\DW3BancoDeDados;
    use \Modelo\Usuario;

    class TesteUsuarios extends Teste
    {
        public function testeCriar()
        {   
            $this->logar();
            
            $resposta = $this->get(URL_RAIZ . 'usuarios/criar');
            $this->verificarContem($resposta, 'Cadastro de Usuário');
        }

        
        public function testeArmazenar()
        {
            $this->logar();

            $resposta = $this->post(URL_RAIZ . 'usuarios', [
                    'primeiro-nome' => 'creiton',
                    'sobrenome' => 'olavo',
                    'cpf' => '00000000010',
                    'celular' => '42000000000',
                    'email' => 'creito@creito.com',
                    'cep' => '85000000', 
                    'numero' => '7',
                    'senha' => '1234'
            ]);

            $this->verificarRedirecionar($resposta, URL_RAIZ . 'usuarios/criar'); 
            $resposta = $this->get(URL_RAIZ . 'usuarios/criar');
            $this->verificarContem($resposta, 'Usuário cadastrado com sucesso!');
            $query = DW3BancoDeDados::query('SELECT * FROM usuarios WHERE primeiro_nome = "creiton"');
            $bdUsuarios = $query->fetchAll();
            $this->verificar(count($bdUsuarios) == 1);
        }
        
    }