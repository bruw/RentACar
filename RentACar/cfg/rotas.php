<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\LoginControlador#index',
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

    '/clientes/atualizar' => [
        'GET' => '\Controlador\ClientesControlador#atualizar',
    ],

    '/clientes/pesquisar' => [
        'POST' => '\Controlador\ClientesControlador#pesquisar',
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

    '/frota/atualizar' => [
        'GET' => '\Controlador\FrotaControlador#atualizar',
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
