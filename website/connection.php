<?php

echo "reconoce este archivo";

$host = $_ENV["MYSQL_SERVICE_SERVICE_HOST"];
/* $user = $_ENV["MYSQL_USER"];
$pass = $_ENV["MYSQL_PASSWORD"];
$db = $_ENV["MYSQL_DATABASE"]; */

$link = mysqli_connect($host,"root","secret","usuarios");

$SQL = "INSERT INTO clientes
 (
     nombre,
     apellidos,
     dni
 )VALUES(
     'javier',
     'garcia martin',
     '7346748'
 )
";

$resp = mysqli_query($link , $SQL)or die(mysqli_error($link));
var_dump($resp); 

?>
