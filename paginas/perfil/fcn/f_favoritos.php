<?php
include_once "../../../clases/amigos.php";
session_start();
$amigos = new amigos();
if(filter_input(INPUT_GET, "action") == "like"){
	$amigos->nuevoSeguidor(date("Y-m-d",time()), $_SESSION["id"], $_GET["id"]);
	echo json_encode(array("result" => "OK"));
} else {
	$amigos->borrarSeguidor($_SESSION["id"], $_GET["id"]);
	echo json_encode(array("result" => "OK"));
}