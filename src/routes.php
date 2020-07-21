<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {
   
   

    //FuncionesRestaurante
    $app->post('/restaurante','funcionInsertCliente');
    $app->get('/restaurante','funciongetCliente');
    $app->delete('/restaurante','funcionEliminarCliente');
    $app->patch('/restaurante','funcionmodificarCliente');

    
    //Funciones Menu
    $app->post('/menu','funcionInsertaProducto');
    $app->get('/menu','funcionConsultaProducto');
    $app->delete('/menu','funcionIeliminaProducto');
    $app->patch('/menu','funcionmodificarProducto');

    //Funciones Trabajador
    $app->post('/trabajador','funcionInsertaTrabajador');
    $app->get('/trabajador','funcionConsultaTrabajador');
    $app->delete('/trabajador','funcionIeliminaTrabajador');
    $app->patch('/trabajador','funcionmodificarTrabajador');

    //Funciones Reservacion
    $app->post('/reservacion','funcionInsertaReservacion');
    $app->get('/reservacion','funcionConsultaReservacion');
    $app->delete('/reservacion','funcionIeliminaReservacion');
    $app->patch('/reservacion','funcionmodificarReservacion');
});
