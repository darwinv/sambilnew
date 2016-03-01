<?php
/***CODIGO PARA NOTIFICACIONES****/
if(!isset($_SESSION)){
    session_start();	
} 
	$usr = new usuario($_SESSION["id"]); 
	$cant_compras = $usr -> getCantRespuestas();
	$cant_ventas = $usr -> getCantNotificacionPregunta();
	$cant_panas = $usr -> getCantPanas();
	$cant_pub = $usr -> getCantNotiPublicaciones();
	
$alertas = $cant_compras[0]["cant"] + $cant_ventas[0]["cant"] + $cant_panas[0]["cant"] + $cant_pub[0]["cant"];
 
?>
			 		
			 		
			 		
			 		
	<div id="principal" name="principal" data-cla="prueba" data-est="prueba" data-con="prueba" data-pag="prueba" data-palabra="" data-can="prueba" data-nomest="prueba">
 
		<div class="row">			
			<!-- Listado -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 resultados">
				<div class="mar5 contenedor row line-botton pad-right20 pad-left20">				
					<div class="col-xs-12 head-list t12 " >
						<div>
							<h2 class="t14">Tus Notificaciones</h2>
						</div>						
					</div>					
					<div class="col-xs-12  list-notif" >
						
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-1">
										<img id="img-perfil" src="galeria/fotos/2016/02/4592.png" class="img foto-perfil foto-max-80  " data-id="1268" >
									</div>
									<div class="col-xs-9 col-sm-9 col-md-9 col-lg-11">
										<div>
											<span class=" vin-blue t14"><a href="perfil.php?id=850" class=""><b> SiliconValley C.A</b></a></span>
											Ahora te sigue
										</div>
										<div>
											<span class="t12 grisO "><i class="glyphicon glyphicon-time t14  opacity"></i> 5 d</span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-1">
										<img id="img-perfil" src="galeria/fotos/2016/02/4592.png" class="img foto-max-80   foto-perfil " data-id="1268"   >
									</div>
									<div class="col-xs-9 col-sm-9 col-md-9 col-lg-11">
										<div>
											<span class=" vin-blue t14"><a href="perfil.php?id=850" class=""><b> SiliconValley C.A</b></a></span>
											Ahora te sigue
										</div>
										<div>
											<span class="t12 grisO "><i class="glyphicon glyphicon-time t14  opacity"></i> 5 d</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-1">
										<img id="img-perfil" src="galeria/fotos/2016/02/4592.png" class="img foto-max-80   foto-perfil " data-id="1268"   >
									</div>
									<div class="col-xs-9 col-sm-9 col-md-9 col-lg-11">
										<div>
											<span class=" vin-blue t14"><a href="perfil.php?id=850" class=""><b> SiliconValley C.A</b></a></span>
											Ahora te sigue
										</div>
										<div>
											<span class="t12 grisO "><i class="glyphicon glyphicon-time t14  opacity"></i> 5 d</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-1">
										<img id="img-perfil" src="galeria/fotos/2016/02/4592.png" class="img foto-max-80   foto-perfil " data-id="1268"   >
									</div>
									<div class="col-xs-9 col-sm-9 col-md-9 col-lg-11">
										<div>
											<span class=" vin-blue t14"><a href="perfil.php?id=850" class=""><b> SiliconValley C.A</b></a></span>
											Ahora te sigue
										</div>
										<div>
											<span class="t12 grisO "><i class="glyphicon glyphicon-time t14  opacity"></i> 5 d</span>
										</div>
									</div>
								</div>
							</div>
							
					</div>
					<div class="col-xs-12 ver-mas-footer text-center ver-mas-footer pad-top10 pad-bot10">
							<a>Ver M&aacute;s</a>
					</div>
			 	</div>
		 	</div>
		</div>
						
	</div>
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
			 		
		
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
								$tema = "Nuevos Articulos";
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
		