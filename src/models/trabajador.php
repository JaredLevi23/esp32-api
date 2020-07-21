<?php
class Trabajador
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
  //funcion parainsertar un Trabajador nuevo
  public function insertaTrabajador($request){
    $req = json_decode($request->getbody());
    $sql = "INSERT INTO Trabajadores(Nombre,Apellido,Puesto) VALUES(:Nombre,:Apellido,:Puesto)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Apellido", $req->Apellido);
        $statement->bindparam("Puesto", $req->Puesto);
        
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje2 = $e->getMessage();
      }

    return json_encode($response);
  }

  
  //Funcion para consultar un Trabajador por su id
  public function ConsultaTrabajador($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM Trabajadores WHERE idTrabajador=:idTrabajador";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idTrabajador", $req->idTrabajador);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  
  //Funcion para eliminar un Trabajador
  public function eliminaTrabajador($request)
  {
    $req = json_decode($request->getbody());

   
      $sql = "DELETE  FROM Trabajadores where idTrabajador=:idTrabajador";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idTrabajador", $req->idTrabajador); 
        $statement->execute();
        $response->Datos_Eliminados =$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }


   //Funcion para modificar algun Producto
 public function modificarTrabajador($request)
  {
    $req = json_decode($request->getbody());

     $sql = "UPDATE Trabajadores  SET Nombre=:Nombre, Apellido=:Apellido, Puesto=:Puesto WHERE idTrabajador=:idTrabajador";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idTrabajador", $req->idTrabajador);
        $statement->bindparam("Nombre", $req->Nombre);
        $statement->bindparam("Apellido", $req->Apellido);
        $statement->bindparam("Puesto", $req->Puesto);
         
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }
  
  


}