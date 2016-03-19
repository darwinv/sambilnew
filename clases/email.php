<?php
class email{
	private $subject=WEBPAGE;
	 
	function sendEmail($destinatario,$html){
		$headers = 'From: '.COMPANY.' <no-responder@'.WEBPAGE.'> '  . "\r\n" . 'Reply-To: '  . 'no-responder@'.WEBPAGE. "\r\n" . 'X-Mailer: PHP/' . phpversion ();
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8.";
		
		mail($destinatario,$this->subject,$html,$headers);
	}
	function Header($version='1'){	
		$txt = "<!DOCTYPE html>
      <html lang='es'><body>
      	<div style=' padding 20px; text-align:left; margin: 20px;'>
		<div style='width:500px;background:#fff; color:#666; padding:20px; margin-left:30px; margin-right:30px;'>	
		<div style='text-align:left; padding-bottom:10px; border-bottom: 1px solid #CCC;'><img src='".WEBPAGE."/galeria/img-site/logos/logo-header-full.png' ></div>
		<br> ";
		return $txt;
	}
	function Footer($version='1'){
		$txt = "<div style='font-size: 12px; text-align:left; margin-left:10px; color:#999;  margin-top:5px;'>			
		".SLOGAN."</div></div></div></body></html>";		
		return $txt;		
	}
	function sendPregunta($destinatario,$link, $pregunta){
		 $destinatario=EMAIL;die("seeeeee".$destinatario);
			$link_detalle=array_key_exists("detalle", $link)?$link["detalle"]:'';
			$link_pregunta=array_key_exists("pregunta", $link)?$link["pregunta"]:'';
			
			$contenido = "<div style='text-align:left; margin-left:10px; 	font-size: 18px; '>
		               <p><b>Hola</b></p>
		               <p>Tienes una pregunta de la siguiente publicaci&oacute;n</p>
		               <p><a href='$link_detalle' style='text-decoration:none;'>$link_detalle</a></p>
		               <p>$pregunta</p>
		            </div>
		            <br>		
		            <div style='text-align:left; padding-bottom:10px; border-bottom: 1px solid #ccc;cursor: pointer;' >
		               <a href='$link_pregunta' style='text-decoration:none;cursor: pointer;'>
		               <button style='background:".COLOR_BTN.";
		 					text-align:center;  color:#FFF; padding:10px; margin:10px; border: 1px solid ".COLOR_BORD_BTN."; cursor: pointer; font-size: 18px;'>Responder</button>
		               </a> </div> 	";
			
			$html=$this->Header().$contenido.$this->Footer();
	 
			$this->sendEmail($destinatario,$html);			 
		 		
	}
	function sendRespuesta($destinatario,$link,$respuesta){
		 
			$link_detalle=array_key_exists("detalle", $link)?$link["detalle"]:'';
			$link_respuesta=array_key_exists("respuesta", $link)?$link["respuesta"]:'';
			
			$contenido = "<div style='text-align:left; margin-left:10px; 	font-size: 18px; '>
		               <p><b>Hola</b></p>
		               <p>Te respondieron una pregunta sobre la siguiente publicaci&oacute;n</p>
		               <p><a href='$link_detalle' style='text-decoration:none;'>$link_detalle</a></p>
		               <p>$respuesta</p>
		            </div>
		            <br>		
		            <div style='text-align:left; padding-bottom:10px; border-bottom: 1px solid #ccc;cursor: pointer;' >
		               <a href='$link_respuesta' style='text-decoration:none;cursor: pointer;'>
		               <button style='background:".COLOR_BTN.";
		 					text-align:center;  color:#FFF; padding:10px; margin:10px; border: 1px solid ".COLOR_BORD_BTN."; cursor: pointer; font-size: 18px;'>Hacer otra pregunta</button>
		               </a>
		              </div>      
		               ";		
			$html=$this->Header().$contenido.$this->Footer();
	 
			$this->sendEmail($destinatario,$html);
		 		
	}
	function sendContacto($nombre,$mensaje,$remitente,$destinatario){
		$txt = " Te han contactado, ".$mensaje."
		<br>
		<br>
		nombre: ".$nombre."
		<br>
		remitente: ".$remitente."
		 ";	
		 
		$txt=$this->Header().$txt.$this->Footer();
		$this->sendEmail($destinatario, $txt);
	}
	
}
