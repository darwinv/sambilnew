<div style="padding-left: 17px;" class="modal fade in" id="selec_envio" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h3 class="modal-title ">
					<img src="galeria/img/logos/mascota.png" ><span
						id="" class="marL15">Como deseas tu envio</span>
				</h3>
        </div>
        
	        	 
			
			
	        <div class="modal-body marL20 marR20">
	        
	        <form id="form-pago-envio" role='form' class="form-pago-envio">	
	        	<h4 > Forma de envio</h4>
	        <div id="retiro-modo" class="radio radio-site" > 
				<input type="radio" id="agencia" name="modo-retiro" checked="checked" value="agencia"><label for="agencia"> Agencias de Envio</label>
				 <input type="radio" id="presencial" name="modo-retiro" value="presencial"><label for="presencial">Retirar en Tienda Fisica</label>
			</div>  
			<div class="row"> 
			   
			    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-5 input"> 
					    <label>Seleccione Agencia</label>	
			          <select class="form-select" style="width: 90%;">
			          	<option value="zoom">Zoom</option>
			          	<option value="mrw">MRW</option>
			          	<option value="dhl">DHL</option>
			          </select>
			      </div> 
			      <div class="form-group col-sm-12 col-md-3 col-lg-4 input"> 
					    <label> Ingrese Direccion del Envio</label> 
					    <input type="text"  name="direccion_envio" id="direccion_envio"  class="form-input"/>
	              </div> 
	              <div class="form-group col-sm-12 col-md-3 col-lg-2 input">
	             	 <input type="checkbox" name="datostitular" value="1" checked> <b>Datos del titular </b> <br>
	              </div>
			</div>
			<hr/>
			<div class="row">
				<h4 class="mar20" > Forma de pago</h4>
				<div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-5 input"> 
					    <label>Seleccione Metodo de Pago</label>	
			            <select class="form-select" style="width: 90%;">
			          	<option value="credit">Tarjeta de Credito</option>
			          	<option value="transf">Deposito/Transferencia</option>
			          	<option value="bitcoin">Bit Coin</option>
			          </select>
			      </div> 
		    </div>
			</form>	     	
	
	        </div>
        
         
        <div class="modal-footer">
        	<button type="button" class="btn btn-primary2">Procesar Pago</button>	
          <button type="button" class="btn btn-default" data-dismiss="modal">Procesar Luego</button>
        </div>
      </div>
      
    </div>
  </div>