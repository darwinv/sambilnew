<?php
if(!isset($_SESSION))
session_start();

include_once 'clases/sedes.php';
$obj_sede = new sede();

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
			<!-- Solo para el demo -->
	<input type="hidden" value="1" id="changefondo"/>
			
		<div style="display: inline-flex; padding-top: 0px;" class="pull-right">
			<a href="https://www.facebook.com/<?php echo FACEBOOK;?>" target="_blank"><img src="galeria/img/iconos/facebook2.png" height="25" width="auto" class="marL20"></a><a href="https://twitter.com/<?php echo TWITTER;?>" target="_blank"><img src="galeria/img/iconos/twitter2.png" height="25" width="auto" class="marL20"></a><a href="https://www.youtube.com/user/<?php echo YOUTUBE;?>"><img src="galeria/img/iconos/youtube2.png" height="25" width="auto" class="marL20"></a>
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
				class="marT10 marB10 marL5" src="galeria/img/logos/logo-header.png"
				width="147px;" height="50px">
			</a>
		</div>
		<div class="collapse navbar-collapse " id="menuP">
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
		
		
		
		
			
			<form id="usr-log-form" name="usr-log-form" action="fcn/f_usuarios.php" method="POST">
				<ul class="nav navbar-nav navbar-right t16">
					
					<li ><a href="#" class="marT15 marR5 alert-reg" data-toggle='modal' data-target='#insc-red'> Inscr&iacute;bete <span
							class="glyphicon glyphicon-log-in"></span></a></li>
					<li class="dropdown"><a id="dropdown-toggle-login"  href="#" class="dropdown-toggle-login dropdown-toggle marT15 marR10"
						data-toggle="dropdown" role="button"   aria-expanded="false"
						style=""> Ingresa <span class="glyphicon glyphicon-user"></span>
					</a>
						<ul class="dropdown-menu dropdown-menu-log " role="menu">
							<li style="padding: 12px;">Inicia Sesi&oacute;n</li>
							<li style="padding: 10px;">
							<div class="form-group">
							<input type="text"
								placeholder=" Seudonimo / Correo" name="log_usuario" class=" form-input"
								id="log_usuario">
								</div></li>
							<li style="padding: 10px;"><div class="form-group"><input type="password"
								placeholder=" Contrase&#241;a" name="log_password" class=" form-input" id="log_password"></div>
								<p class="text-right t10 marR5 vin-blue">
									<a href="#" data-toggle="modal" data-target="#recover">&#191;Olvidaste la Contrase&#241;a?</a>
								</p></li>
							<li style="padding: 10px; margin-top: -20px"><button id="usr-log-submit" type="submit" 
									class="btn2 btn-primary2 btn-group-justified">Ingresar</button>
									<br>
									<button id=""
									class="btn2 btn-facebook btn-group-justified marT5 t12" disabled="disabled" >Ingresar con Facebook</button>
									
									<button id=""
									class="btn2 btn-twitter btn-group-justified marT5 t12" disabled="disabled">Ingresar con Twitter</button>
									
									</li>
							<li class="divider"></li>
							<li style="padding: 10px;"><p class="t12 text-center">&#191;Eres
									nuevo en <?php echo COMPANY;?>?</p>
								<button class="btn2 btn-default btn-group-justified" data-toggle="modal" data-target='#insc-red'>Inscr&iacute;bete</button></li>
						</ul></li>
					<li>
					<div class="dropdown ">
					  <button class="mayus  ciudades dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    
					    
					    
					    
					     <?php
					   
					     if(isset($_GET['code_sede'])){
								$ciudad_sede=$_GET['code_sede'];
		 						$_SESSION['code_sede']=$ciudad_sede;
						 }elseif(isset($_SESSION['code_sede'])){
								$ciudad_sede=$_SESSION['code_sede'];
					     }else{
					     	    $ciudad_sede="Caracas";
								$img_banner='galeria/img/apdp-slide/CARACAS.jpg';
						 }
						 
						 
						 $sedes=	$obj_sede->buscarSedes(); 
						 
						 $sedes_show=	$obj_sede->buscarSedes(); 
						 
						 $result_sede=	$obj_sede->buscarDetalleSede($sedes_show, $ciudad_sede);
						 
						 
						 
						 
						 
						 $_SESSION['id_sede']=	$result_sede[0];
						 $img_banner=			$result_sede[1];
						 $telf_sede=			$result_sede[2];
						 $email_sede=			$result_sede[3];
						 echo $result_sede[4];
						 
						// print_r($result_sede);
					     ?>
					    <span class="caret"></span>
					  </button>
					   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					   	<?php  
					   	/**mostramos las sedes, en el codigo previo se define dependiendo del dise&ntilde;o de la APP */
					   	
					   	foreach ($sedes as $key => $value) {  ?>
							<li><a href="principal.php?code_sede=<?php echo $value['codigo'] ?>"> <?php echo $value['nombre'] ?></a></li>
					    	<li role="separator" class="divider"></li>	   
						<?php
						   }
					   	?>
					  </ul> 
					</div>
					</li>
				</ul>
			</form>	
			</div>
		
		</div>
	</div>
</nav>


