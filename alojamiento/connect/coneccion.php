<?php 

session_start();

$user = "epiz_31531525";
$pass = "7CWNwZnUvY";
$url = "sql304.epizy.com";
$db = "epiz_31531525_practica_de_crud";
//coneccion a la bd llamada practica_de_crud :D
$conectado = mysqli_connect($url,$user,$pass,$db);
?>