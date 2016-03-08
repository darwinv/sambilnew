<?php
include_once 'bd.php';
/**
 *
 */
class sede {
	/* * * * * * * * * * * * * * * * * * * * * * *
	 * ===========--- Attributes ---============ *
	 * * * * * * * * * * * * * * * * * * * * * * */
	//Usuario (u)
	protected $s_sedes = "sedes";
	private $id = 0;
	private $s_nombre;	

	/* * * * * * * * * * * * * * * * * * * * * * *
	 * ===========--- Contructor ---============ *
	 * * * * * * * * * * * * * * * * * * * * * * */
	public function sede($id = NULL) {
		if ($id != NULL) {
			// Hago consulta;
			$this->buscarUsuario ( $id );
		}
	}
	/* * * * * * * * * * * * * * * * * * * * *
	 * ===========--- Methods ---=========== *
	 * * * * * * * * * * * * * * * * * * * * */
	public function buscarSedes($id = NULL) {
		 
		$bd=new bd();
		
		$consulta="select id, nombre, codigo from sedes where 1 ";
		
		if(!empty($id))
			$consulta.=" and id='$id' ";
		
		$result=$bd->query($consulta);
		  
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	public function buscarDetalleSede($sedes= NULL, $ciudad_sambil=NULL, $id = NULL) {
		 
		 	 				 $id_sede="";
							foreach ($sedes as $value) { 
		 						if($ciudad_sambil==$value['codigo'])
									$id_sede=$value['id']; 
							} 
		 	
		  					$ciudad_sambil=str_replace('-', ' ', $ciudad_sambil); 
		  
							$texto_ciudad=$ciudad_sambil;
							
							$img_banner='';
							
							if($ciudad_sambil==('Caracas')){
								$img_banner='galeria/img/apdp-slide/CARACAS.jpg';
								$telf_sambil='58 (212) 263.93.23';
								$email_sambil='cdodesarrollo4@gmail.com';
							//$email_sambil='info.cscs@sambil.com';								
							}
							if($ciudad_sambil==('San Cristobal')){
								$img_banner='galeria/img/apdp-slide/SAN_CRISTOBAL.jpg';
								$telf_sambil='58 (276) 340.35.28 - 340.35.30';
								$email_sambil='darwin_vasqz@hotmail.com';
								//$email_sambil='info.cssc@sambil.com';
								$texto_ciudad='San Crist&oacute;bal';							
							}
							if($ciudad_sambil==('Valencia')){
								$img_banner='galeria/img/apdp-slide/VALENCIA1.jpg';
								$telf_sambil='58 (241) 841.17.26';
								$email_sambil='mail@sambil.com';
							}
							if($ciudad_sambil==('Maracaibo')){
								$img_banner='galeria/img/apdp-slide/MARACAIBO.jpg';
								$telf_sambil='58 (0261)-740.00.18';
								$email_sambil='mail@sambil.com';
							}
							if($ciudad_sambil==('Barquisimeto')){
								$img_banner='galeria/img/apdp-slide/BARQUISIMETO.jpg';
								$telf_sambil='58 (0251) - 713.79.05';
								$email_sambil='mail@sambil.com';
							}
							if($ciudad_sambil==('Margarita')){
								$img_banner='galeria/img/apdp-slide/MARGARITA.jpg';
								$telf_sambil='58 (0295) 260.27.26';
								$email_sambil='mail@sambil.com';
							}
							if($ciudad_sambil==('Paraguana')){
								$img_banner='galeria/img/apdp-slide/PARAGUANA.jpg';
								$telf_sambil='58 (0269)-410.33.00';
								$email_sambil='mail@sambil.com';
								$texto_ciudad='Paraguan&aacute;';
							}							
							
							if(empty($img_banner)){
								$img_banner='galeria/img/apdp-slide/CARACAS.jpg';
								$texto_ciudad='Caracas';
								$telf_sambil='58 (212) 263.93.23';
								$email_sambil='cdodesarrollo4@gmail.com';
								$ciudad_sambil='Caracas';
							}
						
					
					$result= array($id_sede, $img_banner, $telf_sambil, $email_sambil,$texto_ciudad);
					 
					return $result;
	}
	
	
	
	
	 
}