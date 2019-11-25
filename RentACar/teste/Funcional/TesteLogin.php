<?php
    namespace Teste\Funcional;
    
    use \Teste\Teste;
    use \Modelo\Usuario;
    use \Framework\DW3Sessao;

    class TesteLogin extends Teste
    {
        public function testeAcessar()
        {
            $resposta = $this->get(URL_RAIZ);
            $this->verificarContem($resposta, 'Acesso ao Sistema');
        }

        public function testeLogar()
        {
            $resposta = $this->post(URL_RAIZ , 
                ['cpf' => '00000000000',
                'senha' => '1234'
                ]);

            $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacoes');
            $this->verificar(DW3Sessao::get('usuario') != null);
        }

        public function testeDeslogar()
        {
            (new Usuario('Darth', 'Vader', '00000000001', '42000000000', 'darthvaider@disney.com',
            '85000000', '8', '1234'))->salvar();

            $resposta = $this->post(URL_RAIZ, 
                [
                    'cpf' => '00000000001',
                    'senha' => '1234'
                ]
            );

            $resposta = $this->delete(URL_RAIZ);
            $this->verificarRedirecionar($resposta, URL_RAIZ);
            $this->verificar(DW3Sessao::get('usuario') == null);
        }
    }
?>