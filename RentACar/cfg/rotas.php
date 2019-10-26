<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\LoginControlador#index',
    ],

    '/frota' => [
        'GET' => '\Controlador\CarrosDisponiveisControlador#carros',
    ],
];
