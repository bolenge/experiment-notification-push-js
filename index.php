<?php
    require __DIR__.'/vendor/autoload.php';

    use Ekolo\Builder\Bin\Application;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;

    $app = new Application;

    // routers
    $pages = require('./routes/pages.php');

    // set configuration of file folders
    $app->set('views', 'views');
    $app->set('public', 'public');
    $app->set('template', 'layout');

    // Middlwares
    $app->use(function ($req, $res) {
        
    });

    $app->use('/', $pages);

    // error handler
    $app->trackErrors(function ($error, $req, $res) {
        echo $error->message;
        echo '<br>'.$error->status;
    });
