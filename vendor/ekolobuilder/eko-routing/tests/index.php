<?php

require_once __DIR__.'./../vendor/autoload.php';

use Ekolo\Routing\Router;

$router = new Router;

$router->get('/', function () {
    echo "Super cool";
});

$router->get('/users', function () {
    echo "Salut famille";
});

$router->get('/users/:id', function () {
    echo "Bonjour";
});

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($route = $router->getRoute($method, $url)) {
    $route->action()();
}
