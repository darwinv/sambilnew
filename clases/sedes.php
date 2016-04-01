<?php
class sede extends bd{
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
		parent::__construct();
		if ($id != NULL) {
			// Hago consulta;
			$this->buscarUsuario ( $id );
		}
	}
	/* * * * * * * * * * * * * * * * * * * * *
	 * ===========--- Methods ---=========== *
	 * * * * * * * * * * * * * * * * * * * * */
	public function buscarSedes($id = NULL) {
		
		$consulta="select id, nombre, codigo from sedes where 1 ";
		
		if(!empty($id))
			$consulta.=" and id='$id' ";
		
		$result=$this->query($consulta);
		  
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	public function buscarDetalleSede($sedes= NULL, $ciudad=NULL, $id = NULL) {
 
 	 	$id_sede="";
		foreach ($sedes as $value) { 
			if($ciudad==$value['codigo'])
				$id_sede=$value['id']; 
		}
		$ciudad=str_replace('-', ' ', $ciudad); 
  		$texto_ciudad=$ciudad;
		$img_banner='';
		
		if($ciudad==('Caracas')){
			$img_banner='galeria/img/apdp-slide/CARACAS.jpg';
			$telf='58 (212) 263.93.23';
			$email='cdodesarrollo4@gmail.com';
		//$email='info.cscs@sambil.com';
		}
		if($ciudad==('San Cristobal')){
			$img_banner='galeria/img/apdp-slide/SAN_CRISTOBAL.jpg';
			$telf='58 (276) 340.35.28 - 340.35.30';
			$email='darwin_vasqz@hotmail.com';
			//$email='info.cssc@sambil.com';
			$texto_ciudad='San Crist&oacute;bal';							
		}
		if($ciudad==('Valencia')){
			$img_banner='galeria/img/apdp-slide/VALENCIA1.jpg';
			$telf='58 (241) 841.17.26';
			$email='mail@sambil.com';
		}
		if($ciudad==('Maracaibo')){
			$img_banner='galeria/img/apdp-slide/MARACAIBO.jpg';
			$telf='58 (0261)-740.00.18';
			$email='mail@sambil.com';
		}
		if($ciudad==('Barquisimeto')){
			$img_banner='galeria/img/apdp-slide/BARQUISIMETO.jpg';
			$telf='58 (0251) - 713.79.05';
			$email='mail@sambil.com';
		}
		if($ciudad==('Margarita')){
			$img_banner='galeria/img/apdp-slide/MARGARITA.jpg';
			$telf='58 (0295) 260.27.26';
			$email='mail@sambil.com';
		}
		if($ciudad==('Paraguana')){
			$img_banner='galeria/img/apdp-slide/PARAGUANA.jpg';
			$telf='58 (0269)-410.33.00';
			$email='mail@sambil.com';
			$texto_ciudad='Paraguan&aacute;';
		}							
		if(empty($img_banner)){
			$img_banner='galeria/img/apdp-slide/CARACAS.jpg';
			$texto_ciudad='Caracas';
			$telf='58 (212) 263.93.23';
			$email='cdodesarrollo4@gmail.com';
			$ciudad='Caracas';
		}						
					
		$result= array($id_sede, $img_banner, $telf, $email,$texto_ciudad);
		 
		return $result;
	}

}