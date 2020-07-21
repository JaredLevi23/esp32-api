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

  public function insertCliente($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO Clientes(Nombre,Apellido,Email,Telefono,Direccion) VALUES(:nombre,:apellido,:email,:telefono,:direccion)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("Nombre: ", $req->nombre);
        $statement->bindparam("Apellido: ", $req->apellido);
        $statement->bindparam("Email: ", $req->email);
        $statement->bindparam("Telefono: ", $req->telefono);
        $statement->bindparam("Direccion: ", $req->direccion);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  /*
  public function getSensorData($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM ejemplo WHERE id=:id";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id", $req->id);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function eliminarSensor($request)
  {
    $req = json_decode($request->getbody());

    //$sql = "INSERT INTO ejemplo(sensor,valor) VALUES(:sensor,:valor)";
      $sql = "DELETE  FROM ejemplo where id=:id";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id", $req->id); 
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }

 public function modificarSensor($request)
  {
    $req = json_decode($request->getbody());

    //$sql = "INSERT INTO ejemplo(sensor,valor) VALUES(:sensor,:valor)";
     // $sql = "DELETE  FROM ejemplo where id=:id";
     $sql = "UPDATE ejemplo  SET sensor=:sensor, valor=:valor WHERE id=:id";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id", $req->id);
        $statement->bindparam("sensor", $req->sensor);
        $statement->bindparam("valor", $req->valor); 
         
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  } */
  
}
