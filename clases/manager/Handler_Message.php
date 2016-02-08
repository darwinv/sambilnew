<?php

namespace OneAManager;

require_once dirname(__FILE__)."/../publicaciones.php";

use publicaciones;

class Handler_Message
{

	const IMGPATH = "http://apreciodepana.com/";
	const URLPATH = "http://1so.at/";
	public static $LINKSRX = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
	private $pubObject;
	private $chartLimit;
	private $pubID;
	private $message;
	private $status;
	private $url;
	private $title;
	private $picture;
	private $pictureMediaId;
	private $postTwitter;
	private $postFacebook;
	
	public function __construct($pub=array(),$isPub=true){
		if($isPub==true){
			if($pub['publicar_twitter']==1)
				$this->chartLimit = 140;
			else
				$this->chartLimit = 2000;
			$this->postTwitter = $pub['publicar_twitter'];
			$this->postFacebook = $pub['publicar_facebook'];
			$this->pubID = $pub['id'];
			$this->message = "{$pub['titulo']} {$pub['condicion']} {$pub['monto']}";
			$this->title = "APrecioDePana.com - {$pub['titulo']}";
			$this->url = static::URLPATH.$pub['short_id'];
			$this->pubObject = new publicaciones($this->pubID);
			$this->picture = static::IMGPATH.$this->pubObject->getFotoPrincipal();
			$this->status = "{$this->message} {$this->url}";
			$this->evaluateLength();
		}else{
			$this->postTwitter = $pub['publish_tw'];
			$this->postFacebook = $pub['publish_fb'];
			$this->message = $pub['message'];
			$this->pubID = $pub['userid'];
			$this->title = "APrecioDePana.com - {$pub['message']}";
			$this->status = $this->message;
			$this->picture = "";
			$this->getFirstURL();
		}
	}
	
	public function getFirstURL(){
		if($num=preg_match_all(self::$LINKSRX, $this->message, $matches,PREG_SET_ORDER)>0){
			$this->url = $matches[0][0];
		}else
			$this->url = false;
	}
	
	public function canPublishTwitter(){
		return $this->postTwitter == 1 ? true : false;
	}
	
	public function canPublishFacebook(){
		return $this->postFacebook == 1 ? true : false;
	}
	
	public function getPubId(){
		return $this->pubID;
	}
	
	public function getMessage(){
		return $this->message;
	}
	
	public function getUrl(){
		return $this->url;
	}
	
	public function getStatus(){
		return "{$this->message} {$this->url}";
	}
	
	public function getPicture(){
		if(strlen($this->picture)>strlen(static::IMGPATH))
			return $this->picture;
		else
			return false;
	}
	
	public function getPictureMediaId(){
		return $this->pictureMediaId;
	}
	
	public function setPictureMediaId($pictureMediaId){
		$this->pictureMediaId = $pictureMediaId;
	}
	
	public function setLastShare(){
		$this->pubObject->setLastShare($this->pubID,time());
	}
	
	protected function evaluateLength(){
		$left = $this->chartLimit;
		if(strlen($this->url)>strlen(static::URLPATH))
			$left=$left-23;
		if(strlen($this->picture)>strlen(static::IMGPATH))
			$left=$left-23;
		$left=$left-strlen($this->message);
		
		if($left<0)
			throw new Exception('Mensaje computado es muy largo.');
	}
	
	public function getTwitterPostBody(){
		if($this->postTwitter!=1)
			throw new Exception('Este mensaje no esta autorizado para ser publicado en Twitter.');
		$return=array("status" => $this->status);
		if($this->pictureMediaId) $return["media_ids"] = $this->pictureMediaId;
		return $return;
	}
	
	public function getFacebookPostBody(){
		if($this->postFacebook!=1)
			throw new Exception('Este mensaje no esta autorizado para ser publicado en Facebook.');
		if($this->url){
			$return=array("link"=>$this->url, "name"=>$this->title, "caption"=>$this->message);
			if($this->picture) $return["picture"] = $this->picture;}
		else
			$return=array("message"=>$this->message);
		return $return;
	}
	

	
}


?>