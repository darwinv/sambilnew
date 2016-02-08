<!DOCTYPE html>
<html lang="es">
<?php
include 'fcn/varlogin.php';
include ("fcn/incluir-css-js.php");
?>
<link rel="stylesheet" href="js/cropit/cropit.css">
<body>
<?php
include ("temas/header.php");
?>
<div class="container">
	<div class="row pad-top70" >
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<?php include("temas/menu-left-usr.php"); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<?php include("paginas/configuracion/p_confi_datos.php"); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marT40">
			<?php include "temas/footer.php";?>
		</div>	
		
	</div>
</div>
<?php 
include ("modales/m_edit_info_personal_n.php");
include ("modales/m_edit_info_personal_j.php");
include ("modales/m_edit_info_seudonimo.php");
include ("modales/m_edit_info_correo.php");
include ("modales/m_edit_info_pass.php");
include "modales/m_delete2.php";

include 'modales/m_cropper.php';

?>

<script type="text/javascript" src="js/configuracion.js"></script>
<script type="text/javascript" src="js/perfil.js" async></script>
</body>
</html>