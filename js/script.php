<script>
$(document ).ready(function() {
/* Considerar borrar este c&oacute;digo y llamar a configuracion-js*>*/

		/********SCRIPT PARA FONDOS TEMPORALMENTE**************************/
        $('body').css("background-image", "url(galeria/img/fondos/F1.jpg)");  
        $('.body-index').css("background-image", "");
        /******************************************************************/
	$('#usr-act-form-nat').formValidation({
		locale: 'es_ES',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {
			p_identificacion: {validators : {
				notEmpty:{},
				digits:{},
				stringLength : { max : 10 },
				blank: {}}},
			p_nombre : {validators : {
				notEmpty : {},
				stringLength : {max : 512},
				regexp: {regexp: /^[\u00F1a-z\s]+$/i}}},
			p_apellido : {validators : {
				notEmpty : {},
				stringLength : {max : 512},
				regexp: {regexp: /^[\u00F1a-z\s]+$/i}}},
			p_telefono : {validators : {
				notEmpty : {},
				phone : {country:'VE'}}},
			p_estado : {validators : {
				notEmpty : {}}},
			p_direccion : {validators : {
				notEmpty : {},
				stringLength : {min: 10,max : 1024}}}
		}
	}).on('success.form.fv', function(e) {
		e.preventDefault();	
		var form = $(e.target);
		var fv = form.data('formValidation');
		var method = "&id=" + $("#p_id").val() + "&method=act-nat";
		$.ajax({
			url: form.attr('action'), // la URL para la petición
            data: form.serialize() + method, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta
            success: function (data) {
//	            	alert(data);
            	// código a ejecutar si la petición es satisfactoria;
            	// console.log(data);
	            if (data.result === 'error') {
	            	for (var field in data.fields) {
	        			fv
	                    // Show the custom message
	                    .updateMessage(field, 'blank', data.fields[field])
	                    // Set the field as invalid
	                    .updateStatus(field, 'INVALID', 'blank');
	            	}
	            } else {
	            	swal({
						title: "Exito", 
						text: "Se actualizo correctamente.",
						imageUrl: "galeria/img/logos/bill-ok.png",
						timer: 2000, 
						showConfirmButton: true
						}, function(){
//							loadingAjax(true);
							$.ajax({
								url:"fcn/f_usuarios.php",
								data:{method:"loadSession",id:elId},
								type:"POST",
								dataType:"html",
								success:function(data){
									alert("hey");
									console.log(data);
//									loadingAjax(false);
									location.reload();
								}
							});
						});
                }
          	},// código a ejecutar si la petición falla;
            error: function (xhr, status) {
            	SweetError(status);
            }
        });
    });
	/*---======= Validacion de Datos Personales JUR ========---*/
	$('#usr-act-form-jur').formValidation({
		locale: 'es_ES',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {
			e_rif: {validators : {
				notEmpty:{},
				digits:{},
				stringLength : { max :  10},
				blank: {}}},
			e_razonsocial : {validators : {
				notEmpty : {},
				stringLength : {min : 5, max : 512}}},
			e_categoria : {validators : {
				notEmpty : {}}},
			e_telefono : {validators : {
				notEmpty : {},
				phone : {country:'VE'}}},
			e_estado : {validators : {
				notEmpty : {}}},
			e_direccion : {validators : {
				notEmpty : {},
				stringLength : {min: 10,max : 1024}}}
		}
	}).on('success.form.fv', function(e) {
		e.preventDefault();
		var form = $(e.target);
		var fv = form.data('formValidation');
		var method = "&id=" + $("#p_id").val() + "&method=act-jur";
		$.ajax({
			url: form.attr('action'), // la URL para la petición
            data: form.serialize() + method, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta
            success: function (data) {
            	// código a ejecutar si la petición es satisfactoria;
            	// console.log(data);
	            if (data.result === 'error') {
	            	for (var field in data.fields) {
	        			fv
	                    // Show the custom message
	                    .updateMessage(field, 'blank', data.fields[field])
	                    // Set the field as invalid
	                    .updateStatus(field, 'INVALID', 'blank');
	            	}
	            } else {
	            	swal({
						title: "Exito",
						text: "Se actualizo correctamente.",
						imageUrl: "galeria/img/logos/bill-ok.png",
						timer: 2000,
						showConfirmButton: true
						}, function(){
							$.ajax({
								url:"fcn/f_usuarios.php",
								data:{method:"loadSession",id:elId},
								type:"POST",
								dataType:"html",
								success:function(data){
									console.log(data);
//									loadingAjax(false);
									location.reload();
								}
							});
						});
                }
          	},// código a ejecutar si la petición falla;
            error: function (xhr, status) {
            	SweetError(status);
            }
        });
    });
/*Hasta aqui*/
	
	/* ============================----- Modal Registrar -----=========================*/
	var pagina=1;
	
	$( "#radio" ).buttonset();
	$('#juridico').click(function() {
		if($('#juridico').is(':checked')){
			/*$('#datospersona').hide(500);
			$('#datosempresa').show('slow');*/
			$('#datospersona').hide();
			$('#datosempresa').fadeIn('slow');
			$('#juridico').val("empresa");
			
			 
			$("#p_tipo").append('<option value="J">J</option>');
			$("#p_tipo").append('<option value="G">G</option>');
			$("#p_tipo").append('<option value="C">C</option>');
			
		 }
	}); 
	$('#natural').click(function() {
		if($('#natural').is(':checked')){
			$('#datosempresa').hide();
			$('#datospersona').fadeIn('slow');
			$('#natural').val("persona");
			
			$("#p_tipo option[value='J']").remove();
			$("#p_tipo option[value='G']").remove();
			$("#p_tipo option[value='C']").remove();
		} 		
	});
	
	
	
	
	$('#usr-reg-form').formValidation({
		locale: 'es_ES',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {
			p_identificacion: {validators : {
				notEmpty:{},
				digits:{},	
				stringLength : { 
					min:5,
					max : 10 
					},
				blank: {}}},
			p_nombre : {validators : {
				notEmpty : {},
				stringLength : {max : 512},
				regexp: {regexp: /^[\u00F1a-z\s]+$/i}}},
			p_apellido : {validators : {
				notEmpty : {},
				stringLength : {max : 512},
				regexp: {regexp: /^[\u00F1a-z\s]+$/i}}},
			p_telefono : {validators : {
				notEmpty : {},
				phone : {country:'VE'}}},
			p_estado : {validators : {
				notEmpty : {}}},
			p_direccion : {validators : {
				notEmpty : {},
				stringLength : {min: 10,max : 1024}}},
		/*e_rif: {validators : {
				notEmpty:{},	
				digits:{},
				stringLength : { max :  10},
				blank: {}}},*/
				
			e_razonsocial : {validators : {
				notEmpty : {},
				stringLength : {min : 5, max : 512}}},
			e_categoria : {validators : {
				notEmpty : {}}},
			/*e_telefono : {validators : {
				notEmpty : {},
				phone : {country:'VE'}}},
			e_estado : {validators : {
				notEmpty : {}}},
			e_direccion : {validators : {
				notEmpty : {},
				stringLength : {min: 10,max : 1024}}},*/			
			seudonimo : {validators : {
				notEmpty : {},
				stringLength : {max : 64},
				regexp: {regexp: /^[a-z\d_]{4,15}$/i  },
				/*regexp: {regexp: /^[a-zA-Z0-9_.-]*$/i},*/
				blank: {}}},
			email : {validators : {
				notEmpty : {},
				emailAddress : {},
				blank: {}}},
			email_val : {validators : {
				identical: {field: 'email'}}},
			password : {validators : {
				notEmpty : {},
				stringLength : {min:6,max : 64}}},
			password_val : {validators : {
				identical: {field: 'password'}}}
		}
	}).on('success.form.fv', function(e) {
		e.preventDefault();				
		var form = $(e.target);
		var fv = form.data('formValidation');
		var foto = "&foto="+$("#foto-usuario").attr("src");	
		var method = "&method=new";
		$.ajax({
			url: form.attr('action'), // la URL para la petición
            data: form.serialize() + foto + method, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta		           
            success: function (data) {
            	// código a ejecutar si la petición es satisfactoria;	
            	// console.log(data);
	            if (data.result === 'error') {
	            	$("#usr-reg-skip").hide();
            		$("#usr-reg-foto").hide();
            		$("section").hide();
            		keys = Object.keys(data.fields);
            		if(jQuery.inArray("e_rif",keys) !== -1 || jQuery.inArray("p_identificacion",keys) !== -1){
            			$("#usr-reg-submit").data("step",1);	
            			$("section[data-type='"+$("#type").val()+"']").show();
            		}else if(jQuery.inArray("seudonimo",keys) !== -1 || jQuery.inArray("email",keys)!== -1){
            			$("#usr-reg-submit").data("step",2);	
            			$("section[data-step='2']").show();
            		}
	            	for (var field in data.fields) { 
	        			fv
	                    // Show the custom message
	                    .updateMessage(field, 'blank', data.fields[field])
	                    // Set the field as invalid
	                    .updateStatus(field, 'INVALID', 'blank');
	            	}
	            }else{  	
		        	swal({
						title: "Bienvenido", 
						text: "<?php echo SLOGAN;?>",
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
	/* ============================----- Formulario de registro -----=========================*/
	/*Codigo que pide al usuario seleccionar si sera personal natural o juridica*/
	$('.alert-reg').click(function() {
		$("section").hide();
		$("#usr-reg-skip").hide();
		$("#usr-reg-foto").hide();
		$("#usr-reg-submit").data("step",1);
		$("#radio").fadeIn("fast");		
	});
	$("#usr-reg-submit").click(function(){
		var step, section;
		step = $("#usr-reg-submit").data("step");
		switch(step){
		case 1:
			if(validarForm(step)){
				step++;
				$("#usr-reg-submit").data("step",step);		
				$("section[data-type='"+$("#usr-reg-submit").data("type")+"']").fadeOut( "slow", function() {
					$("#usr-reg-title").html($("section[data-step='"+step+"']").data("title"));
					$("section[data-step='"+step+"']").fadeIn("slow");
					$("#radio").fadeOut("fast");
				});
			}
			break;
		case 2:
			$("#usr-reg-form").data('formValidation').validate();
			
			break;
		}
	});

	function validarForm(step){
		var type;
		 var fv = $('#usr-reg-form').data('formValidation'), // FormValidation instance
        // The current step container
		type = $("#usr-reg-submit").data("type");
		if(step === 1){
			$container = $('#usr-reg-form').find('section[data-type="' + type +'"]');
		}else{
			$container = $('#usr-reg-form').find('section[data-step="' + step +'"]');
		}
        // Validate the container
        fv.validateContainer($container);	
        var isValidStep = fv.isValidContainer($container);
        if (isValidStep === false || isValidStep === null) {
            // Do not jump to the next step
            return false;
        }        
        return true;
	}
	
	/* ============================----- Modal Login -----=========================*/	

	$('#usr-log-form').formValidation({
		locale: 'es_ES',
		excluded: ':disabled',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {			
			log_usuario : {validators : {
				notEmpty : {},
				blank: {}}},
			log_password : {validators : {
				notEmpty : {},
				blank: {}}}
		}
	}).on('success.field.fv', function(e, data) {
        if (data.fv.getInvalidFields().length > 0) {    // There is invalid field
            data.fv.disableSubmitButtons(true);
        }
    }).on('err.form.fv', function(e,data) {
    	//$(".dropdown-toggle").dropdown('toggle');
    }).on('success.form.fv', function(e) {
		e.preventDefault();
		var form = $(e.target);
		var fv = form.data('formValidation');
		var method = "&method=log";
		$.ajax({
			url: form.attr('action'), // la URL para la petición
            data: form.serialize() + method, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta            
            success: function (data) {            	
            	// código a ejecutar si la petición es satisfactoria;
            	// código a ejecutar si la petición es satisfactoria;
            	// console.log(data);
	            if (data.result === 'error'){
	            	for (var field in data.fields) {
	        			fv
	                    // Show the custom message
	                    .updateMessage(field, 'blank', data.fields[field])
	                    // Set the field as invalid
	                    .updateStatus(field, 'INVALID', 'blank');
	        			setTimeout(function(){
	        				$("#"+field).focus();	       			
	        			}, 10);
	            	}
	            	 
	            	$("#dropdown-toggle-login").dropdown('toggle');
	            	
	            } else if(data.result==="Actualice") {
					elId=data.id;
	            	$("#actualizar").modal('show');
	            } else{
	            	swal({
						title: "Bienvenido", 
						text: "<?php echo SLOGAN;?>",
						imageUrl: "galeria/img/logos/bill-ok.png",
						timer: 20000, 
						showConfirmButton: true
						}, function(){
							if(data.rol==="1"){
								window.open("admin-usr.php","_self");
							}else{
								location.reload();
							}
							
							
						});
                } 
          	},// código a ejecutar si la petición falla;
            error: function (xhr, status) {
            	SweetError(status);
            }
        });
	});
	$(".buscador").keydown(function(e){
		if(e.which==13){
			if($('#txtBuscar').val()!=""){
		        buscar=$('#txtBuscar').val();
				window.open("listado.php?palabra=" + buscar,"_self");
			}else{
				window.open("listado.php","_self");
			}
		}
	});
	$(".buscadorBoton").click(function(e){
		if($('#txtBuscar').val()!=""){
		        buscar=$('#txtBuscar').val();
				window.open("listado.php?palabra=" + buscar,"_self");
			}else{
				window.open("listado.php","_self");
			}
	});
	$("#usr-log-submit").prop("disabled",true);
	$("#opcion1").click(function(){
		if($("#opcion1").hasClass('active-cat')){
			return false;
		}else{
			loadingAjax(true);
		    setTimeout(pararCarga,800);
			$("#productos").css("display","block");
			$("#vehiculos").css("display","none");
			$("#servicios").css("display","none");
			$("#inmuebles").css("display","none");
			$("#tiendas").css("display","none");			
			$("#opcion1").addClass("active-cat");
			$("#opcion2").removeClass("active-cat");
			$("#opcion3").removeClass("active-cat");
			$("#opcion4").removeClass("active-cat");
			$("#opcion5").removeClass("active-cat");
			$("#tituloCategoria").css("display","block");
		}		
	});
	$("#opcion2").click(function(){
		if($("#opcion2").hasClass('active-cat')){
			return false;
		}else{		
			loadingAjax(true);
		    setTimeout(pararCarga,800);		
			$("#productos").css("display","none");
			$("#vehiculos").css("display","block");
			$("#servicios").css("display","none");
			$("#inmuebles").css("display","none");
			$("#tiendas").css("display","none");			
			$("#opcion1").removeClass("active-cat");
			$("#opcion2").addClass("active-cat");
			$("#opcion3").removeClass("active-cat");
			$("#opcion4").removeClass("active-cat");
			$("#opcion5").removeClass("active-cat");
			$("#tituloCategoria").css("display","block");
		}		
	});
	$("#opcion3").click(function(){
		if($("#opcion3").hasClass('active-cat')){
			return false;
		}else{		
			loadingAjax(true);
		    setTimeout(pararCarga,800);		
			$("#productos").css("display","none");
			$("#vehiculos").css("display","none");
			$("#inmuebles").css("display","block");		
			$("#servicios").css("display","none");
			$("#tiendas").css("display","none");
			$("#opcion1").removeClass("active-cat");
			$("#opcion2").removeClass("active-cat");
			$("#opcion3").addClass("active-cat");
			$("#opcion4").removeClass("active-cat");
			$("#opcion5").removeClass("active-cat");
			$("#tituloCategoria").css("display","block");			
		}		
	});
	$("#opcion4").click(function(){
		if($("#opcion4").hasClass('active-cat')){
			return false;
		}else{		
			loadingAjax(true);
		    setTimeout(pararCarga,800);		
			$("#productos").css("display","none");
			$("#vehiculos").css("display","none");
			$("#inmuebles").css("display","none");		
			$("#servicios").css("display","block");
			$("#tiendas").css("display","none");
			$("#opcion1").removeClass("active-cat");
			$("#opcion2").removeClass("active-cat");
			$("#opcion3").removeClass("active-cat");
			$("#opcion5").removeClass("active-cat");
			$("#opcion4").addClass("active-cat");
			$("#tituloCategoria").css("display","block");			
		}		
	});
	$("#opcion5").click(function(){
		if($("#opcion5").hasClass('active-cat')){
			return false;
		}else{		
			loadingAjax(true);
		    setTimeout(pararCarga,800);		
			$("#productos").css("display","none");
			$("#vehiculos").css("display","none");
			$("#inmuebles").css("display","none");		
			$("#servicios").css("display","none");
			$("#tiendas").css("display","block");
			$("#opcion1").removeClass("active-cat");
			$("#opcion2").removeClass("active-cat");
			$("#opcion3").removeClass("active-cat");
			$("#opcion4").removeClass("active-cat");
			$("#opcion5").addClass("active-cat");
			$("#tituloCategoria").css("display","none");			
		}		
	});	
	
	/*$(".publicaciones1,.publicaciones2").click(function(e){
		window.open("detalle.php?id=" + $(this).attr("id"),"_self"); 
	});*/
	
	$("body").on('click', '.publicaciones1,.publicaciones2', function(e){
		window.open("detalle.php?id=" + $(this).attr("id"),"_self"); 
	});
	$(document).on("click",".vendedores",function(e){
		window.open("perfil.php?id=" + $(this).attr("id"),"_self");
	});
	$(document).on("click",".pre_pub",function(e){
		window.open("preguntas.php?tipo=1&publicacion=" + $(this).data("id_pub"),"_self");  
	});
	$(document).on("click",".resp_pub",function(e){
		window.open("preguntas.php?tipo=2&publicacion=" + $(this).data("id_pub"),"_self");
	});
	$(document).on("click",".detalle",function(e){
		window.open("detalle.php?id=" + $(this).data("id"),"_self");
	//	window.open("pub_" + $(this).attr("id"),"_self");
	});
	$(document).on("click",".perfil",function(e){
		window.open("perfil.php?id=" + $(this).data("id"),"_self");
	});	
	function pararCarga(){
		loadingAjax();
	}
	
/* Validador de Formulario de recuperar contrase&oacute;a */	
$('#recover-password').formValidation({
		locale: 'es_ES',
		excluded: ':disabled',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {			
			rec_usuario : {validators : {
				notEmpty : {},
				blank: {}}}
		}
	}).on('success.field.fv', function(e, data) {
        if (data.fv.getInvalidFields().length > 0) {    // There is invalid field
            data.fv.disableSubmitButtons(true);
        }
    }).on('err.form.fv', function(e,data) {
    	//$(".dropdown-toggle").dropdown('toggle');
    }).on('success.form.fv', function(e) {
		e.preventDefault();
		//var url=$(this).data("url");
		//var sendurl="&url="+url;
		var form = $(e.target);
		var fv = form.data('formValidation');
		var method = "&method=recover";
		$.ajax({
			url: form.attr('action'), // la URL para la petición
           data: form.serialize() + method, // la información a enviar
            type: 'POST', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta            
            success: function (data) {            	
            	// código a ejecutar si la petición es satisfactoria;
            	// código a ejecutar si la petición es satisfactoria;
            	// console.log(data);
	            if (data.result === 'error'){
	            	for (var field in data.fields) {
	        			fv
	                    // Show the custom message
	                    .updateMessage(field, 'blank', data.fields[field])
	                    // Set the field as invalid
	                    .updateStatus(field, 'INVALID', 'blank');
	        			setTimeout(function(){
	        				$("#"+field).focus();	       			
	        			}, 10);
	            	}
	            	$(".dropdown-toggle").dropdown('toggle');
	            	
	            } else if(data.result==="Actualice") {
					elId=data.id;
	            	$("#actualizar").modal('show');
	            } else{
	            	swal({
						title: "Excelente", 
						text: "&iexcl;Revisa tu correo!",
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
 

	
	
// Tooltip ------------------------------------
  $('[data-toggle="tooltip"]').tooltip();
//---------------------------------------------

// Popover------------------------------------
 // $('[data-toggle="popover"]').popover("show");
 //---------------------------------------------

	function buscaDerecha(){
		var elDiv=$("#listaPublicaciones");
		var elInicio=$("#inicio");
		var laPagina=$("#inicio").data("pagina");
		laPagina++;
		$.ajax({
			url:"fcn/f_index.php",
			data:{metodo:"buscarPublicaciones",pagina:laPagina},
			type:"POST",
			dataType:"html",
			success: function(data){
				console.log(data);
				elDiv.html(data);
				elInicio.data("pagina",laPagina);
			}
		});
	}
	
	$("#enviar-email").formValidation({
		locale: 'es_ES',
		excluded: ':disabled',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {			
			nombre : {validators : {
				notEmpty : {},
				stringLength : {max : 512},
				regexp: {regexp: /^[\u00F1a-z\s]+$/i}}},
			email : {validators : {
				notEmpty : {},
				emailAddress : {}}},			
			mensaje : {validators : {
				notEmpty:{}}				
			}
		}
	}).on('success.field.fv', function(e) {		
		e.preventDefault();
		email=$("#email").val();
		nombre=$("#nombre").val();
		mensaje=$("#mensaje").val();
		method="send-email";

	});	
$("#enviar").click(function(e){
		e.preventDefault();
		email=$("#email").val();
		nombre=$("#nombre").val();
		mensaje=$("#mensaje").val();
		iduser=$("#enviar-email").data("iduser");
		method="send-email";
		$.ajax({
			url:"fcn/f_usuarios.php",
			data:{'method':method,'nombre':nombre,'email':email,'mensaje':mensaje,'iduser':iduser},
			type:"POST",
			dataType:"html",
			success:function(data){
				//alert(data);
			console.log(data);
			},
			error:function(xhr,status){
				alert(data);
				SweetError(status);
			}
		});
			swal({
						title: "Exito", 
						text: "Tu mensaje ha sido enviado.",
						imageUrl: "galeria/img/logos/bill-ok.png",
						timer: 2000, 
						showConfirmButton: true}, function(){
							location.reload();
										
						});
				
		
	});
	
/*********** Enviar Email de Contacto a la sede  ******/
	
	
	$("#enviar-email-sede").formValidation({
		locale: 'es_ES',
		excluded: ':disabled',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {			
			nombre_comprador : {validators : {
				notEmpty : {},
				stringLength : {max : 512},
				regexp: {regexp: /^[\u00F1a-z\s]+$/i}}},
			email_comprador : {validators : {
				notEmpty : {},
				emailAddress : {}}},			
			mensaje_comprador : {validators : {
				notEmpty:{}}				
			}
		}
	}).on('success.field.fv', function(e) {		
		 email=$("#email_comprador").val();
		nombre=$("#nombre_comprador").val();
		mensaje=$("#mensaje_comprador").val();
		emailsede=$("#enviar-email-sede").data("email");
		method="send-email-comprador";
		
        });	
        
        
   $("#enviar-emailto").click(function(e){     
        e.preventDefault();  
        email=$("#email_comprador").val();
		nombre=$("#nombre_comprador").val();
		mensaje=$("#mensaje_comprador").val();
		emailsede=$("#enviar-email-sede").data("email");
		method="send-email-comprador";
		$.ajax({
			url:"fcn/f_usuarios.php",
			data:{'method':method,'nombre':nombre,'email':email,'mensaje':mensaje,'emailsede':emailsede},
			type:"POST",
			dataType:"html",
			success:function(data){
				//alert(data);
			console.log(data);
			},
			error:function(xhr,status){
				alert(data);
				SweetError(status);
			}
		});
			swal({
						title: "Exito", 
						text: "Tu mensaje ha sido enviado.",
						imageUrl: "galeria/img/logos/bill-ok.png",
						timer: 2000, 
						showConfirmButton: true}, function(){
							location.reload();
										
						}); 	
});
/* ------------ 2do modal ----------- */
 $(".contac-footer").click(function(e){   	
  email=$(this).data('email');
  $("#enviar-email-sede_2").data('email',email); 
  $( "#email_contacto" ).html( email );
});  

$("#enviar-email-sede_2").formValidation({
		locale: 'es_ES',
		excluded: ':disabled',
		framework : 'bootstrap',
		icon : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		addOns: { i18n: {} },
		err: { container: 'tooltip' },
		fields : {			
			nombre_comprador_2 : {validators : {
				notEmpty : {},
				stringLength : {max : 512},
				regexp: {regexp: /^[\u00F1a-z\s]+$/i}}},
			email_comprador_2 : {validators : {
				notEmpty : {},
				emailAddress : {}}},			
			mensaje_comprador_2 : {validators : {
				notEmpty:{}}				
			}
		}
	}).on('success.field.fv', function(e) {		
		 email=$("#email_comprador_2").val();
		nombre=$("#nombre_comprador_2").val();
		mensaje=$("#mensaje_comprador_2").val();
		emailsede=$("#enviar-email-sede_2").data("email");
		method="send-email-comprador";
		
        });
  
  $("#enviar-emailto-2").click(function(e){     
        e.preventDefault();  
        email=$("#email_comprador_2").val();
		nombre=$("#nombre_comprador_2").val();
		mensaje=$("#mensaje_comprador_2").val();
		emailsede=$("#enviar-email-sede_2").data("email");
		method="send-email-comprador";
		//alert(emailsede+"esa");
		$.ajax({
			url:"fcn/f_usuarios.php",
			data:{'method':method,'nombre':nombre,'email':email,'mensaje':mensaje,'emailsede':emailsede},
			type:"POST",
			dataType:"html",
			success:function(data){
				//alert(data);
			console.log(emailsede+mensaje);
			swal({
						title: "Exito", 
						text: "Tu mensaje ha sido enviado.",
						imageUrl: "galeria/img/logos/bill-ok.png",
						timer: 2000, 
						showConfirmButton: true}, function(){
							location.reload();
										
						}); 
			},
			error:function(xhr,status){
				alert(data);
				SweetError(status);
			}
		});
				
});        
/******************* 2do modal de contacto *****************/

	
	$(document).on('keyup',"#txtBusqueda",function(e){
		if($(this).val()!=""){
			var c=0;
			var valor=$(this).val().toUpperCase();			
			$(".general").each(function(i){
				var titulo=$(this).data("titulo").toUpperCase();				
				if(titulo.indexOf(valor)==-1) {
					$(this).css("display","none");
				}else{
					c++;
					$(this).css("display","block");
				}
			});
			if(c==0){
				$("#noresultados").removeClass("hidden");
				$("#publicaciones").addClass("hidden");
			}else{
				$("#noresultados").addClass("hidden");
				$("#publicaciones").removeClass("hidden");				
			}
		}else{		
			if($(".general").length>0){
				$("#noresultados").addClass("hidden");
				$("#publicaciones").removeClass("hidden");
				$(".general").css("display","block");				
			}else{
				$("#noresultados").removeClass("hidden");
				$("#publicaciones").addClass("hidden");				
			}
		}
	});	
	
	$("#btnEmpresa").click(function(e){
		e.preventDefault();
		$.ajax({
			url:"fcn/f_usuarios.php",
			data:{method:'get',id:elId},
			type:"POST",
			dataType:"json",
			success:function(data){
				console.log(data);
				$("#info-empresarial").modal('show');
       			$(".modal-conf #e_tipo").val(data.campos.j_tipo);
            	$(".modal-conf #e_razonsocial").val(data.campos.j_razon_social);
	           	$(".modal-conf #e_categoria").val(data.campos.j_categorias_juridicos_id);
	           	$(".modal-conf #e_rif").val(data.campos.j_rif);
	           	$('.modal-conf #e_telefono').val(data.campos.u_telefono);
	           	$(".modal-conf #e_estado").val(data.campos.u_estados_id);
	           	$('.modal-conf #e_direccion').val(data.campos.u_direccion);
            	$('.modal-conf #p_id').val(elId);
				$("#actualizar").hide();
			}
		});
	});
	$("#btnPersona").click(function(e){
		e.preventDefault();
		$.ajax({
			url:"fcn/f_usuarios.php",
			data:{method:'get',id:elId},
			type:"POST",
			dataType:"json",
			success:function(data){
				console.log(data);
				$("#actualizar").hide();
				$("#info-personal").modal('show');
            	$(".modal-conf #p_identificacion").val(data.campos.n_identificacion);
       			$(".modal-conf #p_tipo").val(data.campos.n_tipo);
            	$(".modal-conf #p_nombre").val(data.campos.n_nombre);
            	$(".modal-conf #p_apellido").val(data.campos.n_apellido);
            	$('.modal-conf #p_telefono').val(data.campos.u_telefono);
            	$(".modal-conf #p_estado").val(data.campos.u_estados_id);
            	$('.modal-conf #p_direccion').val(data.campos.u_direccion);
            	$('.modal-conf #p_identificacion').data('valid',data.campos.n_identificacion);
            	$('.modal-conf #p_id').val(elId);
			}
		});
	});
	
	$("#btnPersona2").click(function(e){
		$("#btn_sin_cuenta").data("tipo","1");
		$("#tw_reg_button").data("tipo","1");
	    $("#actualizar2").data("tipo","1");
		$("#actualizar2").modal('hide');
	});
	$("#btnEmpresa2").click(function(e){
		$("#btn_sin_cuenta").data("tipo","2");
		$("#tw_reg_button").data("tipo","2");
		$("#actualizar2").data("tipo","2");
		$("#actualizar2").modal('hide');
	});		
	$("#info-personal").on("hidden.bs.modal",function(){
		 
		$("#actualizar").modal('show');
	});
	$("#info-empresarial").on("hidden.bs.modal",function(){
		$("#actualizar").modal('show');
	});
	$("#insc-red").on("hidden.bs.modal",function(){
		if ($('#usr-reg').is(':hidden')){
			//$("#actualizar2").modal('show');
		}
	});		
	$("#btn_sin_cuenta").click(function(){
		if ($(this).data("tipo")!=1) {
			$("#usr-reg-title").html($("section[data-type='p']").data("title"));
			$("#usr-reg-submit").data("type","p");
			$("section[data-type='p']").fadeIn();
			$("#type").val("p");
		} else {
			$("#usr-reg-title").html($("section[data-type='e']").data("title"));
			$("#usr-reg-submit").data("type","e");
			$("section[data-type='e']").fadeIn();
			$("#type").val("e");
		}		
		$("#insc-red").modal('hide');
	});
	
	
	$("#notificacion").click(function(){
		var id = $(this).data("id");
		$("#alerta").hide();
		$.ajax({									
			url: "fcn/f_usuarios.php",
			data: {method:"upd-Noti",id:id},
			type: "POST",
			dataType: "html",
			success:function(data){
				
					
			}
		});
	});
	
	/*********** Bloquear Usuario *************************/
	$("body").on('click', '.actualiza-follow', function(e) {
		ActualizarSeguidores();
	});
	$("body").on('click', '.bloqueo-seguidor', function(e) {
		var userbloq=$(this).data("userbloq");
		 $.ajax({
	            url: "paginas/perfil/fcn/f_bloqueados.php",
	            data: { id : $(this).data("user"), action:'bloquear',userbloq: userbloq},
	            type: 'GET',
	            dataType: 'json',
	            success: function (data) {
	            	
	            		if(data.result === "OK"){
	            			$("#"+userbloq).hide();
							//document.getElementById(id).style.display='none';
	            		}
	            	
	            },
	            error: function (xhr, status) {
	            	SweetError(status);
	            	
	            }
	        });
	 	
	});
	function ActualizarSeguidores(){
		count = $("#btn-megusta").data("count");
		count--;
		$("#btn-megusta").data("count",count);
        $("#megustan").text($("#btn-megusta").data("count"));
        
		if(count<1){
			$("#megustan").text("");
            $("#seguidores").html("Aun nadie te sigue");
            $("#megustan").text('');
        }
        if(count==1){
    		$("#seguidores").html("persona te sigue ");
       	}
       	if(count>1){
    		$("#seguidores").html("personas te siguen");
       	}	
	} 
	
	$("body").on('click', '.ver-noti-seguidor', function(e) {
		$("#info-seguidor").modal('show');
	 	var usuarios_id= $(this).data("id");
		usuarios_id = parseInt(usuarios_id);		   
		$(".bloqueo-seguidor").data('userbloq',usuarios_id);
		 
		if(usuarios_id>0){
			$.ajax({
				url: "fcn/f_usuarios.php", // la URL para la petici&oacute;n
	            data: {method:"get", id:usuarios_id}, // la informaci&oacute;n a enviar
	            type: 'POST', // especifica si ser&aacute; una petici&oacute;n POST o GET
	            dataType: 'json', // el tipo de informaci&oacute;n que se espera de respuesta
	            success: function (data) {
	            	// c&oacute;digo a ejecutar si la petici&oacute;n es satisfactoria; 
	            	 
	            	if (data.result === 'OK') {  
	            				$('.modal-info-seguidor .fotoperfil').attr("src", data.campos.ruta);				            	
				            	$('.modal-info-seguidor .seudonimo').html(data.campos.a_seudonimo);
				            	$('.modal-info-seguidor .telefono').html(data.campos.u_telefono);
				            	$('.modal-info-seguidor .correo').html(data.campos.a_email);
				            	
				            	
				            	if(data.campos.n_nombre==""){
				            		$('.modal-info-seguidor .nombres').html(data.campos.j_razon_social); 
				            	}else{
				            		$('.modal-info-seguidor .nombres').html(data.campos.n_nombre); 
				            	}
				            	
		            }
	          	},// c&oacute;digo a ejecutar si la petici&oacute;n falla;
	            error: function (xhr, status) {
	            	SweetError(status);
	            }
	        });
	    } 
	 	 
	 	
	});	
 
	
	$('#divID').click(function(){
		var fondo=$("#changefondo").val();
	        fondo++;
	        $('body').css("background-image", "url(galeria/img/fondos/F"+fondo+".jpg)");  
		if (fondo>9) 
		fondo=0;
	 	$("#changefondo").val(fondo);
	});
	
	$('#divID2').click(function(){
			var fondo=$("#changefondo").val();
			if(fondo==1){
  				fondo=2;
  				$("#imagenroja").css("display","none");
  				$('body').css("background-image", "url(galeria/img/fondos/INDF2.jpg)");  			  				
  			}else{
  				fondo=1;
  				$('body').css("background", "");
  				$("#imagenroja").css("display","block");  				
  			}

 			$("#changefondo").val(fondo);
		});
});
</script>