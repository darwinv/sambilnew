<?php
include_once "../clases/publicaciones.php";
include_once "../clases/bd.php";
include_once "../clases/usuarios.php";
switch($_POST["metodo"]){
	case "buscarPublicaciones":
		buscaPublicaciones();
		break;	
}
 
 function buscaPublicaciones(){
    $bd=new bd();
	if (! isset ( $_SESSION )) {
		session_start ();
	}
	$inicio=(($_POST["pagina"] - 1)*5);
	
	$consulta="select * from publicaciones where 
	usuarios_id in (SELECT
	usuarios.id
	FROM
	usuarios where
	usuarios.id_sede ='".$_SESSION['id_sede']."' )
	and
	id in (select publicaciones_id from publicacionesxstatus where status_publicaciones_id=1 and fecha_fin IS NULL) order by id desc limit 5 OFFSET $inicio";
	$result=$bd->query($consulta);
	 
	$resultTotal=$bd->query("select count(*) as tota from publicaciones where usuarios_id in (SELECT
	usuarios.id
	FROM
	usuarios where
	usuarios.id_sede ='".$_SESSION['id_sede']."' ) and id in (select publicaciones_id from publicacionesxstatus where status_publicaciones_id=1 AND fecha_fin IS NULL)");
	foreach ($resultTotal as $r => $valor) {
		$total=$valor["tota"];
	}	
	echo "<div class='hidden-xs hidden-sm col-md-1 col-lg-1'></div>";
	 
	$i=0;
   foreach($result as $r){
   	
    	$i++;
    	$publicacion=new publicaciones($r["id"]);
		$usua=new usuario($publicacion->usuarios_id);
		if($_POST["pagina"]==1){
			$izquierda="";
		}else{
			$izquierda=($i==1)?"<i class='fa fa-chevron-circle-left t38 point 'style='color: 	#ccc; position:absolute; top:37%; left:-20%; ' id='izquierda' onClick='javascript:buscaIzquierda();'></i>":"";
		}
		if($_POST["pagina"]==5){
			$derecha="";
		}else{
			if($total<=$_POST["pagina"]*5){
				$derecha="";
			}else{
				$derecha=($i==5)?"<i class='fa fa-chevron-circle-right t38 point derecha' style='color: 	#ccc; position:absolute; float:right; top:37%; right:-15%; ' id='derecha' onClick='javascript:buscaDerecha();'></i>":"";
			}
		}
    	$cadena="
	    	<div class='col-xs-12 col-sm-12 col-md-6 col-lg-2'>
	    	 $izquierda 
	    			<div class='text-center mar10 publicaciones1' style='relative;width:70%;' id='".$publicacion->id."'>
				    	<br>
				    	<div class='marco-foto-conf  point center-block sombra-div3 ' style='height:120px; width: 120px;'  >
						<img src='".$publicacion->getFotoPrincipal()."'  class=' img-responsive center-block img-apdp'>
						</div> 
						<br>
						<span class='negro point t16'>".$publicacion->tituloFormateado(15)."</span>
						<br>
						<a href='perfil.php?id=".$usua->id."' ><span class='blue-vin t16' >".$usua->j_razon_social."</span></a>
						<br>
						<span class='red t14'><b>".$publicacion->getMonto()."</b></span>
						<br>
					    <span class='t12 grisC'><i class='fa fa-clock-o'></i>". $publicacion->getTiempoPublicacion() . "</span>
						<br>
					</div>
					$derecha 
			</div>";
		echo $cadena;
		if($i==5){
			echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<div class="text-right ancho95 "> <a href="listado.php">Ver Todas</a> </div>
				    	<br>
				    </div>';
			break;
		}
		}
}
?>