<!DOCTYPE html>
<html lang="es">
<?php
include 'fcn/varlogin.php';
include ("fcn/incluir-css-js.php");
?>
<body>
<?php
include ("temas/header.php");
?>
<div class="container">
	<div class="row pad-top70">
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 ">
			<?php include("temas/menu-left-usr.php"); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<?php  
			##########VARIABLE CREADA EN MENU TOP USER#########
			if($rol=='tienda'){
				include("paginas/resumen/p_resumen.php"); 
			}else{				
				include("paginas/resumen/p_resumen_cliente.php"); 
			}	
			?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marT40">
			<?php include "temas/footer.php";?>
		</div>	
		
	</div>
</div>
</body>
</html>