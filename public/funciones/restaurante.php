<?
require __DIR__ . '/../../src/models/sensores.php';

function funcionsensores($request){
    $objSensor= new Sensores();
    return $objSensor->insertarSensor($request);
}