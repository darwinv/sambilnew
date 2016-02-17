<?php 
	include_once "../../../clases/usuarios.php";
	include_once "../../../clases/publicaciones.php";
	switch($_POST["method"]){
		case "buscar": 
			buscar();			
			break;		
		case "updateStatus":
			updateStatus();
			break;
	}
	 function buscar(){
	 	if (! isset ( $_SESSION )) {
			session_start ();
		}
		if(isset($_COOKIE["c_id"])){
			$id_user=$_COOKIE["c_id"]; 
		}else{
			$id_user=NULL;
		}
		
		$usuarios=new usuario($id_user); 
		
		$id_sede	=$usuarios->u_id_sede;
		
		$status=$_POST["status"]; 
		$orden='';
		$pagina=$_POST["pagina"]; 
		$result=$usuarios->getUsuarios($status, $orden ,$pagina,$id_sede);
		foreach($result as $r=>$fila){
					 
						
				?>
				<tr>
                    <td><?php echo $fila["seudonimo"]; ?></td>
                    <td><?php echo $fila["razon_social"]; ?></td>
                    <td><?php echo $fila["direccion"]; ?></td>
                    
                   <?php if($status=='1'){ ?>  
                        <td><a href="#mod" class="update_user show-select-rol" data-toggle="modal" data-target="#usr-update-info" data-rol-type="select" data-tipo="1" data-method="actualizar" data-usuarios_id="<?php echo $fila['id']; ?>"  ><i class="fa fa-lock" ></i> Modificar</a></td>
                        <td><a href="#del" class="select-usr-delete " data-toggle="modal" data-target='#msj-eliminar' data-status='3'  data-usuarios_id="<?php echo $fila['id']; ?>"   >
                        		<i class="fa fa-remove"></i> Suspender
                        	</a> 
                        </td>
                   <?php }else if($status=='3'){ ?>
                   		<td><a href="#del" class="select-usr-active" data-toggle="modal" data-target='#msj-activar' data-status='1'  data-usuarios_id="<?php echo $fila['id']; ?>"   >
                        		<i class="fa fa-check"></i> Activar
                        	</a>
                        </td>
                   	<?php } ?>
                        <td><a href="#del" class="ver-detalle-user" data-toggle="modal" data-target='#info-user-detail' data-usuarios_id="<?php echo $fila['id']; ?>"   >
                        		<i class="fa fa-eye"></i> Ver
                        	</a> 
                        </td>
                    
                </tr>
                <?php
		}
	}
	function updateStatus(){
		 
		$usuarios_id=		filter_input ( INPUT_POST, "usuarios_id" );
		$status_usuarios_id=filter_input ( INPUT_POST, "status_usuarios_id" );
		
		$usuario = new usuario($usuarios_id);
		
		//modificamos el estatus del usuario si ya existe el registro
		$result = $usuario ->updateStatus($usuarios_id, $status_usuarios_id); 
		
		if ($result) {
			
			if ($status_usuarios_id=='3') {
				$publicacion = new publicaciones();
				$publicacion->setStatusByUser($usuarios_id,'2');
			}
			
			echo json_encode ( array (
					"result" => "OK" 
			) );
			
		} else {
			echo json_encode ( array (
					"result" => "error" 
			) );
		}
		 
	}	
?>