<?
require __DIR__ . '/../../src/models/sensores.php';

function funcionsensores($request){
    $objSensor= new Sensores();
    return $objSensor->insertarSensor($request);
}
function funciongetSensoreData($request){
    $objSensor= new Sensores();
    return $objSensor->getSensorData($request);
}

function funcionDeleteSensores($request){
    $objSensor= new Sensores();
    return $objSensor->deleteSensor($request);
}

function funcionUpdateSensores($request){
    $objSensor = new Sensores();
    return $objSensor->updateSensor($request);
}

