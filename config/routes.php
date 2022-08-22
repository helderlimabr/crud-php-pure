<?php

use FiecCrudPhp\Controller\{
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    ListarClientes,
    Persistencia,};

return [
    '/' => ListarClientes::class,
    '/novo-cliente' => FormularioInsercao::class,
    '/salvar-cliente' => Persistencia::class,
    '/excluir-cliente' => Exclusao::class,
    '/alterar-cliente' => FormularioEdicao::class,
];

