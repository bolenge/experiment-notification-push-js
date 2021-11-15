<?php 
    require_once __DIR__.'./../vendor/autoload.php';
    
    use Ekolo\Http\Request;
    use Ekolo\Http\Response;
    use Ekolo\Http\Options\Headers;
    

    $request = new Request;
    $response = new Response;
    $request->body()->add([
        'nom' => '',
        'email' => 'josue.com',
        'prenom' => '1h23'
    ]);

    $response->send([
        'nom' => 'Papa'
    ], ['Content-Type: application/json'], 200);