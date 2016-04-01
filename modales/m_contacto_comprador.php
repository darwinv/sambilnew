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
	aria-labelledby="myLargeModalLabel" id="contacto-comprador">
	<div class="modal-dialog modal-lg">
		<form method="post" id="enviar-email-sede" name="enviar-email-sede" class="formulario"
			action="" method="POST" data-email="<?php echo $email_sede; ?>">
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
			<!-- <div id="radio_sede" class="radio"> 
					    <input type="radio" id="sede_barq" name="sede"  value="1"><label for="sede_barq">Barquisimeto</label>
					    <input type="radio" id="sede_ccs" name="sede"  value="2"><label for="sede_ccs"> Caracas</label>
					    <input type="radio" id="sede_mcbo" name="sede" value="3"><label for="sede_mcbo">Maracaibo</label>
					    <input type="radio" id="sede_marg" name="sede" value="4"><label for="sede_marg"> Margarita</label>
					    <input type="radio" id="sede_parag" name="sede" value="5"><label for="sede_parag">Paraguan&aacute;</label>
					    <input type="radio" id="sede_sancrist" name="sede" value="6"><label for="sede_sancrist">San Crist&oacute;bal</label>
					    <input type="radio" id="sede_val" name="sede" value="7"><label for="sede_val">Valencia</label>
					 </div> 
					-->
				<br>
				<div class="center-block" style="width: 50%">
					<div class="form-group center-block text-left">
						<input type="text" class="form-control  marT5 text-left"
							id="nombre_comprador" name="nombre_comprador" placeholder="Nombre" <?php echo $habilitado; ?> value="<?php echo $nombre ;?>">
					</div>

					<div class="form-group center-block text-left">
						<input type="text" class="form-control  marT5 text-left"
							id="email_comprador" name="email_comprador" placeholder="Email" <?php echo $habilitado; ?> value="<?php echo $correo;?>">
					</div>
					<div class="form-group center-block text-left">

						<textarea class="form-control marT5 text-left" id="mensaje_comprador"
							rows="6" name="mensaje_comprador" placeholder="Mensaje"></textarea>
					</div>
					<div class="text-center">
						<button class="btn btn-default" type="reset">Limpiar</button>
						<button type="submit" id="enviar-emailto" data-dismiss="modal"
					aria-label="Close" class="btn btn-primary2">Enviar</button>
					</div>
				</div>
				<br>
				<div class="center-block text-center" style="width: 80%">
					<?php echo COMPANY_NAME;?> - Venezuela <br>
					
					<!-- CADA SEDE TIENE DIFERENTES DIRECCIONES -->
					Telefonos: <?php echo $telf_sede; ?> &nbsp;/&nbsp;
					Email:	<?php echo $email_sede; ?> 
				</div>
			</div>
		</form>
	</div>
</div> 


