<?php

/*
 * Pagina de Perfil
 * REQUIERE "usuarios.php,fotos.php,amigos.php
 * RECIBE "id" ->mediate get
 * RETORNA "contenido perfil"
 */
// Incluimos las clases a usar.
include_once 'clases/usuarios.php';
include_once 'clases/fotos.php';
include_once 'clases/amigos.php';
// validamos el session_start
if (! isset ( $_SESSION )) {
	session_start ();
}
if (isset ( $_GET ["id"] )) {
	$usuario = new usuario ( $_GET ["id"] ); // instanciamos la clase usuario(perfil a ver)
	$foto = new fotos (); // instanciamos la clase fotos
	$ruta = $foto->buscarFotoUsuario ( $_GET ["id"] ); // asignamos la ruta de la foto de perfil
	$bd = new bd ();
	$amigos = new amigos();
	$megustan = $amigos->contarMeGustan( $_GET ["id"] );
}
	
if (isset ( $_SESSION ["id"] )) { 
	$usuarioActual = new usuario ( $_SESSION ["id"] );
	if($amigos->yamegusta( $_GET ["id"], $_SESSION ["id"])){
		$yamegusta = "Siguiendo";
		$iconomegusta = "fa-thumbs-up";
		$contador = $megustan;	
		$datamegusta = "data-action = 'dislike'";
	}else{
		$yamegusta = "Seguir";
		$iconomegusta = "fa-thumbs-up";
		$datamegusta = "data-action = 'like'";
		$contador = $megustan;
		}	
	if($usuarioActual->id == $usuario->id){
		$verSeguidores=true;
		$seguidores="persona te sigue";
		$oculto = "hidden";
		if($megustan==0){
			$seguidores="Aun nadie te sigue";
			}
	}
	else{
		$verSeguidores=false;
	$seguidores="persona sigue esta tienda";	
		if($megustan==0){
			$seguidores="Aun nadie sigue esta tienda";
			}
	}
}else{
	$verSeguidores=false;
	$seguidores="persona sigue esta tienda";
	$oculto = "hidden";
	if($megustan==0){
			$seguidores="Aun nadie sigue esta tienda";
			}
}



if($megustan>1){
			$seguidores=str_replace("persona", "personas", $seguidores);
			$seguidores=str_replace("sigue", "siguen", $seguidores);
			}


?>
<?php $input_foto = "";
 if(isset($usuarioActual)):
	if($usuarioActual->id == $usuario->id): 
		$input_foto = "subir-foto-perfil";
	endif;
endif;?>	
<div class="row" style="margin-left: -5px; margin-right: -5px;">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
		<div class="portada text-center">
			<?php
			if($_GET["id"]==850):
				?>
			<img alt="" src="galeria/img/fondos/portada.png" class="img img-responsive hidden-xs">
			<?php
			else:
			?>
				<img alt="" src="galeria/img/fondos/portada2.jpg" class="img img-responsive hidden-xs">
			<?php
			endif;
				?>
			<div class='rota-img marco-foto-perfil <?php echo $input_foto; ?>'>
				<img id='img-perfil' width="200px" height="200px" src='<?php echo $ruta;?>'
					class='img img-responsive center-block  foto-perfil ' data-id="<?php echo $_GET['id'];?>">
					<?php if(isset($usuarioActual)):?>
						<?php if($usuarioActual->id == $usuario->id):?>
							<div class="actualizar "><i class="fa fa-camera"></i> Actualizar</div>
						<?php endif;?>
					<?php endif;?>	
					<div class="seu-nom-perfil-header center-block" style="width:500px;">
					<b class="texto-perfil-header"><?php echo strtoupper($usuario->a_seudonimo);?></b>
					<br>
					<span class="texto2-perfil-header">
					<?php if(is_null($usuario->j_rif)):
							echo $usuario->getNombre();
						  else:
						  	$row = $bd->doSingleSelect("categorias_juridicos","id = {$usuario->j_categorias_juridicos_id}");
						  	echo $row["nombre"];
						  endif;?>
					</span>
					</div>
			</div>			
			<div class="  btn-group  mar-me-gusta  pull-right-me-gusta "
				role="group">
				<button type="button" style="padding-top: 5px; padding-bottom: 5px; font-size: 12px;" data-count="<?php echo isset($contador)?$contador:$megustan;?>"
					class="btn2 btn-default2 <?php echo isset($oculto)?$oculto:'';?>" id="btn-megusta"  <?php echo isset($datamegusta)?$datamegusta:"";?> >
					<i class="fa <?php echo isset($iconomegusta)?$iconomegusta:"fa-thumbs-up";?>"></i> <?php echo isset($yamegusta)?$yamegusta:"Siguiendo";?>
				</button>
				<!-- Boton de compartir 
					<button type="button" style="padding-top: 5px; padding-bottom: 5px; font-size: 12px;"
					class="btn2 btn-default2">
					<i class="fa fa-share-alt "></i> 0 Compartido
				</button>
				-->
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
		<div class="btn-group btn-group-justified perfil-menu" role="group"
			aria-label="..." style="">
			<div class="btn-group hidden-xs " role="group" style="">
				<button type="button" style="cursor: auto;"
					class="btn btn-default3">
					<br>
				</button>
			</div>
			<div class="btn-group" role="group" data-href="paginas/perfil/p_perfil_listado.php">
				<button type="button" class="btn btn-default2 btn-default2-active">Publicaciones</button>
			</div>
			<div class="btn-group" role="group" data-href="paginas/perfil/p_perfil_informacion.php">
				<button type="button" class="btn btn-default2 ">
						<b>Informaci&oacute;n</b>
					</button>
			</div>
			<?php if ($verSeguidores){?>
			<div class="btn-group" role="group" data-href="paginas/perfil/p_perfil_amigos.php">
				<button type="button" class="btn btn-default2">
						<b >Seguidores</b>
					</button>
			</div>
			<?php } ?>
			<div class="btn-group" role="group" >
				<button type="button" class="btn btn-default3 negro"
						style="border-right: 1px solid #ccc" >
						 <b><span id="megustan"><?php if($megustan>0) echo $amigos->contarMeGustan($usuario->id); ?></span></b> <span id="seguidores" data-propio="<?php echo $verSeguidores ?>"> <?php echo $seguidores; ?> </span> 
					</button>
			</div>
		</div>
	</div>
</div>