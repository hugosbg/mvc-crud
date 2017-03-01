<?php

require __DIR__ . '/../autoload.php';

$provider = function () {
    $config = require __DIR__ . '/../src/Config/Config.php';
    return $config;
};

$app = new Router($provider);
$app->add('/', 'Controller\ControllerProduto::listar');
$app->add('/editar/(\d+)', 'Controller\ControllerProduto::editar');
$app->add('/salvar', 'Controller\ControllerProduto::salvar');
$app->add('/excluir/(\d+)', 'Controller\ControllerProduto::excluir');
$app->add('/cadastrar', 'Controller\ControllerProduto::cadastrar');
$app->add('/buscar', 'Controller\ControllerProduto::buscar');
$app->dispach();
