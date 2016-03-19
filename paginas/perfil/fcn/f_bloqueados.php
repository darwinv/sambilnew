<?php
include '../../../config/core.php';
include_once "../../../clases/amigos.php";
session_start();
$amigos = new amigos();
if(filter_input(INPUT_GET, "action") == "bloquear"){
	$result2=$amigos->borrarSeguidor($_GET["userbloq"],$_GET["id"]);
	$result=$amigos->nuevoBloqueo($_GET["id"], $_GET["userbloq"]);
	//$amigos->setNotificacion(3,$_GET["id"],$_GET["seguidor"]);
	if($result and $result2)
		echo json_encode(array("result" => "OK", "result"=>$result2));
	else 
		echo json_encode(array("result" => "error"));
		
} 
?>