<?php

use Minishlink\WebPush\VAPID;
use Ekolo\Builder\Routing\Router;
use Ekolo\Builder\Http\Request;
use Ekolo\Builder\Http\Response;


$router = new Router;

$router->get('/', function (Request $req, Response $res) {
    $res->render('index', [
        'title' => 'Bienvenue ici'
    ]);
});

$router->get('/push', function (Request $req, Response $res) {
    var_dump(VAPID::createVapidKeys());
    die();
});

$router->get('/key', function (Request $req, Response $res) {
    $res->json([
        'publicKey' => env('VAPID_PUBLIC_KEY'),
        'privateKey' => env('VAPID_PRIVATE_KEY')
    ]);
});

return $router;