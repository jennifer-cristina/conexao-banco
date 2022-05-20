<?php

    // Import do arquivo autoload, que fará as instancias do slim
    require_once('vendor/autoload.php');

    $app = new \Slim\App();

    // EndPoint: requisição para listar todos os contatos
    $app->get('/contatos', function($request, $response, $args){
        $response->write('Testando a API pelo GET');

    });

    // EndPoint: requisição para listar contato pelo id
    $app->get('/contatos/{id}', function($request, $response, $args){


    });

    // EndPoint: requisição para inserir um novo contato
    $app->post('/contatos', function($request, $response, $args){


    });
?>