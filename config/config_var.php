<?php
##DEFINIMOS DIRECTORIOS Y CONEXION
$dir_index='sambilnew'; //DIRECTORIO PRINCIPAL
$domain_root='http://'.$_SERVER ['SERVER_NAME'].'/';
$server_root = '';
$cwd = getcwd();
$arrDirectoryHierarchy = explode(DIRECTORY_SEPARATOR, $cwd);
for($i=0, $limit=count($arrDirectoryHierarchy); $i<$limit; $i++){
	if($arrDirectoryHierarchy[$i]==$dir_index){
		$server_root.= $arrDirectoryHierarchy[$i].DIRECTORY_SEPARATOR;
		break;
	} else{
		$server_root.= $arrDirectoryHierarchy[$i].DIRECTORY_SEPARATOR;
	}
}	
define("SERVER_ROOT", $server_root);
define("DOMAIN_ROOT", $domain_root);
define("DB_NAME", 'sambilnew');
define("DB_USER", 'root');
define("DB_PASS", '');