<?php

namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class LoginControlador extends Controlador
{
    public function index()
    {   
        $usuario= Usuario::buscarCpf('00000000001');

        if(!$usuario){
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

        $this->visao('inicial/index.php',[],'index.php');
    }


    public function armazenar()
    {
        $usuario = Usuario::buscarCpf(self::removerMascara($_POST['cpf']));

        if ($usuario && $usuario->verificarSenha($_POST['senha'])) {
            DW3Sessao::set('usuario', $usuario->getId());
            $this->redirecionar(URL_RAIZ . 'locacoes/carros-disponiveis');
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
