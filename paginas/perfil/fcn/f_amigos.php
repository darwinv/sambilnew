<?php
include '../../../config/core.php';

if (! headers_sent ()) {
	header ( 'Content-Type: text/html; charset=UTF-8' );
}
// Incluimos las clases a usar.
if (file_exists ( '../../../clases/usuarios.php' )) {
	include_once '../../../clases/usuarios.php';
	include_once '../../../clases/fotos.php';
	include_once '../../../clases/amigos.php';
}

// validamos el session_start
if (! isset ( $_SESSION )) {
	session_start ();
}
// validamos que el id este seteado, caso contrario regresamos al usuario a otra pagina
if (isset ( $_GET ["id"] )) :
	$usuario = new usuario ( $_GET ["id"] ); // instanciamos la clase usuario(perfil a ver)
	$amigos = new amigos ();
	$foto = new fotos ();
	$bd = new bd ();
	
	endif;
if (isset ( $_SESSION ["id"] )) {
	$usuarioActual = new usuario ( $_SESSION ["id"] );
}
// var_dump($_GET);
$resultamigos = $amigos->buscarAmigos ( $usuario->id, filter_input ( INPUT_GET, "filter" ), filter_input ( INPUT_GET, "q" ) );
if (! empty ( $resultamigos )) :
	$c=0;
    foreach ( $resultamigos as $row ) :
		
		?>
<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3" id="<?php echo $row["numero"]?>">
	<div class="contenedor sombra-div " style="margin: 10px;">
		<div class="marco-foto-amigos center-block marT20 datos-seguidor" style="width: 50%"
		data-target="#info-seguidor"
				data-toggle='modal'
				data-ruta='<?php echo $foto->buscarFotoUsuario($row["numero"]) ?>'
				data-iduser='<?php echo $row["numero"]?>'
				data-nombre="<?php echo $row["nombre"]?>"
				data-alias="<?php echo $row["seudonimo"]; ?>"
				data-telf="<?php echo $row["telefono"]?>"
				data-correo="<?php echo $row["email"]?>"
		>
	<img src="<?php echo $foto->buscarFotoUsuario($row["numero"])?>" alt="..." style="width: 100%"
				class=" img img-responsive foto-perfil">
		</div>
		<div class="text-center marT10 marB20">
			<span 	data-target="#info-seguidor"
				data-toggle='modal'
				data-ruta='<?php echo $foto->buscarFotoUsuario($row["numero"]) ?>'
				data-iduser='<?php echo $row["numero"]?>'
				data-nombre="<?php echo $row["nombre"]?>"
				data-alias="<?php echo $row["seudonimo"]; ?>"
				data-telf="<?php echo $row["telefono"]?>"
				data-correo="<?php echo $row["email"]?>"
				class="datos-seguidor btn seud-onimo blue-vin" ><?php echo $row["seudonimo"];?></span><br> <br>
			<div class="btn-group">
				<button 
				data-target="#info-seguidor"
				data-toggle='modal'
				data-ruta='<?php echo $foto->buscarFotoUsuario($row["numero"]) ?>'
				data-iduser='<?php echo $row["numero"]?>'
				data-nombre="<?php echo $row["nombre"]?>"
				data-alias="<?php echo $row["seudonimo"]; ?>"
				data-telf="<?php echo $row["telefono"]?>"
				data-correo="<?php echo $row["email"]?>"
				 data-contador="<?php echo $c ?>" type="button" class="btn btn-primary2 datos-seguidor datos-follower">Seguidor</button>
			<button type="button" class="btn btn-primary2 dropdown-toggle"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="caret"></span> <span class="sr-only">Toggle Dropdown</span>
			</button>
				<ul class="dropdown-menu">
					<li > <button  class="btn bloqueo-seguidor actualiza-follow" style="width: 100%;" data-userbloq="<?php echo $row["numero"]?>" data-user="<?php if(isset($_SESSION["id"])) echo $_SESSION ["id"]; ?>" > Bloquear </button> </li>
				</ul>
				
			</div>
		</div>
	</div>
</div>
<?php $c++; 
endforeach;
?>

<?php else:?>
<div class="alert alert-warning2 text-center marT100" role="alert" ><i class="fa fa-info-circle"></i> No Tienes Amigos Por Ahora</div>
<?php endif;?>