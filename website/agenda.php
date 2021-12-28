<?php

/* POO */


namespace smartCalendar;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


require_once("conexion.php");

class Agenda extends Conexion {

  function GetAgenda($especialista , $id_agenda , $motivo )
  {
    /* var_dump($motivo);
    var_dump($especialista);
    var_dump($id_agenda); */
    $link1 = $this->Connect();

    $SQL = "SELECT A.* , E.especialista ,E.color FROM agenda AS A LEFT JOIN especialistas AS E
    ON A.id_especialista = E.id_especialista WHERE true  ";

    if(isset($id_agenda) && !empty($id_agenda)) $SQL =  $SQL." AND A.id_agenda = '$id_agenda' ";
    if(isset($motivo) && !empty($motivo)) $SQL = $SQL.=" AND A.motivo LIKE '%{$motivo}%' ";
    if(isset($especialista) && !empty($especialista)) $SQL = $SQL." AND E.especialista LIKE '%{$especialista}%' ";
     

    /* if(isset($especialista) && $especialista !== "Todos") $SQL = $SQL."AND E.especialista LIKE '%{$especialista}%' ";
    if(isset($id_agenda)) $SQL = $SQL.=" AND id_agenda = '$id_agenda' ";
     */
    $SQL_resp = mysqli_query($link1 , $SQL)or die(mysqli_error($link1));

    $fila = 0;
    $events = [];

    while ($dato = mysqli_fetch_array($SQL_resp)){
      // var_dump($dato);
      $events[$fila]['title'] = $dato['cliente'];
      $events[$fila]['date'] = $dato['fecha'];
      $events[$fila]['start'] = $dato['fecha'].'T'.$dato['hora'];
      $events[$fila]['end'] = $dato['fecha'].'T'.$dato['hora_fin'];
      $events[$fila]['id'] = $dato['id_agenda'];
      $events[$fila]['especialista_id'] = $dato['id_especialista'];
      $events[$fila]['especialista'] = $dato['especialista'];
      $events[$fila]['color'] = $dato['color'];
      $events[$fila]['motivo'] = $dato['notas'];

      $fila++;
  
    };

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($events); 

  }

}

$agenda = new Agenda();
/* optional arguments to can use this service to return all appointments && appointments filtered  */
$getAgenda = $agenda->GetAgenda( $especialista = $_GET['especialista'] , $id_agenda = $_GET['agenda_id'] 
, $motivo = $_GET['motivo'] )





/* $SQL = "SELECT A.* , E.especialista ,E.color FROM agenda AS A LEFT JOIN especialistas AS E
ON A.id_especialista = E.id_especialista WHERE true  ";

if(isset($_GET["agenda_id"])){ $SQL = $SQL." AND id_agenda = ". $_GET["agenda_id"] ;};

if(isset($_GET['especialista']) && $_GET['especialista'] !== 'Todos' ){ 
  $especialista = $_GET['especialista'];
  $SQL = $SQL." AND E.especialista LIKE '%{$especialista}%' " ;
};

$resp = mysqli_query($link , $SQL) ;

$fila = 0;
$events = [];
while ($dato = mysqli_fetch_array($resp)){
  $events[$fila]['title'] = $dato['cliente'];
  $events[$fila]['date'] = $dato['fecha'];
  $events[$fila]['start'] = $dato['fecha'].'T'.$dato['hora'];
  $events[$fila]['end'] = $dato['fecha'].'T'.$dato['hora_fin'];
  $events[$fila]['id'] = $dato['id_agenda'];
  $events[$fila]['especialista_id'] = $dato['id_especialista'];
  $events[$fila]['especialista'] = $dato['especialista'];
  $events[$fila]['color'] = $dato['color'];

  $fila++;
  
};

header('Content-type:application/json;charset=utf-8');
echo json_encode($events);  */

?>