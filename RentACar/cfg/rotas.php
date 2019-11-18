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

    '/locacoes/criar/?' => [
        'GET' => '\Controlador\LocacoesControlador#criar',
    ],

    '/locacoes/pesquisar/?' => [
        'GET' => '\Controlador\LocacoesControlador#pesquisar',
    ],

    '/locacoes/total/?/?' => [
        'GET' => '\Controlador\LocacoesControlador#calcularTotal',
    ],

    '/locacoes' => [
        'POST' => '\Controlador\LocacoesControlador#armazenar',
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
        'GET' => '\Controlador\ClientesControlador#pesquisar',
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
        'GET' => '\Controlador\FrotaControlador#pesquisar',
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
