<?
require __DIR__ . '/../../src/models/reservacion.php';
function funcionInsertaReservacion($request){
    $objReservacion= new Reservacion();
    return $objReservacion->insertaReservacion($request);
}

function funcionConsultaReservacion($request){
    $objReservacion= new Reservacion();
    return $objReservacion->ConsultaReservacion($request);
}
function funcionIeliminaReservacion($request){
    $objReservacion= new Reservacion();
    return $objReservacion->eliminaReservacion($request);
}
function funcionmodificarReservacion($request){
    $objReservacion= new Reservacion();
    return $objReservacion->modificarReservacion($request);
}