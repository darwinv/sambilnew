<!DOCTYPE html>
<html lang="es">
<?php include "fcn/incluir-css-js.php";?>
<body>
<script type="text/javascript" src="js/listado.js"></script>
<?php include "temas/header.php";?>
<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-top25">
			<?php 
			$ver_tiendas=isset($_GET["tiendas"])?1:"";
			
			if(!empty($ver_tiendas))
				include "paginas/listado/p_listado_tiendas.php";
			else
				include "paginas/listado/p_listado2.php";
				
			?>
		</div>
	</div>
<?php 
include "modales/m_registrar.php";
?>
<div class="modal-backdrop fade in cargador" style="display:none"></div>


</body>
</html>
