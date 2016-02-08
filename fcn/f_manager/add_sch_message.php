<?php
	require_once("../../clases/bd.php");
	require_once("../../clases/manager/autoload.php");
	use OneAManager\Handler_Soat;
	use OneAManager\Handler_Message;
	date_default_timezone_set('UTC');
	
	function makeTimes($fields){
		$time=time();
		$time_start=strtotime($fields['time_start']." ".$fields['hour'],$time);
		$time_end=strtotime($fields['time_end']." ".$fields['hour'],$time);
		if($time_start>$time_end){
			return 6;
		}
		if($time>$time_end){
			return 7;
		}
		$fields['time_start']=strtotime($fields['time_start'],$time);
		$fields['time_end']=strtotime($fields['time_start']." ".$fields['hour'].":59",$time);
		return $fields;
	}
	
	function cleanMessage($message, $max_chars, $userid){
		$message = trim($message);
		$message = str_replace(array("<",">"),array("&lt;","&gt;"),$message);
		$chars=$max_chars;
		$links=Handler_Message::$LINKSRX;
		$texto=$message;
		if($num=preg_match_all($links,$texto,$matches,PREG_SET_ORDER)>0){
			$chars=$chars-(23*$num);
			$texto=preg_replace($links,"",$texto);
		}
		$chars=$chars-strlen($texto);
		if($chars>($max_chars-10)){
			//mensaje muy corto
			return 4;
		}else if($chars<0){
			//mensaje muy cargo
			return 5;
		}else if(count($matches)>0){
			$new_urls=array();
			$old_urls=array();
			$soat=array("abid"=>$userid,"absid"=>0);
			foreach($matches as $match){
				if(preg_match_all("/(https?:\/\/1so\.at\/[A-Za-z0-9ñÑ_\-]+)/",$match[0])==0){
					$old_urls[]="/".str_replace("/","\/",preg_quote($match[0]))."/";
					$soat['u']="".$match[0];
					$new="http://1so.at/".$hso->encode($soat);
					$new_urls[]=$new!=''?$new:$match[0];}
			}
			$message=preg_replace($old_urls,$new_urls,$message);
		}
		return $message;
	}
	
	session_start();
	$hdb=new bd();
	$userid=$_SESSION["id"];
	$table="manager_messages_scheduled";
	$sql="SELECT * FROM $table userid=".$hdb->quote($userid);
	if($res=$hdb->query($sql)){
		if($res->rowCount()<11){
		
			if($_POST['publish_tw']==1)
				$max_chars=140;
			else
				$max_chars=2000;
		
			$message = cleanMessage($_POST['message'], $max_charts);
			if(!is_numeric($message) || $message>5){
				$fields=array(
					'userid' => $userid,
					'message' => $message,
					'time_start' => $_POST['time_start'],
					'time_end' => $_POST['time_end'],
					'days' => $_POST['days'],
					'hour' => $_POST['hour'],
					'publish_fb' => $_POST['publish_fb'],
					'publish_tw' => $_POST['publish_tw'],
					'publish_fbp' => $_POST['publish_fbp'],
					'publish_group' => $_POST['publish_group'],
				);
				if(is_array(($fields=makeTimes($fields)))){
					if($hdb->doInsert($table,$fields)){
						$return=array("e"=>0);
					}else $return=array("e"=>2);
				}else{
					$return=array("e"=>$fields);
				}
			}else{
				$return=array("e"=>$message);
			}
		}else{
			$return=array("e"=>1);
		}
	}else{
		$return=array("e"=>3);
	}
	echo json_encode($return);



?>