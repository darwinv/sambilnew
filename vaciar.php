<?php
include "clases/bd.php";
$bd=new bd();
$tablas=array();


$tablas[]="publicaciones_montos";
$tablas[]="preguntas_publicaciones";

$tablas[]="usuarios_naturales";
$tablas[]="usuarios";
$tablas[]="visitas_publicaciones";

$i=0;
foreach($tablas as $t=>$valor){
	$bd->query("delete from {$valor}");var_dump($i++);
}
echo "Termino";
?>