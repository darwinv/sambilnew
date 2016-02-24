<?php
$oculto="";
$activo="active";	

$paginador='<div id="paginacion" name="paginacion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " data-paginaActual="1" data-total="<?php echo $total;?>"><center><nav><ul class="pagination">
					    	 
									<li id="anterior2" name="anterior2" class="hidden"><a href="#" aria-label="Previous" class="navegador" data-funcion="anterior2"><i class="fa fa-angle-double-left"></i> </a>
									<li id="anterior1" name="anterior1" class="hidden"><a href="#" aria-label="Previous" class="navegador" data-funcion="anterior1"><i class="fa fa-angle-left"></i> </a>';									
							 										
									for($i=1;$i<=$totalPaginas;$i++):
									
										$paginador.='<li class="'.$activo.' '.$oculto.'"><a class="botonPagina" href="#" data-pagina="'.$i.'">'.$i.'</a></li>';
									
									$activo="";
									if($i==10)
									$oculto=" hidden";
									endfor;
								
									if($totalPaginas>1):
										$paginador.='<li id="siguiente1" name="siguiente1"><a href="#" aria-label="Next" class="navegador" data-funcion="siguiente1"><i class="fa fa-angle-right"></i> </a>';
									
									endif;
									 
									if($totalPaginas>10):
										$paginador.='<li id="siguiente2" name="siguiente2"><a href="#" aria-label="Next" class="navegador" data-funcion="siguiente2"><i class="fa fa-angle-double-right"></i> </a>';
									 
									endif;
							
								$paginador.='</li></ul>
						</nav></center></div>';