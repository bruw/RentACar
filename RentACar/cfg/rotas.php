<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\LoginControlador#index',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => '\Controlador\LoginControlador#destruir',
    ],

    '/locacoes' => [
        'GET'  => '\Controlador\LocacaoControlador#index',
        'POST' => '\Controlador\LocacaoControlador#armazenar',
    ],

    '/locacoes/devolucao' => [
        'GET' => '\Controlador\LocacaoControlador#devolucao',
    ],

    '/locacoes/criar/?' => [
        'GET' => '\Controlador\LocacaoControlador#criar',
    ],

    '/locacoes/?/editar' => [
        'PATCH' => '\Controlador\LocacaoControlador#editar',
    ],

    '/locacoes/cliente-existe/?' => [
        'GET' => '\Controlador\LocacaoControlador#clienteExiste',
    ],

    '/locacoes/existe-locacao-cliente' => [
        'GET' => '\Controlador\LocacaoControlador#existeLocacaoCliente',
    ],

    '/locacoes/calcular-total' => [
        'GET' => '\Controlador\LocacaoControlador#calcularTotal',
    ],


    '/clientes' => [
        'POST' => '\Controlador\ClienteControlador#armazenar',
    ],

    '/clientes/criar' => [
        'GET' => '\Controlador\ClienteControlador#criar',
    ],

    '/clientes/editar' => [
        'GET' => '\Controlador\ClienteControlador#editar',
    ],

    '/clientes/pesquisar' => [
        'GET' => '\Controlador\ClienteControlador#pesquisar',
    ],

    '/clientes/atualizar/?' => [
        'PATCH' => '\Controlador\ClienteControlador#atualizar',
    ],



    '/usuarios' => [
        'POST' => '\Controlador\UsuarioControlador#armazenar',
    ],

    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuarioControlador#criar',
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
