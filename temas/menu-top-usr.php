<?php 

/***CODIGO PARA NOTIFICACIONES****/
if(!isset($_SESSION)){
    session_start();	
} 
	$usr = new usuario($_SESSION["id"]);
	$bd = new bd();
	$cant_compras = $usr->getCantRespuestas();
	$cant_ventas = $usr -> getCantNotificacionPregunta();
	$cant_panas = $usr -> getCantPanas();
	$cant_pub = $usr -> getCantNotiPublicaciones();
	
	$status = $usr -> s_status_usuarios_id;
	$alerts = $usr -> getAllNotificaciones($_SESSION["id"]);
	$visto=0;
	include_once "clases/publicaciones.php";
 
/***FIN*****/
 
 
						include_once 'clases/bd.php';
						include_once 'clases/fotos.php';
						include_once 'clases/sedes.php';
						include_once 'clases/restricciones.php';
						$obj_sede = new sede();
						
						/**VALIDAMOS QUE EL USUARIO NO TENGA RESTRINGIDA LA PAGINA ACTUAL**/
						$obj_restricciones = new restricciones($_SESSION['id_rol'], $_SERVER['SCRIPT_NAME']);
						$respuesta=$obj_restricciones->show_page; 
						if(!$respuesta){
						   echo '<script>window.location.replace("admin-usr.php")</script>';
						}
						
						
						//**BUSCAMOS FOTO DE USUARIO**** (DEBE CARGARSE POR EL ID DE LA SESSION)
						if (isset ( $_SESSION ["id"] )){							
							$foto_obj = new fotos();							  
							$foto_perfil =$foto_obj->buscarFotoUsuario($_SESSION ["id"]);
						}else{
							$foto_perfil ="galeria/img/logos/silueta-bill.png";
						}
	
	 

						//****BUSCAMOS DATOS DE LA SEDE*********
						
					 if(isset($_GET['code_sambil']) and $_SESSION['id_rol']!=1){
								$ciudad_sambil=$_GET['code_sambil'];
		 						$_SESSION['code_sambil']=$ciudad_sambil;
						 }elseif(isset($_SESSION['code_sambil'])){
								$ciudad_sambil=$_SESSION['code_sambil'];
					     }else{
					     	    $ciudad_sambil="Caracas";
								$img_banner='galeria/img/apdp-slide/CARACAS.jpg';
						 }
						 
						 $sedes=$obj_sede->buscarSedes(); 
						 
						 $sedes_show=$obj_sede->buscarSedes(); 
						 
						 $result_sede=$obj_sede->buscarDetalleSede($sedes_show, $ciudad_sambil);
						 
						 $_SESSION['id_sede']=	$result_sede[0];
						 $img_banner=			$result_sede[1];
						 $telf_sambil=			$result_sede[2];
						 $email_sambil=			$result_sede[3];
						 $sede_sambil=			$result_sede[4];
				
						 
//*****Codigo para Visualizacion de las opciones del menu ******

switch ($_SESSION['id_rol']) {
	case '1':
	    
		$rol='admin';
		$ruta_perfil="configuracion.php";
		$ruta_micuenta="configuracion.php";
		break;
	
	case '2':
		$rol='tienda';
		$ruta_perfil="perfil.php?id=".$_SESSION["id"];
		$ruta_micuenta="resumen.php";
		break;
		
	case '3':
		$rol='comprador';
		$ruta_perfil="configuracion.php";
		$ruta_micuenta="resumen.php";
		break;		
	
	default:
		
		break;
}
						
						
?>

<div  style="background: #FFF; color: #5051A1; padding-top: 10px; padding-bottom: 10px; font-size: 14px;">
	<div class="container">
		<div style=" display: inline-flex;">
			<a href="index.php" class="inherit-a"> <span>Inicio</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.sambil.com/Constructora" class="inherit-a"><span>Constructora Sambil </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.sambil.com/ResponsabilidadSocial" class="inherit-a"><span>Responsabilidad Social </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.sambil.com/Revista" class="inherit-a"><span>Revista Sambil </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.sambil.com/Model" class="inherit-a"><span>Sambil Model </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			
			</div>
	
	<!--	<div style="display: inline-flex; padding-top: 0px;" class="pull-right">
			<i class="fa fa-facebook t24 marL20"></i> <i class="fa fa-twitter t24 marL20"></i> <i class="fa fa-youtube t24 marL20"></i>
	</div> -->
	
<!-- Solo para el demo -->
		<input type="hidden" value="1" id="changefondo"/>
			 	
	<div style="display: inline-flex; padding-top: 0px;" class="pull-right">
			<a href="https://www.facebook.com/tusambil" target="_blank"><img src="galeria/img/iconos/facebook2.png" height="25" width="auto" class="marL20"></a><a href="https://twitter.com/tusambil" target="_blank"><img src="galeria/img/iconos/twitter2.png" height="25" width="auto" class="marL20"></a><a href="https://www.youtube.com/user/tusambil"><img src="galeria/img/iconos/youtube2.png" height="25" width="auto" class="marL20"></a>
		</div> 
		</div>
</div>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header ">
			<button type="button" class=" navbar-toggle collapsed"
				data-toggle="collapse" data-target="#menuP">
				<span class="sr-only">Mostrar / Ocultar</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a href="principal.php" class="navbar-brand"> <img style=""
				class="marT10 marB10 marL5" src="galeria/img/logo-header.png"
				width="147px;" height="50px">
			</a>
		</div>
		<div class="collapse navbar-collapse " id="menuP">
			
		<?php if($rol=='tienda' or $rol=='comprador'){?>
			<div class="navbar-form navbar-left  mar-buscador " style="margin-top: 17px;">
				<div class="input-group">
					 <input id="txtBuscar" name="txtBuscar"
						style="margin-left: -10px; border-left: trasparent;width:250px;" name="c"
						type="text" class="form-control-header2 buscador" placeholder="Buscar" >
						<span class="input-group-btn"> 
						<button class="btn-header2 btn-default-header2 buscadorBoton"
							style="width: 50px;" id="btnBuscar" name="btnBuscar">
							<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
				</div>
			</div>
		<?php } ?>
			 	
			 	
				<ul class="nav navbar-nav navbar-right t16">
					
					<li class="marT15 hidden-xs hidden-sm">
					<div class="borderS  point eti-blanco "
						style=" height: 40px; width: 40px; border-radius: 5px">
						
						
						<a href="<?php echo $ruta_perfil; ?>" > <img id="fotoperfilm" src="<?php echo $foto_perfil;?>" id=""
							class="img img-responsive center-block"
							style="border-radius: 5px; max-height: 100%; cursor: pointer;background:white;" data-container="body" data-toggle="popover" data-placement="bottom" 
							data-content="Actualiza tu foto de perfil">
						</a>
					</div>
				</li>
				<li>&nbsp;&nbsp;
				<li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle marT15"
					data-toggle="dropdown" role="button" aria-expanded="false"
					style=""> <?php echo strtoupper($_SESSION["seudonimo"]);?></a>
					<ul class="dropdown-menu blanco" role="menu">
						<li><a href="<?php echo $ruta_micuenta; ?>">Mi Cuenta </a></li>
						<?php if($rol=="tienda"){	?>
								<li><a href="perfil.php?id='<?php echo $_SESSION["id"] ?>'">Mi Perfil</a></li>
								<li><a href="publicar.php">Publicar </a></li>
						<?php } ?>
						<li><a href="salir.php">Salir</a></li>
					</ul></li>
				<li><div class="vertical-line" style="height: 25px; margin-top: 20px;"></div></li>
				
			<?php if($rol=="tienda" or $rol=="comprador"){?>	
						<?php 
$alertas = $cant_compras[0]["cant"] + $cant_ventas[0]["cant"] + $cant_panas[0]["cant"] + $cant_pub[0]["cant"];
 
?>
			 		
		
				<li id="notificacion" data-id="<?php echo $_SESSION["id"];?>" class="dropdown">
					<a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle marT15" onclick="<?php echo $visto=1; ?>" aria-expanded="false"
					style="">
					<?php if($alertas!=0){
						 echo '<span id="alerta" class="badge blanco" style="background: red; position: absolute; top: -2px; left: -1px;">';
						  echo $alertas; 
						   echo '</span>';
					}?>

					
					<i class="fa fa-bell"></i>  
					</a>
						  
			        <?php if($alerts->rowCount()>0){ ?>
					<ul class="dropdown-menu blanco alertas" role="menu"> 
						<?php 
						 
						foreach ($alerts as $a => $val) {
							$fecha = $val["fecha"];
							$tipo = $val["tipo"];
							$id_pana = $val["pana"];
							$id_pub = $val["pub"];
							$id_pre = $val["pregunta"];
							$pub = new publicaciones($id_pub);
							$segundos = strtotime('now')-strtotime($fecha);
							$tiempo = $pub -> getTiempo($segundos);
							if($tipo==1){//Pregunta
								$foto = $pub -> getFotoPrincipal();
								$title= $pub -> tituloFormateado();
								$id   = 1;
								$tema = "Te Preguntaron";
								$link = "pre_pub";
							}
							if($tipo==2){//Repuesta
								$foto = $pub -> getFotoPrincipal();
								$title= $pub -> tituloFormateado();
								$id   = 2;
								$tema = "Te Respondieron";
								$link = "resp_pub";
							}
							if($tipo==3){//Panas
								$foto = $usr -> buscarFotoUsuario($id_pana);
								$id   = $id_pana;
								$title= $usr -> getPana($id_pana);
								$tema = "Ahora te sigue";	
								$link = "ver-noti-seguidor";
							}
							if($tipo==4){//Publicacion
								$foto = $pub -> getFotoPrincipal();
								$title= $pub -> tituloFormateado();
								$tema = "Nueva Publicacion";
								$id   = $id_pub;
								$link = "detalle";
							}
						?>
						<li data-id="<?php echo $id; ?>" data-id_pub="<?php echo $id_pub; ?>"  class="<?php echo $link; ?> noti-hover pointer">
							<a class="" style="overflow: hidden;">
								<div style="display: inline-block;   ">
									<div style="padding-bottom: 5px;"><img src="<?php echo $foto; ?>" width="50px" height="50px"></div>
								</div>
								<div style="display:inline-block;    width: 145px; " >
									<div class="marL10" >						
										<b ><?php echo $title; ?></b>
									</span>
										<br>
										<span class="grisC t12"><?php echo $tema; ?></span>							
									</div>									
								</div>
								
								<div style="display: inline-block;  ">
									<!--<i class="fa fa-times" style="float: right; top: 5px;"></i>-->
									<div class="marL10"><p><span class="grisC opacity t10"><?php echo $tiempo; ?></span></p></div>
								</div>															
								

							</a>
						</li>
				<?php }?>
				
				<div class="AlertsFooter"><a class="seeMore" href="notificaciones.php" accesskey="5"><span>Ver todas</span></a></div>
				
				
						 </ul>
						 
						 <?php } ?>
				</li>		
				<?php } ?>
					
				<?php if($rol=='comprador'){  ?>						
				<li><a href="favoritos.php" data-toggle="" data-target="" class="marT15"><i
						class="fa fa-heart"></i> </a></li>
				<?php } ?>
					
			<?php if($rol=='admin'){  ?>						
				<li><a href="admin-usr.php" data-toggle="" data-target="" class="marT15"><i
						class="fa fa-user"></i> </a></li>
				<?php } ?>		
					
			<?php if($rol=='tienda'){ ?>
				<li><a href="#" data-toggle="modal" data-target="#contacto" class="marT15"><i
						class="fa fa-envelope"></i> </a></li>
						<?php } ?>		
						
						<li> &nbsp;&nbsp;&nbsp;</li>
					<li>
					<?php if($rol!='admin'){ ?>
 					
					<div class="dropdown">
					  <button class="mayus ciudades dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					  <?php echo $sede_sambil; ?>
					    <span class="caret"></span>
					  </button>
					   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					   	<?php  
					   	/**mostramos las sedes, en el codigo previo se define dependiendo del diseñde la APP */ 
						   	foreach ($sedes as $key => $value) {  ?>
								<li><a href="principal.php?code_sambil=<?php echo $value['codigo'] ?>"> <?php echo $value['nombre'] ?></a></li>
						    	<li role="separator" class="divider"></li>	   
							<?php
							   }
						 
					   	?>
					   
					  </ul>
					</div>
				<?php } else { ?>			
					<div class="dropdown">
					  <div class="mayus ciudades dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					  <?php echo $ciudad_sambil ?>   
					  </div>
					  	</div>
					</li>
					<?php } ?>	
					 
				</ul>
			</div>
		
		</div>
	</div>
</nav>


