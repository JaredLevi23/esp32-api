<?php
class Restaurante
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


                                      //*******TABLA CLIENTE**********
  //funcion parainsertar un cliente nuevo
  public function insertCliente($request){
    $req = json_decode($request->getbody());
    $sql = "INSERT INTO Clientes(Nombre,Apellido,Email,Telefono,Direccion) VALUES(:Nombre,:Apellido,:Email,:Telefono,:Direccion)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Apellido", $req->Apellido);
        $statement->bindparam("Email", $req->Email);
        $statement->bindparam("Telefono", $req->Telefono);
        $statement->bindparam("Direccion", $req->Direccion);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje2 = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para consultar a un cliente por su id
  public function getClienteData($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM Clientes WHERE idCliente=:idCliente";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idCliente", $req->idCliente);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para eliminar a un cliente
  public function eliminarCliente($request)
  {
    $req = json_decode($request->getbody());

   
      $sql = "DELETE  FROM Clientes where idCliente=:idCliente";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idCliente", $req->idCliente); 
        $statement->execute();
        $response->Datos_Eliminados =$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }

   //Funcion para modificar algun cliente
 public function modificarCliente($request)
  {
    $req = json_decode($request->getbody());

     $sql = "UPDATE Clientes  SET Nombre=:Nombre, Apellido=:Apellido, Email=:Email, Telefono=:Telefono, Direccion=:Direccion WHERE idCliente=:idCliente";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idCliente", $req->idCliente);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Apellido", $req->Apellido);
        $statement->bindparam("Email", $req->Email);
        $statement->bindparam("Telefono", $req->Telefono);
        $statement->bindparam("Direccion", $req->Direccion);
         
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }
  
  
  


}
