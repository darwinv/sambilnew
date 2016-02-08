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
<div class="modal fade dia" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" id="dias">
	<div class="modal-dialog modal-sm" style="margin-top: 25%;">
			<div class="modal-content"
				style="padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px;">
				<div class="mar20 text-center icono-dias">
				<div id="dom" data-dia="dom" data-dom="1" class="btn btn-default redes-dias marB5"><i id="idom" class="fa fa-check-circle " style="display: visible;"></i> Domingo</div> 			
				<br>			
				<div id="lun" data-dia="lun" data-lun="1" class="btn btn-default redes-dias marB5"><i id="ilun" class="fa fa-check-circle " style="display: visible;"></i> Lunes</div> 				
				<br>
				<div id="mar" data-dia="mar" data-mar="1" class="btn btn-default redes-dias marB5"><i id="imar" class="fa fa-check-circle " style="display: visible;"></i> Martes</div> 			
				<br>
				<div id="mier" data-dia="mier" data-mier="1" class="btn btn-default redes-dias marB5"><i id="imier" class="fa fa-check-circle " style="display: visible;"></i> Miercoles</div> 			
				<br>
				<div id="jue" data-dia="jue" data-jue="1" class="btn btn-default redes-dias marB5"><i id="ijue" class="fa fa-check-circle " style="display: visible;"></i> Jueves</div> 			
				<br>
				<div id="vier" data-dia="vier" data-vier="1" class="btn btn-default redes-dias marB5"><i id="ivier" class="fa fa-check-circle " style="display: visible;"></i> Viernes</div> 			
				<br>
				<div id="sab" data-dia="sab" data-sab="1" class="btn btn-default redes-dias marB5"><i id="isab" class="fa fa-check-circle " style="display: visible;"></i> Sabado</div> 			
			    </div>
			</div>
	</div>
</div> 


