<script>

function buscaDerecha(){
	var Pagina=$("#listaPublicaciones").data("pagina");
	inicio = (Pagina-1)*5;
	siguiente = Pagina*5;
//	for(x=inicio+1;x<=siguiente;x++){
			var x=inicio + 1;
			$("#"+x).hide("swing",{queue:true},function(){
				$("#"+(siguiente+x)).show("swing");
			});
			x++;
			$("#"+x).hide("swing",{queue:true},function(){
				$("#"+(siguiente+x)).show("swing");
			});
			x++;
			$("#"+x).hide("swing",function(){
				$("#"+(siguiente+x)).show("swing");
			});
			x++;
			$("#"+x).hide("swing",function(){
				$("#"+(siguiente+x)).show("swing");
			});
			x++;
			$("#"+x).hide("swing",function(){
				$("#"+(siguiente+x)).show("swing");
			});			
			//elDiv.toggle("fast","easeOutQuad",function(){
				//elDiv.html(data);
				//elDiv.show( "slide",{direction:'down'});
				//elDiv.toggle("easeinSine");	
//	}	
	Pagina++;
	$("#listaPublicaciones").data("pagina",Pagina);
}

/*function getPublicaciones(numero){
	var Pagina=$("#listaPublicaciones").data("pagina");
	var elDiv=$("#listaPublicaciones");
		$.ajax({
		async: true,
		url:"fcn/f_index.php",
		data:{metodo:"buscarPublicaciones",pagina:Pagina,numero:numero},
		type:"POST",
		dataType:"html",
		success: function(data){
			//alert(x);
			//elD.delay(10000)iv.hide('swing');
			//elDiv.hide("slow");
			elDiv.html(data);
			elDiv.delay(100000).show("swing");
			//elDiv.toggle("fast","easeOutQuad",function(){
				//elDiv.html(data);
				//elDiv.show( "slide",{direction:'down'});
				//elDiv.toggle("easeinSine");
			//});
		}
	});
}*/

function buscaIzquierda(){
	var Pagina=$("#listaPublicaciones").data("pagina");
	fin = ((Pagina-1)*5);
	inicio = Pagina*5;
	i=0;
	while(i<5){
		i++;
		$("#"+inicio).hide("swing");
		$("#"+fin).show("swing");
		inicio--;
		fin--;
	}
	
	Pagina--;
	$("#listaPublicaciones").data("pagina",Pagina);	
}	
function verDetalle(elId){
	window.open("detalle.php?id=" + elId,"_self");
}
</script>
<?php
include_once "clases/publicaciones.php";
include_once "clases/usuarios.php";
include_once "clases/bd.php";
include_once "clases/fotos.php";
$foto=new fotos();
?>
  
  
  
   <div class="anchoC center-block marB20">
   	  <?php include_once "fcn/f_categorias.php"; ?>
   </div>






<!--Ultimas publicaciones --------------------------------------------------------------------------------------------------------------- -->
<?php
	$bd=new bd(); 

	$consulta="select * from publicaciones where 
	usuarios_id in (SELECT
	usuarios.id
	FROM
	usuarios where
	usuarios.id_sede ='".$_SESSION['id_sede']."' )
	and
	id in (select publicaciones_id from publicacionesxstatus where status_publicaciones_id=1 and fecha_fin IS NULL) order by id desc limit 25";
	$result=$bd->query($consulta);
	$total_publicaciones=$result->rowCount();
	
	if($total_publicaciones>0){
?>
<br>
<br>
<div  class="anchoC   marB5 ">
<div class="row  " style="background:#666;  -webkit-border-top-left-radius: 50px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 10px;
border-top-right-radius: 10px;" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad5 t18 blanco">
<span class="marL10" >Publicaciones m&aacute;s recientes</span>
</div>
</div>
</div>
<i class="fa fa-caret-down" style="color:#666;  font-size: 60px; margin-top: -30px; "></i>

   <div  class="anchoC  center-block " style="margin-top: -35px;"  >
    <div class="row contenedor sombra-div4  hover-publicaciones" style="-webkit-border-bottom-right-radius: 10px;
-webkit-border-bottom-left-radius: 10px;
-moz-border-radius-bottomright: 10px;
-moz-border-radius-bottomleft: 10px;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;" >
 
    <div class="hidden-xs hidden-sm col-md-1 col-lg-1">
      <p class="text-left mar20 hidden" style="border-right: 1px solid #ccc;">
        <span class="negro t26 ">Ultimas <br> p&uacute;blicaciones</span>
        <br><br>
        <span class="">echale un vistazo a las publicaciones m&aacute;s recientes.</span>
        <br><br> 
        <span class="vin-blue t18 " style="text-decoration:underline;"><a href="listado.php">Ver m&aacute;s...</a></span>
         <br>
        <br>
        <br>
        <br>
      </p>
    </div>
    
<?php
 
	$i=0;
    foreach($result as $r){
    	$i++;
    	$publicacion=new publicaciones($r["id"]);
		$usua=new usuario($publicacion->usuarios_id);
		?>
    	<div id="<?php echo $i; ?>" class='col-xs-12 col-sm-12 col-md-6 col-lg-2' <?php if($i<=5){?> style="display:block;" <?php } else {?> style="display:none"<?php } ?>>
	    <?php if($i==6 or $i== 11 or $i==16 or $i==21){ ?>
	    	<i class='fa fa-chevron-circle-left t38 point 'style='color: 	#ccc; position:absolute; top:37%; left:-2%; ' id='izquierda' onClick='javascript:buscaIzquierda();'></i>
	    <?php } ?>	
	    			<div class='text-center mar10 publicaciones1' style='relative;width:70%;' id='<?php echo $publicacion->id; ?> '>
				    	<br>
				    	<div class='marco-foto-conf  point center-block sombra-div3 ' style='height:120px; width: 120px;'  >
						<img src='<?php echo $publicacion->getFotoPrincipal(); ?> '  class=' img-responsive center-block img-apdp'>
						</div>
						<br>
						<span class='negro t16'><?php echo $publicacion->tituloFormateado(15); ?> </span>
						<br>
						<span class='red t14'><b><?php echo $publicacion->getMonto(); ?> </b></span>
						<br>
					    <span class='t12 grisC'><i class='fa fa-clock-o'></i><?php echo $publicacion->getTiempoPublicacion(); ?> </span>
						<br>
					</div>
			<?php if($i==5 or $i==10 or $i==15 or $i==20){ ?>
			<i class='fa fa-chevron-circle-right t38 point derecha'style='color: 	#ccc; position:absolute; float:right; top:37%; right:-15%; ' id='derecha' onClick='javascript:buscaDerecha();'></i>
			<?php } ?>
		</div>
		<?php
	}
?>

	<div class="hidden-xs hidden-sm col-md-1 col-lg-1">
      <p class="text-left mar20 hidden" style="border-right: 1px solid #ccc;">
        <span class="negro t26 ">Ultimas <br> p&uacute;blicaciones</span>
        <br><br>
        <span class="">echale un vistazo a las publicaciones m&aacute;s recientes.</span>
        <br><br> 
        <span class="vin-blue t18 " style="text-decoration:underline;"><a href="listado.php">Ver m&aacute;s...</a></span>
         <br>
        <br>
        <br>
        <br>
      </p>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="text-right ancho95 "> <a href="listado.php">Ver Todas</a> </div>
    	<br>
    </div>
    
   </div>
    <!-- Hasta aqui -->
    </div>
  
<?php 
}
?>



<!-- 5 mas visitadas --------------------------------------------------------------------------------------------------------------- -->


  
   <div  class="anchoC  center-block hidden">
    <div class="row contenedor sombra-div hover-publicaciones ">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
      <p class="text-left mar20" style="border-right: 1px solid #ccc;">
        <span class="negro t26 ">Top 5 <br> M&aacute;s Visitados</span>
        <br><br>
        <span>Echale un vistazo a las publicaciones m&aacute;s populares.</span>
        <br><br>
        <span class="vin-blue t18" style="text-decoration:underline;"><a href="#">Ver m&aacute;s...</a></span>
        <br>
        <br>
      
      </p>
    </div>
 
    <!-- Desde aqui -->
    <?php
    /*    VISITAS REVISAR
//    $consulta="select visitas_publicaciones_id from publicaciones where id in (select publicaciones_id from publicacionesxstatus where status_publicaciones_id=1)";
    $consulta2="select * from visitas_publicaciones order by numero desc";
	$result=$bd->query($consulta2);
	$i=0;
    foreach($result as $r){
//    	echo $publicacion->id . "<br>";
        $i++;
    	$resultado=$bd->doSingleSelect("publicaciones","visitas_publicaciones_id={$r['id']}");
		$publicacion=new publicaciones($resultado["id"]);
		$usua=new usuario($publicacion->usuarios_id);
    	$cadena="
	    	<div class='col-xs-12 col-sm-12 col-md-6 col-lg-2'>
	    			<div class='text-center mar10 publicaciones2' style='relative;width:70%;'  id='$publicacion->id'>
				    	<br>
				    	<div class='marco-foto-conf  point center-block sombra-div3 ' style='height:120px; width: 120px;'  >
					<span class=' badge2 sombra-div2'STYLE='position:absolute; top:6%; left:8%;  '>$i</span> 
						<img src='" . $publicacion->getFotoPrincipal() . "' width='100%;' height='100%;' class=' img-responsive center-block'>
						</div>
						<br>
						<span class='negro t16'>" . $publicacion->tituloFormateado() . "</span>
						<br>
						<span class='red t14'><b>" . $publicacion->getMonto() . "</b></span>
						<br>
						<span class='t12 grisC '>" . $usua->getEstado() . "</span> / <span class='t10 grisC'> 3500 <i class='fa fa-eye'></i> </span>
						<br>
						<br>
					</div>
			</div>
		";
		echo $cadena;
		if($i==5){
			break;
		}
	}
*/
   ?>
   </div></div>
   <!-- Hasta aqui -->
   
   
   <!-- 5 vendedores --------------------------------------------------------------------------------------------------------------- -->
  <?php
//	$result=$bd->query("select count(*) as tota,usuarios_id from publicaciones where id in (select publicaciones_id from publicacionesxstatus where status_publicaciones_id=1 and fecha_fin IS NULL) group by usuarios_id order by tota desc limit 5");
//	$result=$bd->query("select count(*) as tota from usuarios_favoritos  group by favoritos_id order by tota desc limit 5");	

$result=$bd->query("SELECT
					usuarios.id AS id_tienda ,
					(select  count(*) as tota from usuarios_amigos where usuarios_id=usuarios.id ) AS cantLikes,
					(select  count(*) as tota from publicaciones where usuarios_id=usuarios.id ) AS cantPub
					FROM
					usuarios
					Inner Join usuarios_accesos ON usuarios.id = usuarios_accesos.usuarios_id
					WHERE
					usuarios_accesos.id_rol =  '2' AND
					usuarios_accesos.status_usuarios_id =  '1' AND
					usuarios.id_sede =  '".$_SESSION['id_sede']."'
					ORDER BY
					cantLikes DESC,
					cantPub DESC
					limit 5"); 
					
	$total_tiendas=$result->rowCount();
	
	if($total_tiendas>0){
					?>
					
<br><br> 
   <br>
<div  class="anchoC   marB5 " style="">
<div class="row  " style="background:#666; -webkit-border-top-left-radius: 50px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 10px;
border-top-right-radius: 10px;" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad5 t18 blanco">
	<span class="marL20"> Tiendas destacadas</span>
</div>
</div>
</div>
<i class="fa fa-caret-down" style="color:#666; font-size: 60px; margin-top: -30px; "></i>
  
   <div  class="anchoC  center-block " style="margin-top: -35px;"  >
    <div class="row contenedor3  sombra-div4 hover-vendedores" style="-webkit-border-bottom-right-radius: 10px;
-webkit-border-bottom-left-radius: 10px;
-moz-border-radius-bottomright: 10px;
-moz-border-radius-bottomleft: 10px;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px; " >

<div class="hidden-xs hidden-sm col-md-1 col-lg-1">
      <p class="text-left mar20 hidden" style="border-right: 1px solid #ccc;">
        <span class="negro t26 ">Ultimas <br> p&uacute;blicaciones</span>
        <br><br>
        <span class="">echale un vistazo a las publicaciones m&aacute;s recientes.</span>
        <br><br> 
        <span class="vin-blue t18 " style="text-decoration:underline;"><a href="listado.php">Ver m&aacute;s...</a></span>
         <br>
        <br>
        <br>
        <br>
      </p>
    </div>

 <!--   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
      <p class="text-left mar20" style="border-right: 1px solid #ccc;">
        <span class="negro t26 ">Top 5 <br> Vendedores</span>
        <br><br>
        <span>Echale un vistazo a los vendedores m&aacute;s destacados.</span>
        <br><br>
        <span class="vin-blue t18" style="text-decoration:underline; visibility: hidden;"><a href="#">Ver m&aacute;s...</a></span>
        <br>
        <br>
        <br>
      
      </p>
 </div> -->
 
    <!-- Desde aqui -->
    <?php
 

	$i=0;
    foreach($result as $r){
    	$i++;
		$usua=new usuario($r["id_tienda"]);
		$nombre=$usua->getNombre(1);
    	$cadena="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-2'>
	    		 <div class='text-center mar10 vendedores' id='$usua->id' style='relative;width:70%;' >
				    	<br>
				    	<div class='marco-foto-conf  point center-block sombra-div3 ' style='height:120px; width: 120px;'  >					
							<img src='" . $foto->buscarFotoUsuario($usua->id) . "' class=' img-responsive center-block img-apdp'>
						</div>
						<br>
						<span class='blue-vin t16'> " . $nombre . "</span>
						<br>
						<span class='t12 grisC'> <i class='fa fa-thumbs-o-up'></i> <span class='t12 grisC'>{$r["cantLikes"]}</span>
						<br>
						<br>
					
					</div>  
			</div> "; 
		echo $cadena;
		if($i==5){
			break;
		}	
	}
	
	
   ?>  
    
   </div>
   </div>
   
     <?php
     }
     ?>
   <!-- Hasta aqui -->
   
   
   
   
   
   <br><br> 
      <br><br> 
         
   
  
  