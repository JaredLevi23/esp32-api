<?php
class Pedidos
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


                                      //*******TABLA Pedidos**********
  //funcion para insertar un Pedido nuevo
  public function insertaPedidos($request){
    $req = json_decode($request->getbody());
    $sql = "INSERT INTO Pedidos(idCliente,Fecha,Hora) VALUES(:idCliente,:Fecha,:Hora)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idCliente", $req->idCliente);
        $statement->bindparam("Fecha", $req->Fecha);
        $statement->bindparam("Hora", $req->Hora);
        
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje2 = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para consultar una Reservacion por su id
  public function ConsultaPedidos($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM Pedidos WHERE idPedido=:idPedido";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPedido", $req->idPedido);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  //Funcion para eliminar un Pedido
  public function eliminaPedidos($request)
  {
    $req = json_decode($request->getbody());

   
      $sql = "DELETE  FROM Pedidos where idPedido=:idPedido";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPedido", $req->idPedido); 
        $statement->execute();
        $response->Datos_Eliminados =$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }

   //Funcion para modificar alguna Reservacion
 public function modificarPedidos($request)
  {
    $req = json_decode($request->getbody());

     $sql = "UPDATE Pedido  SET idCliente=:idCliente, Fecha=:Fecha, Hora=:Hora WHERE idPedido=:idPedido";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPedido", $req->idPedido);
        $statement->bindparam("idCliente", $req->idCliente);
        $statement->bindparam("Fecha", $req->Fecha);
        $statement->bindparam("Hora", $req->Hora);
        
         
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);

  }
  
  
  


}