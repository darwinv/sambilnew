<?php

$_POST["categoria"]
$_POST["condicion"]
$_POST["estado"]
$_POST["orden"]
$_POST["palabra"]
$_POST["ver_tiendas"]
$_POST["pagina"]
 
		 
		$consulta="select publicaciones.id as id,'P' as tipo from publicaciones
					Inner Join usuarios ON publicaciones.usuarios_id = usuarios.id
 					where publicaciones.id in (select publicaciones_id from publicacionesxstatus where status_publicaciones_id=1 and fecha_fin is null)";
		
		$consulta.=" and usuarios.id_sede=$id_sede";
		$soloPub=false;
		if($_POST["categoria"]!=""){
			$criterio="I{$_POST["categoria"]}F";
			$consulta.=" and clasificados_id in (select id from clasificados where ruta like '%$criterio%')";
			$soloPub=true;
		}
		if($_POST["condicion"]){
			$consulta.=" and condiciones_publicaciones_id = {$_POST["condicion"]}";
			$soloPub=true;
		}
		if($_POST["estado"]!=""){
			$consulta.=" and usuarios_id in (select id from usuarios where estados_id={$_POST["estado"]})";
		}
		if($_POST["estado"]!=""){
			$consulta.=" and usuarios_id in (select id from usuarios where estados_id={$_POST["estado"]})";
		}
		
		
		switch($_POST["orden"]){
			case "id_asc":
				$orden="order by id asc";
				break;
			case "id_desc":
				$orden="order by id desc";
				break;
			case "monto_asc":
				$orden="order by monto asc";
				break;
			case "monto_desc":
				$orden="order by monto desc";
				break;
		}
		
		if($_POST["palabra"]!=""){
			$consulta.=" and titulo like '%{$_POST["palabra"]}%'";
			if(!$soloPub){ //Incluir usuarios			
				$criterioPal1=explode(" ",$_POST["palabra"]);
				$criterioPal2="(";
				$criterioPal3="(";
				foreach ($criterioPal1 as $c=>$valor) {
					$criterioPal2.="nombre like '%$valor%' or apellido like '%$valor%' or ";
					$criterioPal3.="razon_social like '%$valor%' or ";			
				}
				$criterioPal2=substr($criterioPal2,0,strlen($criterioPal2)-4) . ")";
				$criterioPal3=substr($criterioPal3,0,strlen($criterioPal3)-4) . ")";
				
			}
		}else if(!empty($_POST["ver_tiendas"])){
			//$criterioPal2="";
			$criterioPal3="";
		}
		
		if($_POST["palabra"]!="" || !empty($_POST["ver_tiendas"])){
			//$consultaNat="select usuarios_id as id,'U' as tipo from usuarios_naturales where $criterioPal2";
			//  $consultaNat="select usuarios_id as id,'U' as tipo FROM usuarios_naturales
			//				Inner Join usuarios ON usuarios_naturales.usuarios_id = usuarios.id
			//				WHERE
			//				($criterioPal2) AND	usuarios.id_sede =  '$id_sede'";
			$consultaNat="";
					
			//$consultaJur="select usuarios_id as id,'U' as tipo from usuarios_juridicos where $criterioPal3";
			
			  $consultaJur="SELECT usuarios_id AS id,'U' AS tipo FROM usuarios_juridicos
			  				Inner Join usuarios ON usuarios.id = usuarios_juridicos.usuarios_id
							WHERE
							($criterioPal3) AND	usuarios.id_sede =  '$id_sede'";
							
			$consulta="($consultaNat) UNION ($consultaJur) UNION ($consulta)";
		}


		$inicio=($_POST["pagina"] - 1) * 25;
		$consulta.=" $orden limit 25 OFFSET $inicio";
		
		/*******************************************************/
	 		 
		$result=$bd->query($consulta);
		