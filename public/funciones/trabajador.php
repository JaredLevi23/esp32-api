<?
require __DIR__ . '/../../src/models/trabajador.php';
function funcioninsertaTrabajador($request){
    $objTrabajador= new Trabajador();
    return $objTrabajador->insertaTrabajador($request);
}

function funcionConsultaTrabajador($request){
    $objTrabajador= new Trabajador();
    return $objTrabajador->ConsultaTrabajador($request);
}
function funcionIeliminaTrabajador($request){
    $objTrabajador= new Trabajador();
    return $objTrabajador->eliminaTrabajador($request);
}
function funcionmodificarTrabajador($request){
    $objTrabajador= new Trabajador();
    return $objTrabajador->modificarTrabajador($request);
}