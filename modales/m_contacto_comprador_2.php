<?php
include_once "clases/usuarios.php";
if(isset($_SESSION["id"])){
	$usua=new usuario($_SESSION["id"]);
	$correo=$usua->a_email;
	$nombre=$usua->getNombre();
	$habilitado="disabled";
}else{
	$habilitado="";
	$correo="";
	$nombre="";
}
?>
<div class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" id="contacto-comprador-2">
	<div class="modal-dialog modal-lg">
		<form method="post" id="enviar-email-sede_2" name="enviar-email-sede_2" class="formulario"
			action="" method="POST" data-email="">
			<div class="modal-content"
				style="padding-top: 50px; padding-bottom: 50px;">

				<button type="button" class="close marR30 grisO" data-dismiss="modal"
					aria-label="Close" style="margin-top: -25px;">
					<span aria-hidden="true">&times;</span>
				</button>
				<br>
				<img alt="" src="galeria/img/icono_contacto.png"
					class="center-block img-responsive">
				<h1 class="text-center me-p_contenido" style="color: #000;">Cont&aacute;ctanos</h1>
				<br>				
		
				<br>
				<div class="center-block" style="width: 50%">
					<div class="form-group center-block text-left">
						<input type="text" class="form-control  marT5 text-left"
							id="nombre_comprador_2" name="nombre_comprador_2" placeholder="Nombre">
					</div>

					<div class="form-group center-block text-left">
						<input type="text" class="form-control  marT5 text-left"
							id="email_comprador_2" name="email_comprador_2" placeholder="Email">
					</div>
					<div class="form-group center-block text-left">

						<textarea class="form-control marT5 text-left" id="mensaje_comprador_2"
							rows="6" name="mensaje_comprador_2" placeholder="Mensaje"></textarea>
					</div>
					<div class="text-center">
						<button class="btn btn-default" type="reset">Limpiar</button>
						<button type="submit" id="enviar-emailto-2" data-dismiss="modal"
					aria-label="Close" class="btn btn-primary2">Enviar</button>
					</div>
				</div>
				<br>
				<div class="center-block text-center" style="width: 80%">
					Constructora Sambil C.A - Venezuela <br>
					
					<!-- CADA SAMBIL TIENE DIFERENTES DIRECCIONES -->
					Telefonos: <?php echo $telf_sambil; ?> &nbsp;/&nbsp;Email: 
				<span id="email_contacto"> </span>	
				</div>
			</div>
		</form>
	</div>
</div> 


