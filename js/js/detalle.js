/**
 * @author CDODESARROLLO2
 
*/ 
$(document).ready(function(){
	$("#corazon").click(function(){
		if($(this).hasClass("iconos-fav")){
			$(this).removeClass("iconos-fav");
			$(this).addClass("iconos");
			var t=$("#spanFav").data("count")-1;
			$("#spanFav").data("count",t);
			var tipo=2;
		}else{
			$(this).removeClass("iconos");
			$(this).addClass("iconos-fav");
			var t=$("#spanFav").data("count")+1;
			$("#spanFav").data("count",t);
			var tipo=1;
		}
		/*
		if(t>0){
			$("#spanFav").text(t);
		}else{
			$("#spanFav").text("");
		}
		*/
		id=$(this).data("id");
		$.ajax({
			url:"paginas/detalle/fcn/f_detalle.php",
			data:{metodo:"actualizarFavoritos",tipo:tipo,id:id},
			type:"POST",
			dataType:"html",
			success: function(data){
				console.log(data);
			}
		});
	});
});
