<?php
namespace Teste;

use \Modelo\Usuario;
use \Framework\DW3Teste;
use \Framework\DW3Sessao;

class Teste extends DW3Teste
{
    protected $usuario;

    public function logar()
    {
        $this->usuario = new Usuario('Bruno', 'José', '00000000003', '42000000000', 'bruno@email.com', 
        '85000000', '12', '1234');
        
        $this->usuario->salvar();
        DW3Sessao::set('usuario', $this->usuario->getId());
    }
}
