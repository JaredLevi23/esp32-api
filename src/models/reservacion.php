<?php
class Reservacion
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


                                      //*******TABLA Reservacion**********
  //funcion parainsertar una Reservacion nueva
  public function insertaReservacion($request){
    $req = json_decode($request->getbody());
    $sql = "INSERT INTO Reservaciones(idCliente,Fecha,Hora,Capacidad) VALUES(:idCliente,:Fecha,:Hora,:Capacidad)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idCliente", $req->idCliente);
        $statement->bindparam("Fecha", $req->Fecha);
        $statement->bindparam("Hora", $req->Hora);
        $statement->bindparam("Capacidad", $req->Capacidad);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje2 = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para consultar una Reservacion por su id
  public function ConsultaReservacion($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM Reservaciones WHERE idReservacion=:idReservacion";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idReservacion", $req->idReservacion);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para eliminar una reservacion
  public function eliminaReservacion($request)
  {
    $req = json_decode($request->getbody());

   
      $sql = "DELETE  FROM Reservaciones where idReservacion=:idReservacion";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idReservacion", $req->idReservacion); 
        $statement->execute();
        $response->Datos_Eliminados =$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }

   //Funcion para modificar alguna Reservacion
 public function modificarReservacion($request)
  {
    $req = json_decode($request->getbody());

     $sql = "UPDATE Reservaciones  SET idCliente=:idCliente, Fecha=:Fecha, Hora=:Hora, Capacidad=:Capacidad WHERE idReservacion=:idReservacion";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idReservacion", $req->idReservacion);
        $statement->bindparam("idCliente", $req->idCliente);
        $statement->bindparam("Fecha", $req->Fecha);
        $statement->bindparam("Hora", $req->Hora);
        $statement->bindparam("Capacidad", $req->Capacidad);
         
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }
  
  
  


}