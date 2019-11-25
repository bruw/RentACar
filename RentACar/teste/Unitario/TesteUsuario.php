<?php
    namespace Teste\Unitario;
    
    use \Teste\Teste;
    use \Modelo\Usuario;

    class TesteUsuario extends Teste
    {
        private $cpf = '00000000003';

        public function testeInserir()
        {
            $usuario = new Usuario(
                'bruce',
                'wayne',
                $this->cpf,
                '42999998888',
                'brucewayne@dc.com',
                '85000000',
                '800',
                '1234'
            );

            $usuario->salvar();
        }

        public function testeBuscarRegistroUsuario()
        {
            $this->testeInserir();

            $usuario = Usuario::buscarRegistroUsuario($this->cpf);
            $this->verificar(($usuario->getPrimeiroNome() == 'bruce') && ($usuario->getCpf() == $this->cpf));
        }

        public function testeBuscarId()
        {
            $this->testeInserir();
            
            $usuario = Usuario::buscarId(2);
            $this->verificar(($usuario->getId() == 2) && ($usuario->getCpf() == $this->cpf)); 
        }

        public function testeCpfExiste()
        {
            $this->testeInserir();
            $usuario = Usuario::buscarRegistroUsuario($this->cpf);

            $existe = Usuario::cpfExiste($usuario);
            $this->verificar($existe == true);
        }

      
    }
?>