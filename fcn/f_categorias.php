<?php
include_once "clases/bd.php";
include_once "clases/usuarios.php";
include_once "clases/fotos.php";
$bd=new bd();
$foto=new fotos();
$result=$bd->doFullSelect("usuarios","certificado=1");
?>
<div class="row ">
	<!-- <div class="categorias2 " id="inicio">
 		<div class="hidden-md col-lg-3">      
       		<div class="oculto2"><a href="#"></div>     
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
       		<a href="#" ><div id="opcion5"><img src="galeria/img/iconos_cat/verificado.png" width="35" height="35" ><span class="marL5">Tiendas Certificadas </span></div></a>
	    </div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="#" ><div id="opcion1" class="active-cat"><img src="galeria/img/iconos_cat/autos motos y otros.png" width="10" height="35" class="oculto2" ><span class="marL5">Productos y otros </span></div></a>
	    </div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
       		<a href="#" ><div id="opcion4"><img src="galeria/img/iconos_cat/servicios.png" width="43" height="35"><span class="marL5">Servicios </span></div></a>
    	</div>
	</div> -->
	
	<div class="categorias " id="productos" style="display:block"> <!-- categorias de productos y otros-->   
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1384"><div><img src="galeria/img/iconos_cat/1.png" width="auto" height="40"><span class="marL5 ">Bebes </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1039"><div><img src="galeria/img/iconos_cat/2.png" width="auto" height="40"><span class="marL5 ">C&aacute;maras  </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1051"><div><img src="galeria/img/iconos_cat/4.png" width="auto" height="40"><span class="marL5 ">Celulares y tel&eacute;fonos </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
       		<a href="listado.php?id_cla=1648"><div><img src="galeria/img/iconos_cat/5.png" width="auto" height="40"><span class="marL5 ">Computaci�n </span></div></a>     
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1276"><div><img src="galeria/img/iconos_cat/6.png" width="auto" height="40"><span class="marL5 ">Deportes y fitness </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=5726"><div><img src="galeria/img/iconos_cat/7.png" width="auto" height="40"><span class="marL5 ">Electrodomesticos </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
      		<a href="listado.php?id_cla=1000"><div><img src="galeria/img/iconos_cat/8.png" width="auto" height="40"><span class="marL5">Electr&oacute;nica </span></div></a>
	    </div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
       		<a href="listado.php?id_cla=1246"><div><img src="galeria/img/iconos_cat/9.png" width="auto" height="40"><span class="marL5 ">Est&eacute;tica y belleza </span></div></a>     
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1574"><div><img src="galeria/img/iconos_cat/10.png" width="auto" height="40"><span class="marL5 ">Hogar y muebles </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1499"><div><img src="galeria/img/iconos_cat/11.png" width="auto" height="40"><span class="marL5 ">Industrias </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1182"><div><img src="galeria/img/iconos_cat/12.png" width="auto" height="40"><span class="marL5 ">Instrumentos musicales </span></div></a>      
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
       		<a href="listado.php?id_cla=1132"><div><img src="galeria/img/iconos_cat/13.png" width="auto" height="40"><span class="marL5 ">Juegos y juguetes</span></div></a>     
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=3025"><div><img src="galeria/img/iconos_cat/14.png" width="auto" height="40"><span class="marL5 ">Libros y audiovisuales </span></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
       		<a href="listado.php?id_cla=1071"><div><img src="galeria/img/iconos_cat/15.png" width="auto" height="40"><span class="marL5 ">Mascotas </span></div></a>     
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1798"><div><img src="galeria/img/iconos_cat/17.png" width="auto" height="40"><span class="marL5 ">Pasatiempos </span></div></a>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1430"><div><img src="galeria/img/iconos_cat/3.png" width="auto" height="40"><span class="marL5 ">Prendas y calzados </span></div></a>      
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=3937"><div><img src="galeria/img/iconos_cat/16.png" width="auto" height="40"><span class="marL5 ">Relojes y joyas </span></div></a>      
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1747"><div><img src="galeria/img/iconos_cat/18.png" width="auto" height="40" ><span class="marL5 ">Repuestos </span></div></a>      
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
      		<a href="listado.php?id_cla=1144"><div><img src="galeria/img/iconos_cat/19.png" width="auto" height="40"><span class="marL5 ">Videojuegos</span></div></a>      
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1953"><div><img src="galeria/img/iconos_cat/repuestos.png" width="1" height="40" class="oculto2" ><span class="marL5 ">Otras categor&iacute;as</span></div></a>      
    	</div>
  </div>
  <div class="categorias3" id="vehiculos" style="display:none"> <!-- Categorias de vehiculos --> 
   		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">     
	    	<a href="listado.php?id_cla=1744"><div ><div >Carros y camionetas </div></div></a>
	    </div>
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
	    	<a href="listado.php?id_cla=1763"><div ><div>Motos</div></div></a>
    	</div>  
	    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
    		<a href="listado.php?id_cla=6112"><div ><div>N�utica</div></div></a>
	    </div> 
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
        	<a href="listado.php?id_cla=1907"><div ><div>Otros</div></div></a>
	    </div>       
  </div>
  <div class="categorias3" id="servicios" style="display:none"> <!-- Categorias de servicios --> 
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">     
      		<a href="listado.php?id_cla=9079"><div ><div >Belleza e Higiene</div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1563"><div ><div>Cursos y Clases</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=8738"><div ><div>Fiestas y Eventos</div></div></a>
    	</div> 
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=9020"><div ><div>Gastronom&iacute;a</div></div></a>
    	</div>   
      	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">     
      		<a href="listado.php?id_cla=116745"><div ><div >Hogar </div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=56666"><div ><div>Imprenta</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=92403"><div ><div>Mantenimiento de Veh�culos</div></div></a>
    	</div> 
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=116749"><div ><div>Oficios</div></div></a>
    	</div>   
      	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">     
      		<a href="listado.php?id_cla=1541"><div ><div >Profesionales </div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=9056"><div ><div>Servicios M�dicos</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=9004"><div ><div>Reparaciones e Instalaciones</div></div></a>
    	</div> 
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=91068"><div ><div>Ropa y Moda</div></div></a>
    	</div>   
      	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">     
      		<a href="listado.php?id_cla=9116"><div ><div >Servicios para mascotas </div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=9038"><div ><div>Transporte</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="listado.php?id_cla=1229"><div ><div>Viajes y Turismo</div></div></a>
    	</div> 
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">      
      		<a href="1898"><div ><div>Otros Servicios</div></div></a>
    	</div>
  </div>  
  <div class="categorias3" id="inmuebles" style="display:none"> <!-- Categorias de Inmuebles --> 
    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">     
      		<a href="listado.php?id_cla=50970"><div ><div >Acciones de Club</div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=1892"><div ><div>Anexos</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=1472"><div ><div>Apartamentos</div></div></a>
    	</div> 
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=1466"><div ><div>Casas</div></div></a>
    	</div>   
      	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">     
      		<a href="listado.php?id_cla=50957"><div ><div >Edificios </div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=50951"><div ><div>Galpones</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=60774"><div ><div>Habitaciones</div></div></a>
    	</div> 
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=50964"><div ><div>Haciendas y fincas</div></div></a>
    	</div>   
      	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">     
      		<a href="listado.php?id_cla=50960"><div ><div >Hoteles y Resorts </div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=68199"><div ><div>Locales</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=50529"><div ><div>Negocios</div></div></a>
    	</div> 
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=1487"><div ><div>Oficinas</div></div></a>
    	</div>   
      	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">     
      		<a href="listado.php?id_cla=50968"><div ><div >Parcelas de Cementerio </div></div></a>
    	</div>
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=1493"><div ><div>Terrenos</div></div></a>
    	</div>  
     	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">      
      		<a href="listado.php?id_cla=60745"><div ><div>townhouses</div></div></a>
    	</div>   
	</div>  	
	<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 categorias3   contenedor sombra-div" id="tiendas" style="display:none; margin-top:40px;">	
	  	<div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
      			<p class="text-left mar20 " style="border-right: 1px solid #ccc;">
        		<span class="negro t26 ">Tiendas <br> certificadas</span>       		
        		<br><br>
        		<span class="vin-blue t18" style="text-decoration:underline;"><a href="listado.php">Ver m�s...</a></span>
         		<br>
        		<br>
      			</p>
    		</div>
	  		<?php
	  		if(!empty($result)):
	  			foreach($result as $r=>$valor):
	  				$usua=new usuario($valor["id"]);					
	  			?>
    				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
    					<br>  
      					<div class='marco-foto-conf  point center-block sombra-div3 ' style='height:120px; width: 120px;'  >
	    					<a href="perfil.php?id=<?php echo $usua->id;?>"><img src='<?php echo $foto->buscarFotoUsuario($usua->id);?>' 
	    						class=' img-responsive center-block img-apdp' style="width: 100%; height: 100%;"></a>
	  					</div>
    				</div>
    			<?php
				endforeach;
			endif;
			?>
     		
  		</div>
  	</div>-->
  	
  	
  	
    <div class="row contenedor sombra-div hover-vendedores anchoC center-block"  id="tiendas" style="display:none;  ">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
      <p class="text-left mar20" style="border-right: 1px solid #ccc;">
        <span class="negro t26 ">Tiendas<br> Oficiales</span>
        <br><br>
        <span>Puedes confiar libremente<br> en estas tiendas.</span>
        <br><br>
        <span class="vin-blue t18" style="text-decoration:underline;"><a href="#">Ver m�s...</a></span>
        <br>
      </p>
    </div>
 
    <!-- Desde aqui -->
    <?php
	$i=0;
    foreach($result as $r=>$valor):
    	$i++;
		$usua=new usuario($valor["id"]);
		?>
    	<div class='col-xs-12 col-sm-12 col-md-6 col-lg-2'>
    			<div class='text-center mar10 vendedores' style='relative;width:70%;'  id='<?php echo $usua->id;?>'>
			    	<br>
			    	<br>
			    	<div class='marco-foto-conf  point center-block sombra-div3 ' style='height:120px; width: 120px;'  >
					<img src='<?php echo $foto->buscarFotoUsuario($usua->id);?>' class=' img-responsive center-block img-apdp'>
					</div>
					<br>
					<br>
					<br>
				</div>
		</div>
		<?php
	endforeach;
   ?>
   </div>
  	

  </div>