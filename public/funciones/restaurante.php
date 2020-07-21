<?
require __DIR__ . '/../../src/models/restaurante.php';
function funcionInsertCliente($request){
    $objRestaurante= new Restaurante();
    return $objRestaurante->insertCliente($request);
}

function funciongetCliente($request){
    $objRestaurante= new Restaurante();
    return $objRestaurante->getClienteData($request);
}

function funcionEliminarCliente($request){
    $objRestaurante= new Restaurante();
    return $objRestaurante->eliminarCliente($request);
}

function funcionmodificarCliente($request){
    $objRestaurant= new Restaurante();
    return $objRestaurant->modificarCliente($request);
} 



