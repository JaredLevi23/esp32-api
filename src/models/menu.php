<?php
class Menu
{
  private $con;

  function __construct()
  {
    $db = new DbConnect;
    $this->con = $db->connect();
  }

  function __destruct()
  {
    $this->con = null;
  }


                                      //*******TABLA Menu**********
  //funcion parainsertar un Producto nuevo
  public function insertaProducto($request){
    $req = json_decode($request->getbody());
    $sql = "INSERT INTO Menu(Nombre,Descripcion,Precio) VALUES(:Nombre,:Descripcion,:Precio)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Descripcion", $req->Descripcion);
        $statement->bindparam("Precio", $req->Precio);
        
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje2 = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para consultar un Producto por su id
  public function ConsultaProducto($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM Menu WHERE idProducto=:idProducto";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idProducto", $req->idProducto);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para eliminar un Producto
  public function eliminaProducto($request)
  {
    $req = json_decode($request->getbody());

   
      $sql = "DELETE  FROM Menu where idProducto=:idProducto";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idProducto", $req->idProducto); 
        $statement->execute();
        $response->Datos_Eliminados =$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }

   //Funcion para modificar algun Producto
 public function modificarProducto($request)
  {
    $req = json_decode($request->getbody());

     $sql = "UPDATE Menu  SET Nombre=:Nombre, Descripcion=:Descripcion, Precio=:Precio WHERE idProducto=:idProducto";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idProducto", $req->idProducto);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Descripcion", $req->Descripcion);
        $statement->bindparam("Precio", $req->Precio);
         
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }
  
  
  


}