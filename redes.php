<?php include 'config/core.php';
if(!isset($_GET["tipo"])){
	header ( "Location: index.php" );
}
include_once 'fcn/varlogin.php';
?>
<?php
switch($_GET["tipo"]){
	case 1:
		$display1="";
		$display2="hidden";
		$display3="hidden";
		break;
	case 2:
		$display1="hidden";
		$display2="";
		$display3="hidden";
		break;
	case 3:
		$display1="hidden";
		$display2="hidden";
		$display3="";
		break;		
}
?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="js/cropit/cropit.css">
<?php include "fcn/incluir-css-js.php";?>
<body>

<?php
include "clases/usuarios.php";
if(!isset($_SESSION["id"])){
 		session_start();
}
 
$usuario = new usuario($_SESSION['id']);
if($u=$usuario->tieneTwitter()){
	$tiene_twitter = "{n:'".$u['name']."',p:'".str_replace("_normal","",$u['img'])."'}";
 }else{
	$tiene_twitter = "false";
 }
 
 if($u=$usuario->tieneFacebook()){
	$tiene_facebook = "{n:'".$u['first_name']." ".$u['last_name']."',p:'".$u['img']."'}";
 }else{
	$tiene_facebook = "false";
 }
 
 if($u=$usuario->tieneFanpage()){
	$tiene_fanpage = "{n:'".$u['name']."',p:'".$u['img']."'}";
 }else{
	$tiene_fanpage = "false";
 }

 ?>
	<script type="text/javascript" >
		var manager_tiene_tw = <?php echo $tiene_twitter;?>, 
		manager_tiene_fb = <?php echo $tiene_facebook;?>,
		manager_tiene_fbp = <?php echo $tiene_fanpage;?>;
		
		function updateTwButton(){
			if(manager_tiene_tw){
				$('#vin_tw_red_img').attr('src',manager_tiene_tw.p);
				$('#vin_tw_red_button').text(manager_tiene_tw.n);
				$('#vin_tw_red_button').attr('disabled',true);
			}
		}
		
		function updateFbButton(){
			if(manager_tiene_fb){
				$('#vin_fb_red_img').attr('src',manager_tiene_fb.p);
				$('#vin_fb_red_button').attr('disabled',true);
				$('#vin_fb_red_button').text(manager_tiene_fb.n);
			}
		}
		
		function updateFbpButton(){
			if(manager_tiene_fbp){
				$('#vin_fbp_red_img').attr('src',manager_tiene_fbp.p);
				$('#vin_fbp_red_button').attr('disabled',true);
				$('#vin_fbp_red_button').text(manager_tiene_fbp.n);
			}
		}
		
		var twapc=false,twapt=false;
		
		ap_twa_cb = function(d){
			clearInterval(twapt);
			switch(d.e){
				case 0:
					manager_tiene_tw = {
						n : d.n,
						p : d.i
					};
					updateTwButton();
					break;
				case 1:
					//cuenta no pertenece a nadie
					break;
				case 2:
					//cuenta no dio los permisos requeridos
					break;
				case 3:
					//error al insertar cuenta en la base de datos
					break;
				case 4:
					//error del sdk
					break;	
			}
		};
		
		function checkTwapC(){
			if(twapt.closed){
				clearInterval(twapt);
			}
		}
				
		$('body').on('click','button#vin_tw_red_button',function(){
			var left = (screen.width/2)-(500/2),top = (screen.height/2)-(500/2);
			twapc=window.open('//apreciodepana.com/fcn/f_manager/add_tw.php?state=2','','toolbar=no, location=no, directories=no, status=no, menubar=no, copyhistory=no, width=500, height=500, top='+top+', left='+left);
			twapt=setInterval(checkTwapC,500);
			return false;
		});
			
		
		$(document).ready(function(){
			updateTwButton();
			updateFbButton();
			updateFbpButton();
			
			gettin_fbp=false,addin_fbp=false;
			$('body').on('click','button#fan_page_add',function(){
				if(addin_fbp || manager_tiene_fbp)
					return false;
				else
					addin_fbp=true;
				$.ajax({
					url: "fcn/f_manager/fb_add_page.php",
					method: "POST",
					data:{
						id:$('input[name=fan-page]:checked').val(),
					},
					cache: false,
					dataType: "json"
				}).done(function(d){
					addin_fbp=false;
					switch(d.e){
						case 0:
							var ll=d.p.length,arr=d.p,item=false,i=0,j=0,str=[];
							manager_tiene_fbp={
								n : d.n,
								p : d.p
							};
							updateFbpButton();
							break;
						case 1:
							//usuario no tiene cuenta de facbeook
							break;
						case 2:
							//usuario ya tiene un fan page
							break;
						case 3:
							//error del sdk
							break;
					}
				}).fail(function(a,b,d){
					addin_fbp=false;
				});	
					
					
			});
			
			
			
			$('body').on('click','button#vin_fbp_red_button',function(){
				if(gettin_fbp || manager_tiene_fbp)
					return false;
				else
					gettin_fbp=true;
				$.ajax({
					url: "fcn/f_manager/fb_get_pages.php",
					method: "GET",
					cache:false,
					dataType: "json"
				}).done(function(d){
					gettin_fbp=false;
					switch(d.e){
						case 0:
							var ll=d.p.length,arr=d.p,item=false,i=0,j=0,str=[];
							if(ll>0){
								for(;i<ll;i++){
									item=arr[i];
									str[j++]='<li><input type="radio" style="width: 20px; height: 20px;" value="'+item.i+'" name="fan-page" /><img src="'+item.p+'" style="width: 50px; height: 50px;" class="marL10" /><span class="marL10">'+item.n+'</span></li>';
								}
								$("ul#fan_page_list").html(str.join(''));
							}else{
								//no hay fan pages
							}
							break;
						case 1:
							//usuario no tiene cuenta de fb
							break;
						case 2:
							//usuario ya tiene un fan page
							break;
						case 3:
							//error del sdk
							break;
					}
				}).fail(function(a,b,d){
					gettin_fbp=false;
				});
			
			});
			
			
			var doing_fb_app=false;
			$('body').on('click','button#vin_fb_red_button',function(){
				if(doing_fb_app || manager_tiene_fb)
					return false;
				else
					doing_fb_app=true;
			
				FB.login(function(response){
					if (response.status === 'connected') {
						$.ajax({
							url: "fcn/f_manager/fbjscb.php",
							method: "GET",
							data:{
								state:2,
							},
							cache:false,
							dataType: "json"
						}).done(function(d){
							doing_fb_app=false;
							switch(d.e){
								case 0:
									manager_tiene_fb={
										n : d.fn + " "+ d.ln,
										p : d.p
									};
									updateFbButton();
									break;
								case 1:
									//cuenta no pertenece a nadie
									break;
								case 2:
									//cuenta no dio los permisos requeridos
									break;
								case 3:
									//error al insertar cuenta en la base de datos
									break;
								case 4:
									//error del sdk
									break;
								case 5:
									//El usuario ya tiene otra cuenta de fb vinculada
									break;
							}
						}).fail(function(a,b,d){
							doing_fb_app=false;
							//mostrar mensaje de error de conexión correspondiente
						});
					} else if (response.status === 'not_authorized') {
						//mostrar error de autorización
						doing_fb_app=false;
					} else {
						//mostrar error de conexión a fb
						doing_fb_app=false;
					}
			},{auth_type:'reauthenticate',scope:scopes});
			return false;
			});
			
			
		});
	</script>
 <?php


?>


<?php include "temas/header.php";?>
<div class="container">	
	<div class="row">
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
		<?php include "temas/menu-left-usr.php";?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 ">	
		<div class="marL20 ">
		<div class="<?php echo $display1;?>"><?php include "paginas/redes/p_redes_vincular.php";?></div>
		<div class="<?php echo $display2;?>"><?php include "paginas/redes/p_redes_publicaciones.php";?></div>	
			<div class="<?php echo $display3;?>"><?php include "paginas/redes/p_redes_mensajes.php";?></div>
		</div>
	</div>
	</div>
</div>

<?php 
include "temas/footer.php";
include "modales/m_delete.php";
include "modales/m_add_mensaje.php";
include "modales/m_redes_sociales.php";
include "modales/m_vincular_grupo.php";
include "modales/m_vincular_fan.php";
include "modales/m_delete.php";
include "modales/m_cropper.php";
?>
<script src="js/redes.js"></script>
<div class="modal-backdrop fade in cargador" style="display:none"></div>
</body>
</html>
