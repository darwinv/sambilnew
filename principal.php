<!DOCTYPE html>
<html lang="es">
	<?php
	include "fcn/incluir-css-js.php";
	?>
	<body >
		
		<?php
		include "temas/header.php";
		?>
		<div class="container">	
		<div class="row">			
		 <div style="padding-bottom:10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-top25" > 
		 			<?php include "paginas/principal/p_banner.php";  ?>
		 			
		 </div>	
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  >
					<?php
					include "paginas/principal/p_principal.php";
					?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
					<?php
					include "temas/footer.php";
					?>
		</div>					
		</div>
		</div>				
		<?php
		include "modales/m_registrar.php";
		include "modales/m_emp_per.php";
		include "modales/m_edit_info_personal_n.php";
		include "modales/m_edit_info_personal_j.php";
		?>
		<div class="modal-backdrop fade in cargador" style="display:none"></div>
		</body>
	
</html>