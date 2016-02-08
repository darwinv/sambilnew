<div  style="background: #FFF; color: #5051A1; padding-top: 10px; padding-bottom: 10px; font-size: 14px;">
	<div class="container">
		<div style=" display: inline-flex;">
			<a href="index.php" class="inherit-a"> <span>Inicio</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="inherit-a"><span>Constructora Sambil </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="inherit-a"><span>Responsabilidad Social </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="inherit-a"><span>Revista Sambil </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="inherit-a"><span>Sambil Model </span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			
			</div>
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
			
				<ul class="nav navbar-nav navbar-right t16">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle marT15"
					data-toggle="dropdown" role="button" aria-expanded="false"
					style=""><i class="fa fa-user"></i> JEAN ALVIAREZ </a>
					<ul class="dropdown-menu blanco" role="menu">
						<li><a href="resumen.php">Mi Cuenta</a></li>
						<li><a href="#">Mi Perfil</a></li>
						<li><a href="salir.php">Salir</a></li>
					</ul></li>
				<li>
					<div class="vertical-line "
						style="height: 25px; margin-top: 20px;"></div>
				</li>
				<li ><a href="#" data-toggle="" data-target="" class="marT15"><i
						class="fa fa-bell"></i> </a></li>							
				<li><a href="favoritos.php" data-toggle="" data-target="" class="marT15"><i
						class="fa fa-heart"></i> </a></li>
						<li><a href="#" data-toggle="modal" data-target="#contacto" class="marT15"><i
						class="fa fa-envelope"></i> </a></li>
						<li> &nbsp;&nbsp;&nbsp;</li>
					<li>
					<div class="dropdown">
					  <button class="mayus ciudades dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    
					    <?php
					    if(isset($_GET['code_sambil'])){
					    	$ciudad_sambil=$_GET['code_sambil'];
							
							$ciudad_sambil=str_replace('-', ' ', $ciudad_sambil); 
							
							$img_banner='';
							
							if($ciudad_sambil==('Caracas')) 		$img_banner='galeria/img/apdp-slide/CARACAS.png';
							if($ciudad_sambil==('San Cristobal'))	$img_banner='galeria/img/apdp-slide/SAN_CRISTOBAL.png';
							if($ciudad_sambil==('Valencia'))		$img_banner='galeria/img/apdp-slide/VALENCIA1.png';
							if($ciudad_sambil==('Maracaibo'))		$img_banner='galeria/img/apdp-slide/MARACAIBO.png';
							if($ciudad_sambil==('Barquisimeto'))	$img_banner='galeria/img/apdp-slide/BARQUISIMETO.png';
							if($ciudad_sambil==('Margarita'))		$img_banner='galeria/img/apdp-slide/MARGARITA.png';
							if($ciudad_sambil==('Paraguana'))		$img_banner='galeria/img/apdp-slide/PARAGUANA.png';
							
							if(empty($img_banner)){
								$img_banner='galeria/img/apdp-slide/CARACAS.png';
								$ciudad_sambil='CARACAS';
							}					
					 
						
					    }else{
					    	$ciudad_sambil='CARACAS';
							$img_banner='galeria/img/apdp-slide/CARACAS.png';



					    }
						

					    echo $ciudad_sambil;
					    
					     ?>
					    <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					  	<li><a href="Caracas">Caracas</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="San-Cristobal">San Cristobal</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="Valencia">Valencia</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="Maracaibo">Maracaibo</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="Barquisimeto">Barquisimeto</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="Margarita">Margarita</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="Paraguana">Paraguana</a></li>
					    <li role="separator" class="divider"></li>				
					  </ul>
					</div>
					</li>
					
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


