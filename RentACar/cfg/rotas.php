<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\LoginControlador#index',
        'POST' => '\Controlador\LoginControlador#armazenar',
    ],
    
    '/encerrar-sessao' => [
        'GET' => '\Controlador\LoginControlador#destruir',
    ],



    '/locacoes/carros-disponiveis' => [
        'GET' => '\Controlador\LocacoesControlador#carrosDisponiveis',
    ],

    '/locacoes/devolucao' => [
        'GET' => '\Controlador\LocacoesControlador#devolucao',
    ],



    '/clientes' => [
        'POST' => '\Controlador\ClientesControlador#armazenar',
    ],

    '/clientes/criar' => [
        'GET' => '\Controlador\ClientesControlador#criar',
    ],

    '/clientes/editar' => [
        'GET' => '\Controlador\ClientesControlador#editar',
    ],

    '/clientes/pesquisar' => [
        'POST' => '\Controlador\ClientesControlador#pesquisar',
    ],

    '/clientes/atualizar/?' => [
        'PATCH' => '\Controlador\ClientesControlador#atualizar',
    ],

  

    '/usuarios' => [
        'POST' => '\Controlador\UsuariosControlador#armazenar',
    ],

    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuariosControlador#criar',
    ],

    '/usuarios/atualizar' => [
        'GET' => '\Controlador\UsuariosControlador#atualizar',
    ],




    '/frota' => [
        'POST' => '\Controlador\FrotaControlador#armazenar',
    ],

    '/frota/criar' => [
        'GET' => '\Controlador\FrotaControlador#criar',
    ],

    '/frota/editar' => [
        'GET' => '\Controlador\FrotaControlador#editar',
    ], 

    '/frota/atualizar/?' => [
        'PATCH' => '\Controlador\FrotaControlador#atualizar',
    ],

    '/frota/pesquisar' => [
        'POST' => '\Controlador\FrotaControlador#pesquisar',
    ],

    '/frota/enviar-oficina' => [
        'GET' => '\Controlador\FrotaControlador#enviarOficina',
    ],

    '/frota/oficina' => [
        'GET' => '\Controlador\FrotaControlador#oficina',
    ],



    '/relatorios/relatorios' => [
        'GET' => '\Controlador\RelatoriosControlador#relatorios',
    ],
];
