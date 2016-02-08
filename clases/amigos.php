<?php
include_once 'bd.php';
class amigos {
	// Amigos (f)
	protected $table = "usuarios_amigos";
	protected $table_fav = "usuarios_favoritos";
	private $fecha;
	private $usuarios_id;
	private $amigos_id;
	private $result;
	
	public function contarMeGustan($id){
		$bd = new bd();
		$sql = $bd->query("SELECT COUNT(*) total FROM {$this->table} WHERE usuarios_id = $id "); 
		if($sql->rowCount()>0){
			$row = $sql->fetch();			
			return $row["total"];
		}else{
			return 0;
		}		
	}
	public function yamegusta($useract,$userper){
		$bd = new bd();
		$sql = $bd->query("SELECT * FROM {$this->table} WHERE usuarios_id =$useract AND amigos_id = $userper");
		if($sql->rowCount()>0){			
			return true;
		}else{
			return false;
		}		
	}
	public function borrarFavorito($favoritos_id,$usuarios_id){
		$bd = new bd();
		$sql = $bd->query("DELETE FROM usuarios_favoritos WHERE usuarios_id = $usuarios_id AND favoritos_id = $favoritos_id");
		if($sql->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}
	public function borrarSeguidor($amigos_id , $usuarios_id){  
		$bd = new bd();
		$sql = $bd->query("DELETE FROM usuarios_amigos WHERE usuarios_id = $usuarios_id AND amigos_id = $amigos_id");
		if($sql->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}
	
	public function buscarAmigos($id,$tipo = NULL, $busqueda = NULL) {
		$bd = new bd ();
		$querynatural = "SELECT ua.usuarios_id numero, seudonimo, CONCAT(nombre,' ', apellido) nombre, email, telefono, estados_id estado
						  FROM usuarios_naturales un, usuarios_accesos ua, usuarios u 
						  WHERE u.id = un.usuarios_id AND u.id = ua.usuarios_id ";
		$queryjuridico = "SELECT ua.usuarios_id numero, seudonimo, razon_social nombre, email, telefono, estados_id estado 
						  FROM usuarios_juridicos uj, usuarios_accesos ua, usuarios u  
						  WHERE  u.id = uj.usuarios_id AND u.id = ua.usuarios_id ";
		$estado = "";
		$union = "";
		$search = "";
		if(!is_null($tipo)){
			if($tipo == "jur"){
				$querynatural = "";
			} elseif($tipo == "nat"){
				$queryjuridico = "";
			} elseif($tipo == "all"){
				$union = " UNION ALL ";
			} elseif(is_numeric($tipo)){
				$estado = " AND estado = $tipo ";
				$union = " UNION ALL ";
			}
		}else{
			$union = " UNION ALL ";
		}
		
		if(!empty($busqueda)){
			$search = " AND (nombre LIKE '%$busqueda%' OR seudonimo LIKE '%$busqueda%')";
		}
		$statement = "SELECT numero, seudonimo, nombre, telefono, email, estado 
					  FROM ($querynatural
						  $union
						  $queryjuridico) tabla, usuarios_amigos 
					  WHERE amigos_id = numero $estado $search AND usuarios_id = ?";
		try {
			$sql = $bd->prepare ( $statement );
			$sql->execute ( array (
					$id 
			) );
			if($sql->rowCount()>0){
				return $sql->fetchAll ();
			}else{
				return false;
			}			 
		} catch ( PDOException $ex ) {
			return $bd->showError ( $ex );
		}
	}
	public function nuevoAmigo($fecha, $usuarios_id, $amigos_id) {
		$bd = new bd ();
		$bd->doInsert ( $this->table, array (
				"fecha" => $fecha,
				"usuarios_id" => $usuarios_id,
				"amigos_id" => $amigos_id 
		) );
	}
	public function nuevoFavorito($fecha, $usuarios_id, $favoritos_id) {
		$bd = new bd ();
		$bd->doInsert ( $this->table_fav, array (
				"fecha" => $fecha,
				"usuarios_id" => $usuarios_id,
				"favoritos_id" => $favoritos_id
		) );
	}
	
	public function nuevoSeguidor($fecha, $amigos_id, $usuarios_id) {
		$bd = new bd ();
		$bd->doInsert ( $this->table, array (
				"fecha" => $fecha,
				"usuarios_id" => $usuarios_id,
				"amigos_id" => $amigos_id
		) );
	}
}
