<?
require __DIR__ . '/../../src/models/restaurante.php';
function funcionInsertCliente($request){
    $objRestaurante= new Restaurante();
    return $objRestaurante->insertCliente($request);
}
/*
function funciongetSensoreData($request){
    $objSensor= new Sensores();
    return $objSensor->getSensorData($request);
}
function funcionEliminarSensor($request){
    $objSensor= new Sensores();
    return $objSensor->eliminarSensor($request);
}

function funcionmodificarSensor($request){
    $objSensor= new Sensores();
    return $objSensor->modificarSensor($request);
} */

