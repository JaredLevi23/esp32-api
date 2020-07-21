<?
require __DIR__ . '/../../src/models/menu.php';
function funcionInsertaProducto($request){
    $objMenu= new Menu();
    return $objMenu->insertaProducto($request);
}

function funcionConsultaProducto($request){
    $objMenu= new Menu();
    return $objMenu->ConsultaProducto($request);
}
function funcionIeliminaProducto($request){
    $objMenu= new Menu();
    return $objMenu->eliminaProducto($request);
}
function funcionmodificarProducto($request){
    $objMenu= new Menu();
    return $objMenu->modificarProducto($request);
}
