<div class="row">
	<!-- inicion del row principal  -->

	<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 maB10  " >
		<!-- inicio contenido  -->

		<div class=" contenedor">
			<!-- inicio contenido conte1-1 -->

			<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 marB10 marT10   "><!-- inicio titulo   -->
				<h4 class=" marL20 marR20 t20 negro" style="padding:10px;"><span class="marL10">Campa&ntilde;a Publicitaria</span></h4>
				<center>
					<hr class='ancho95'>
				</center>
			</div><!-- Fin titulo   -->
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marB10 marT15 marL20" ><!-- inicio Boto de agregar mensaje   -->
				<button id="btnAgregar" name="btnAgregar" type="button" class="btn btn-default marL20 " data-toggle="modal" data-target="#add-msj"> <i class="fa fa-plus-square marR5"></i> Agregar Mensaje Nuevo</button>
			</div><!-- Fin Boto de agregar mensaje   -->

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marB10 marT10"><!-- inicio Filtros y resultados   -->
				<div class="marL30 marR20" style="background: #F2F2F2;">
					<table width="100%" class="alto50" border="0" cellspacing="0" cellpadding="0" >
						<tr>
							<td  width="75%"  align="right"><span class="marR10">Mensajes 1 - 50 de <b>100</b></span></td>
							<td   width="15%"  align="right" height="40px;" >
							<select id="filtro" class="form-control  input-sm " style="width:auto; margin-right:20px;">
								<option value="desc" >Mas Recientes</option>
								<option value="asc" >Menos Recientes </option>
								<option value="desc" >Mayor Precio</option>
								<option value="asc" >Menor Precio </option>
							</select></td>
						</tr>
					</table>
				</div>
			</div><!-- Fin Filtros y resultados   -->

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marB10 marT10"></div> <!-- Espaciador   -->

			<div class='row  marB10 marT10 marL50 marR30'>
				<div id="listaPublicaciones">
				<!-- INICIO de detalle del listado de publicaciones -->		
				
				
				<!-- FIN de detalle del listado de publicaciones -->
					
				<!-- INICIO de detalle del listado de publicaciones -->		
				
				<div class='col-xs-12 col-sm-12 col-md-1 col-lg-1  '>					
						<div class='marco-foto-publicaciones  point ' style='width: 65px; height: 65px;' > <img src=''  class='img img-responsive center-block img-apdp'> </div>
				</div>
				<div class='col-xs-12 col-sm-12 col-md-7 col-lg-8  t14  '>
					<div class='marL20'>
						Lorem ipsum ad his scripta blandit partiendo, eum fastidii.Lorem ipsum ad his, eum fastidii.orem ipsum ad his
					</div>						
					<div class="marL20">
						<a href="#" data-toggle='modal' data-target='#add-msj' data-id='$publicacion->id' data-titulo='$publicacion->titulo' data-stock='$publicacion->stock' data-monto='$publicacion->monto' data-id='b" . $publicacion->id . "'  class="modificar">
							Editar <i class="fa fa-pencil marT5 marL5 "></i>
							</a>						
					</div>	
				</div>
				<div class='col-xs-12 col-sm-12 col-md-3 col-lg-2  text-left '>
					<div style="background:#F8F8F8" class="pad10 t10 grisC" >
						Desde: <span class="grisO"> Enero-06-2016 </span>
						<br>
						Hasta:<span class="grisO"> Febrero-06-2016 </span>
						</div>		
				</div>
				<div class='col-xs-12 col-sm-12 col-md-1 col-lg-1  text-center '>			
						<br>
						<a href="#" data-target="#msj-eliminar" data-toggle="modal"><i class="fa fa-remove red t16"></i>	</a>								
				</div>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 marB10 marT10'> <!-- linea separadora entre publicacion y publicacion  -->
					<center><hr class=' center-block'></center>
				</div>
				<!-- FIN de detalle del listado de publicaciones -->
				
				<!-- INICIO de detalle del listado de publicaciones -->		
				
				<div class='col-xs-12 col-sm-12 col-md-1 col-lg-1  '>					
						<div class='marco-foto-publicaciones  point ' style='width: 65px; height: 65px;' > <img src=''  class='img img-responsive center-block img-apdp'> </div>
				</div>
				<div class='col-xs-12 col-sm-12 col-md-7 col-lg-8  t14  '>
					<div class='marL20'>
						Lorem ipsum ad his scripta blandit partiendo, eum fastidii.Lorem ipsum ad his, eum fastidii.orem ipsum ad his
					</div>
						
					<div class="marL20">
						<a href="#" data-toggle='modal' data-target='#add-msj' data-id='$publicacion->id' data-titulo='$publicacion->titulo' data-stock='$publicacion->stock' data-monto='$publicacion->monto' data-id='b" . $publicacion->id . "'  class="modificar">
							Editar <i class="fa fa-pencil marT5 marL5 "></i>
							</a>						
					</div>	
				</div>
				<div class='col-xs-12 col-sm-12 col-md-3 col-lg-2  text-left '>
					<div style="background:#F8F8F8" class="pad10 t10 grisC" >
						Desde: <span class="grisO"> Enero-06-2016 </span>
						<br>
						Hasta:<span class="grisO"> Febrero-06-2016 </span>
						</div>		
				</div>
				<div class='col-xs-12 col-sm-12 col-md-1 col-lg-1  text-center '>			
						<br>
						<a href="#" data-target="#msj-eliminar" data-toggle="modal"><i class="fa fa-remove red t16"></i>	</a>						
				</div>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 marB10 marT10'> <!-- linea separadora entre publicacion y publicacion  -->
					<center><hr class=' center-block'></center>
				</div>
				<!-- FIN de detalle del listado de publicaciones -->
				
				
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 marB10 marT10'>	<!-- Inicio de Paginacion -->
				<nav class='text-center'>
				  <ul class='pagination'>
				<li>
				      <a href='#' aria-label='Previous'>
				        <span aria-hidden='true'>&laquo;</span>
				      </a>
				    </li>
				    <li><a href='#'>1</a></li>
				
				 <li>
				      <a href='#' aria-label='Next'>
				        <span aria-hidden='true'>&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
				</div>	<!-- Fin de Paginacion -->
				
				</div>
			</div>

		</div>
		<!-- fin contenido conte1-1 -->

	</div >
	<!-- fin de contenido -->

</div>
<!-- fin de row principal  -->


