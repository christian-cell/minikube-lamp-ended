<?php

/* POO */

namespace smartCalendar;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

include("conexion.php");

class Client extends Conexion {
 
    function GetClients ()
    {
        $link1 = $this->Connect();

        $SQL = "SELECT id_cliente , nombre FROM clientes WHERE true ";
        $resp = mysqli_query($link1 , $SQL) ;

        $fila = 0;
        $arr = [];
        while ($dato = mysqli_fetch_array($resp)){

            $arr[$fila]['id_cliente'] =  $dato['id_cliente'];
            $arr[$fila]['nombre'] =  $dato['nombre'];
            
            $fila++; 
        };

        header('Content-type:application/json;charset=utf-8');
        echo json_encode($arr);
    }
}

$clients = new Client();
$clients->GetClients();


/* $SQL = "SELECT id_cliente , nombre FROM clientes WHERE true ";
$resp = mysqli_query($link , $SQL) ;

$fila = 0;
$arr = [];
while ($dato = mysqli_fetch_array($resp)){

    $arr[$fila]['id_cliente'] =  $dato['id_cliente'];
    $arr[$fila]['nombre'] =  $dato['nombre'];
    
    $fila++; 
};

header('Content-type:application/json;charset=utf-8');
echo json_encode($arr); */

?>