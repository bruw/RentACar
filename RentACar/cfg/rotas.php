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

    '/clientes/criar' => [
        'GET' => '\Controlador\ClientesControlador#criar'
    ],

    '/clientes/atualizar' => [
        'GET' => '\Controlador\ClientesControlador#atualizar'
    ],

    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuariosControlador#criar'
    ],

    '/usuarios/atualizar' => [
        'GET' => '\Controlador\UsuariosControlador#atualizar'
    ],

    '/frota/criar' => [
        'GET' => '\Controlador\FrotaControlador#criar'
    ],

    '/frota/atualizar' => [
        'GET' => '\Controlador\FrotaControlador#atualizar'
    ], 

    '/frota/enviar-oficina' => [
        'GET' => '\Controlador\FrotaControlador#enviarOficina'
    ],

    '/frota/oficina' => [
        'GET' => '\Controlador\FrotaControlador#oficina'
    ],

    '/relatorios/relatorios' => [
        'GET' => '\Controlador\RelatoriosControlador#relatorios'
    ],
];
