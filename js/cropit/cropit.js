/**
 * JavaScript: Cropit
 */

$(document).ready(function(){
		
	var rutaP=$("#img-portada").data("rP");	
	$('.image-editor').cropit({
		exportZoom: 1,
		imageBackground: true,
		imageBackgroundBorderWidth: 25,
		smallImage: 'reject',
		maxZoom: 2,
		freeMove: false,
		//imageSrc: 'galeria/img/fondos/portada.png',
		onImageError: function(e) {
            if (e.code === 1) {
                $('.error-msg').text("Por favor selecciona una imagen que tenga un minimo de " + ($('.cropit-image-preview').outerWidth()-250) + "px de ancho * " + ($('.cropit-image-preview').outerHeight()-100) + "px de alto.");
                $('.error-msg').css("display","block");
                $('.cropit-image-preview').addClass("has-error");      
                //$(".image-editor").cropit("imageSrc", 'galeria/img/fondos/portada.png');             
            }
        }	
	});
		
	$("#cambiar-foto").click(function(){
		$('.error-msg').css("display","none");
         $('.cropit-image-preview').removeClass("has-error");
	});	
	
	$("#cerrar").click(function(){
		$('.error-msg').css("display","none");
         $('.cropit-image-preview').removeClass("has-error");
	});
	$(".modal").mouseleave(function(){
		$('.error-msg').css("display","none");
        $('.cropit-image-preview').removeClass("has-error");
	});		
		
		
	$('#save-foto').click(function() {
		var imageData = $('.image-editor').cropit('export');
		if($("#save-foto").data("nro") === undefined){
			var count = 1;
			$('.foto').each(function(i, obj) {
				if($(this).children("img").attr("id") === undefined){
					$(this).css("background","transparent");
					$(this).children("img").attr("src",imageData);
					$(this).children("img").attr("id",count);
					$(this).children("i").removeClass('hidden');
					$("#arrastrar").addClass("hidden");
					return false;
				}
				count++;
			});
		}else{
			$("#"+$(this).data("nro")).attr("src",imageData);
			$("#"+$(this).data("nro")).parent().css("background","transparent");
			$("#"+$(this).data("nro")).next().removeClass('hidden');
			$(this).removeData("nro");
		}
	});
});