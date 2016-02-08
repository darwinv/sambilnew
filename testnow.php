<?php
include 'clases/bd.php';
 $sql=new bd();
 
 $query="INSERT INTO reset_clave (id_usuario,seudonimo,token,creado) VALUES ('1247','OLOPEZDEVELOPER','6e8ed5d9166a86ec207308282ffda8354a934d7', now())";
$res=$sql->query($query);

 ?>