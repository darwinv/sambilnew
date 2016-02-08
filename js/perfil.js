/**
 * JavaScript Perfil.php
 */

$(document).ready(function(){
	$(document).prop('title', "Perfil de "+$(".texto-perfil-header").html());
	/* ============================----- Menu principal Perfil -----=========================*/
	$(".btn-group-justified > .btn-group").click(function(){
		if($(this).children("button").hasClass("btn-default2") && $(this).data("href") !== undefined){
			$(".perfil-menu").find("button").removeClass("btn-default2-active");
			$(this).children("button").addClass("btn-default2-active");
			loadingAjax(true);
			$.ajax({
	            url: $(this).data("href"),
	            data: { id : getQuerystringValue("id")},
	            type: 'GET',
	            dataType: 'html',
	            success: function (data) {	            	
	            	setTimeout(function(){
	            		$("#ajaxContainer").html(data);
	            		loadingAjax();
	            	}, 100);
	            },
	            error: function (xhr, status) {
	            	SweetError(status);
	            	loadingAjax();
	            }
	        });
		}
	});
	
	/* ============================----- Menu lateral Informacion -----=========================*/
	
	$("#ajaxContainer").on('click',".perfil-info-menu > div",function(){
		$(".perfil-info-menu").children("div").removeClass("act");
		$(this).addClass("act");
		 $('html, body').animate({scrollTop:($($(this).data("href")).offset().top - 80)}, 'slow');
		//$(window).scrollTop($($(this).data("href")).offset().top);
	});
	
	/* ============================----- Amigos Perfil -----=========================*/
	
	$("#ajaxContainer").on('change',"#filter",function(){
		cargarAmigos();
	});
	
	$("#ajaxContainer").on("click","#amigoSearch", function(){
		cargarAmigos();
	});
	
	function cargarAmigos(){
		loadingAjax(true);
		$.ajax({
            url: "paginas/perfil/fcn/f_amigos.php",
            data: { id : getQuerystringValue("id"), q : $("#q").val(), filter : $("#filter").val()},
            type: 'GET',
            dataType: 'html',
            success: function (data) {
            	setTimeout(function(){
            		$("#ajaxAmigos").html(data);
            		loadingAjax();
            	}, 1000);
            },
            error: function (xhr, status) {
            	SweetError(status);
            	loadingAjax();
            }
        });
	}
	
	
	$("body").on('click', '.datos-seguidor', function(e) {	
	 nombre=$(this).data("nombre");
	 alias=$(this).data("alias");
	 telefono=$(this).data("telf");
	 correo=$(this).data("correo");
	 indice=$(this).data("contador");
	 ruta=$(this).data("ruta");	
	 
	 	$("#fotoperfil").attr("src", ruta);
	 	//$("#index").html(indice);
	 	$("#seudonimo").html(alias);
	 	$("#telefono").html(telefono);
	 	$("#nombres").html(nombre);
	 	$("#correo").html(correo);
	 	
	});	
	
/* ============================----- Me Gusta Perfil -----=========================*/
	
	$("#btn-megusta").click( function(){
		html = $("#btn-megusta").html();
		count = $("#btn-megusta").data("count");
		$("#btn-megusta").prop("disabled",true);
		$("#btn-megusta").html("...Cargando");		
		$.ajax({
            url: "paginas/perfil/fcn/f_favoritos.php",
            data: { id : getQuerystringValue("id"), action: $(this).data("action")},
            type: 'GET',
            dataType: 'json',
            success: function (data) {
            	setTimeout(function(){
            		if(data.result === "OK"){
            			$("#btn-megusta").prop("disabled",false);
            			if($("#btn-megusta").data("action") === "like"){
            				count++;
            				$("#btn-megusta").html("<i class='fa fa-thumbs-up'></i> Siguiendo");
            				$("#btn-megusta").data("action","dislike");
            				$("#btn-megusta").data("count",count);
            				$("#megustan").text($("#btn-megusta").data("count"));
            			}else{
            				count--;
            				$("#btn-megusta").html("<i class='fa fa-thumbs-up'></i>  Seguir");
            				$("#btn-megusta").data("action","like");
            				$("#btn-megusta").data("count",count);
            				$("#megustan").text($("#btn-megusta").data("count"));            				
            			}
            			
            			if(($("#seguidores").data("propio") == false)){
	            			if(count==0){
	            					$("#megustan").text("");
	            					$("#seguidores").html("Aun nadie sigue esta tienda");
	            			}
	            			if(count==1){
	            					$("#seguidores").html("persona sigue esta tienda");
	            			}
	            			if(count>1){
	            				$("#seguidores").html("personas siguen esta tienda");
	            			}		
            			}
            			else {
            				if(count==0){
	            					$("#megustan").text("");
	            					$("#seguidores").html("Aun nadie te sigue");
	            			}
	            			if(count==1){
	            					$("#seguidores").html("persona te sigue ");
	            			}
	            			if(count>1){
	            				$("#seguidores").html("personas te siguen");
	            			}		
            				
            			}
            		}else{
            			$("#btn-megusta").prop("disabled",false);
            			$("#btn-megusta").html(html + ":Error");	
            		}
            	}, 1000);	
            },
            error: function (xhr, status) {
            	SweetError(status);
            	$("#btn-megusta").prop("disabled",false);
        		$("#btn-megusta").html(html + ":Error");
            }
        });
	});	
	/* ============================----- Actualizar info social -----=========================*/
	$(document).on('click','#btn-info-social',function() {		
		$.ajax({			
			url: "fcn/f_usuarios.php", // la URL para la petición
            data: {method:"get"}, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta
            success: function (data) {            	
            	// código a ejecutar si la petición es satisfactoria;
            	//console.log(JSON.stringify(data.result));
	            if (data.result === 'OK') {
	            	$("#descripcion").val(data.campos.u_descripcion);
	            	$("#facebook").val(data.campos.u_facebook);
	            	$("#twitter").val(data.campos.u_twitter);
	            	$("#website").val(data.campos.u_website);
	            }
          	},// código a ejecutar si la petición falla;
            error: function (xhr, status) {
            	SweetError(status);
            }
        });
	});
	$(document).on("click","#btn-social-act",function(){
		var form = $( "#usr-act-form-social" );
		var fv = form.data('formValidation');
		var method = "&method=act-social";
		$.ajax({
			url: form.attr('action'), // la URL para la petición
            data: form.serialize() + method, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'html', // el tipo de información que se espera de respuesta
            success: function (data) {
            	// código a ejecutar si la petición es satisfactoria;
            	console.log(data);
	            if (data == 'OK') {
	            	swal({
						title: "Exito",
						text: "Se actualizo correctamente.",
						imageUrl: "galeria/img/logos/bill-ok.png",
						timer: 2000,
						showConfirmButton: true
						}, function(){							
							location.reload();
						});
	            }
          	},// código a ejecutar si la petición falla;
            error: function (xhr, status) {
            	SweetError(status);
            }
        });
	});
	/* ============================----- Actualizar foro perfil -----=========================*/
	$(".subir-foto-perfil").click(function(){
		 
		$(".cropit-image-input").click();
	});
	/*
	 * Captura el cambio del input
	 */
	$(document).on("change", ".cropit-image-input", function() {
		var file = this.files[0];
		var imageType = "image";
		if (file.type.substring(0,5) == imageType) {
			var reader = new FileReader();
			reader.onload = function(e) {
				// Create a new image.
				var img = new Image();
				// Set the img src property using the data URL.
				img.src = reader.result;
				// Add the image to the page.
				$(".cropit-image-input").val("");
				$('#cropper').modal("show");
			};
			reader.readAsDataURL(file);			
		} else {
			SweetError("Archivo no soportado.");
		}		
	});
	$("#save-foto").click(function(){
        id=$("#img-perfil").data("id");
		loadingAjax(true);
		$.ajax({
			url: "fcn/f_usuarios.php", // la URL para la petición
            data: {ruta: $("#img-perfil").attr("src") ,foto: $('.image-editor').cropit('export'), method: "fot"}, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta
            success: function (data) {
            	// código a ejecutar si la petición es satisfactoria;
            	console.log(data);
	            if (data.result !== 'error') {
	            	//location.reload();
	            	//window.open("perfil.php?id=" + id + "&new=1","_self");
	            	location.reload();
	            	loadingAjax(false);
	            	// $("#img-perfil").attr("src",$('.image-editor').cropit('export'));
	            	// $("#fotoperfilm").attr("src",$('.image-editor').cropit('export'));
	            }
          	},// código a ejecutar si la petición falla;
            error: function (xhr, status) {
            	SweetError(status);
            }
        });
	});
	$("#cambiar-foto").click(function(){
		$("#cropper").modal("hide");
		$('.cropit-image-input').click();
	});
	$("#filter").change(function(){
		var orden=$(this).val();
		var palabra=$("#txtBusqueda").val();
		loadingAjax(true);
		$.ajax({
			url:"paginas/perfil/fcn/f_perfil.php",
			data:{metodo:"buscarFavoritos",orden:orden,palabra:palabra},
			type:"POST",
			dataType:"html",
			success:function(data){
				console.log(data);
				$("#publicaciones").html(data);
				loadingAjax(false);
			}
		});		
	});	
	$("#ajaxContainer").on("click",".imagen",function(){
		window.open("detalle.php?id=" + $(this).data("id"),"_self");
	});
	$("#publicaciones").on("click",".imagen",function(){
		window.open("detalle.php?id=" + $(this).data("id"),"_self");
	});	
	$("#paginas").on("click",".botonPagina",function(){
		var orden=$("#filter").val();
		var pagina=$(this).data("pagina");
		var palabra=$("#txtBusqueda").val();
		var metodo=$("#paginas").data("metodo");
		var id=$("#paginas").data("id");
		$(".pagination li").removeClass("active");
		$(this).parent().addClass("active");
		loadingAjax(true);
		$.ajax({
			url:"paginas/perfil/fcn/f_perfil.php",
			data:{metodo:metodo,orden:orden,palabra:palabra,pagina:pagina,id:id},
			type:"POST",
			dataType:"html",
			success:function(data){
				$("#publicaciones").html(data);
				loadingAjax(false);
			}
		});
	});
});