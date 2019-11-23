<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\LoginControlador#index',
        'POST' => '\Controlador\LoginControlador#armazenar',
    ],

    '/encerrar-sessao' => [
        'GET' => '\Controlador\LoginControlador#destruir',
    ],

    '/locacoes' => [
        'GET'  => '\Controlador\LocacoesControlador#index',
        'POST' => '\Controlador\LocacoesControlador#armazenar',

    ],

    '/locacoes/devolucao' => [
        'GET' => '\Controlador\LocacoesControlador#devolucao',
    ],

    '/locacoes/criar/?' => [
        'GET' => '\Controlador\LocacoesControlador#criar',
    ],

    '/locacoes/?/editar' => [
        'PATCH' => '\Controlador\LocacoesControlador#editar',
    ],

    '/locacoes/cliente-existe/?' => [
        'GET' => '\Controlador\LocacoesControlador#clienteExiste',
    ],

    '/locacoes/existe-locacao-cliente' => [
        'GET' => '\Controlador\LocacoesControlador#existeLocacaoCliente',
    ],

    '/locacoes/calcular-total' => [
        'GET' => '\Controlador\LocacoesControlador#calcularTotal',
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

    '/oficina' => [
        'GET'   => '\Controlador\OficinaControlador#index',
        'POST'  => '\Controlador\OficinaControlador#armazenar',
    ],

    '/oficina/enviar-oficina' => [
        'GET' => '\Controlador\OficinaControlador#enviarOficina',
    ],

    '/oficina/atualizar/?' => [
        'PATCH' => '\Controlador\OficinaControlador#atualizar',
    ],

    '/oficina/pesquisar' => [
        'GET' => '\Controlador\OficinaControlador#pesquisar',
    ],


    '/relatorios' => [
        'GET' => '\Controlador\RelatoriosControlador#index',
    ],

    '/relatorio/veiculo' => [
        'GET' => '\Controlador\RelatoriosControlador#mostrarReparos',
    ],

    '/relatorio/balanco-empresa' => [
        'GET' => '\Controlador\RelatoriosControlador#mostrarBalanco',
    ],
];
