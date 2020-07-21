<?
require __DIR__ . '/../../src/models/pedidos.php';
function funcionInsertaPedidos($request){
    $objPedidos= new Pedidos();
    return $objPedidos->insertaPedidos($request);
}

function funcionConsultaPedidos($request){
    $objPedidos= new Pedidos();
    return $objPedidos->ConsultaPedidos($request);
}
function funcionIeliminaPedidos($request){
    $objPedidos= new Pedidos();
    return $objPedidos->eliminaPedidos($request);
}
function funcionmodificarPedidos($request){
    $objPedidos= new Pedidos();
    return $objPedidos->modificarPedidos($request);
}