<?php

namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class LoginControlador extends Controlador
{
    public function index()
    {   
        $usuario= Usuario::buscarRegistroUsuario('00000000001');

        if(empty($usuario)){
            $usuario = new Usuario(
                'Fernanda', 
                'Minueto',
                '00000000001',
                '42999999999',
                'fernanda@email.com',
                '85000000',
                '212',
                '1234'
            );

            $usuario->salvar();
        }

        if(empty(DW3Sessao::get('usuario'))){
            $this->visao('inicial/index.php',[],'index.php');
        }else{
            $this->redirecionar(URL_RAIZ . 'locacoes');
        }
           
    }

    public function armazenar()
    {
        $usuario = Usuario::buscarRegistroUsuario(self::removerMascara($_POST['cpf']));

        if ($usuario && $usuario->verificarSenha($_POST['senha'])) {
            DW3Sessao::set('usuario', $usuario->getId());
            $this->redirecionar(URL_RAIZ . 'locacoes');
        } else {
            $this->setErros(['login' => 'CPF ou Senha Inválida']);
            $this->visao('inicial/index.php');
        }
    }

    public function destruir()
    {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ);
    }

    public static function removerMascara($atributo)
    {
       $atributo = str_replace("(", "", $atributo);
       $atributo = str_replace(")", "", $atributo);
       $atributo = str_replace("-", "", $atributo);
       $atributo = str_replace(".", "", $atributo);
       
       return $atributo;
    }

}
