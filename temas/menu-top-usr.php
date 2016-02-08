<?php  		
						include_once 'clases/usuarios.php';
						include_once 'clases/bd.php';
						include_once 'clases/fotos.php';
						include_once 'clases/sedes.php';
						include_once 'clases/restricciones.php';
						$obj_sede = new sede();
						
						/**VALIDAMOS QUE EL USUARIO NO TENGA RESTRINGIDA LA PAGINA ACTUAL**/
						$obj_restricciones = new restricciones($_SESSION['id_rol'], $_SERVER['SCRIPT_NAME']);
						$respuesta=$obj_restricciones->show_page; 
						if(!$respuesta){
						   echo '<script>window.location.replace("resumen.php")</script>';
						}
						
						
						
						if (isset ( $_SESSION ["id"] )){							
							$foto_obj = new fotos();							  
							$foto_perfil =$foto_obj->buscarFotoUsuario($_SESSION ["id"]);
						}else{
							$foto_perfil ="galeria/img/logos/silueta-bill.png";
						}
	
	/*$usua=new usuario($_SESSION ["id"]);
	$sede_obj = new bd ();
	$id_sede	=$usua->u_id_sede;
	$row=array('indice' => 'id','value' => $id_sede);
	$valsede=$sede_obj->getAllDatos ( "sedes", $row);
	if($valsede)
		$_SESSION['code_sambil']=$valsede[0]['nombre'];*/

	
					  if(isset($_GET['code_sambil'])){
								$ciudad_sambil=$_GET['code_sambil'];
		 						$_SESSION['code_sambil']=$ciudad_sambil;
						 }elseif(isset($_SESSION['code_sambil'])){
								$ciudad_sambil=$_SESSION['code_sambil'];
					     }else{
					     	    $ciudad_sambil="Caracas";
								$img_banner='galeria/img/apdp-slide/CARACAS.jpg';
						 }
						 
						 $sedes=	$obj_sede->buscarSedes(); 
						 
						 $sedes_show=	$obj_sede->buscarSedes(); 
						 
						 $result_sede=	$obj_sede->buscarDetalleSede($sedes_show, $ciudad_sambil);
						 
						 $_SESSION['id_sede']=	$result_sede[0];
						 $img_banner=			$result_sede[1];
						 $telf_sambil=			$result_sede[2];
						 $email_sambil=			$result_sede[3];
						 $sede_sambil=			$result_sede[4];
/*****Codigo para Visualizacion de las opciones del menu ******/
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
						<li><a href="#" data-toggle="" data-target="" class="marT15"><i
								class="fa fa-bell"></i> </a></li>	
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
					   	/**mostramos las sedes, en el codigo previo se define dependiendo del diseño de la APP */
					   	
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
					  <?php echo $sede_sambil; ?>   
					  </div>
					  	</div>
					</li>
					<?php } ?>	
					<!--<li ><a href="#" class="marT10 alert-reg" data-toggle='modal' data-target='#actualizar2'> Inscribete <span
							class="glyphicon glyphicon-log-in"></span></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle marT10"
						data-toggle="dropdown" role="button" aria-expanded="false"
						style=""> Ingresa <span class="glyphicon glyphicon-user"></span>
					</a>
						<ul class="dropdown-menu dropdown-menu-log " role="menu">
							<li style="padding: 12px;">Inicia Sessi&oacute;n</li>
							<li style="padding: 10px;">
							<div class="form-group">
							<input type="text"
								placeholder=" Seudonimo / Correo" name="log_usuario" class=" form-input"
								id="log_usuario">
								</div></li>
							<li style="padding: 10px;"><div class="form-group"><input type="password"
								placeholder=" Contrase&#241;a" name="log_password" class=" form-input" id="log_password"></div>
								<p class="text-right t10 marR5 vin-blue">
									<a>&#191;Olvidaste la Contrase&#241;a?</a>
								</p></li>
							<li style="padding: 10px; margin-top: -20px"><button id="usr-log-submit" type="submit" 
									class="btn2 btn-primary2 btn-group-justified">Ingresar</button>
									<br>
									<button id="fb_log_button"
									class="btn2 btn-facebook btn-group-justified marT5 t12">Ingresar con Facebook</button>
									
									<button id="tw_log_button"
									class="btn2 btn-twitter btn-group-justified marT5 t12">Ingresar con Twitter</button>
									
									</li>
							<li class="divider"></li>
							<li style="padding: 10px;"><p class="t12 text-center">&#191;Eres
									nuevo en Apreciodepana?</p>
								<button class="btn2 btn-default btn-group-justified " data-toggle="modal" data-target="#actualizar2">Inscribete</button></li>
						</ul></li>-->
				</ul>
			</div>
		
		</div>
	</div>
</nav>


