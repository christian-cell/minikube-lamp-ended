<?php


namespace smartCalendar;
include_once('connection.php');
include_once('cors.php');

class NuevoCliente extends Conexion{

  function CreateClient  ()
  {
    $link = $this->Connect();

    $SQL = "INSERT INTO clientes
        (
            nombre,
            apellidos,
            dni
        )VALUES(
            'carlos',
            'garcia , romero',
            '83892902'
        )
    ";

    $resp = mysqli_query($link , $SQL) or die(mysqli_error($link));
    echo $resp;
  }

}

$nuevoClienteClass = new NuevoCliente();
$nuevoClienteClass->CreateClient();

?>