<?php
require_once "core/BaseDatos.php";
require_once "Entities/admin.php";

class AdminModel extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    
	/* listar registros*/
	public function listar($tabla){
		$sql = "select * from $tabla";
		$sentencia = $this->conexion->prepare($sql);
		$sentencia->execute();
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;
	}


	public function agregar_admin($cNombre, $cClave, $lestado){
		$query_save = "Insert into tadmin(cNombre,cClave,lestado) value(:cNombre,:cClave, :lestado)";
        $guardar = $this->conexion->prepare($query_save);
        $guardar->bindParam(':cNombre', $datos['cNombre']);
        $guardar->bindParam(':cClave', $datos['cClave']);
        $guardar->bindParam(':lestado', $datos['lestado']);
        $guardar->execute();
        $result = $this->conexion->lastInsertId();
        $guardar->closeCursor();
        return $result;
	}
	/* seleccionar un registro que segun condicion */
	public function editar($tabla, $campo, $dato){
		$arreglo = array('campo' => $dato);
		$sql = "select * from $tabla where $campo = :campo";
		$sentencia = $this->conexion->prepare($sql);
		$sentencia->execute($arreglo);
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;
	}

	/* registro de datos*/
	public function guardar($tabla, $datos){
		$rows   = 0;
		$campos = "";
		$pines = "";
		$contador = count($datos);
		foreach ($datos as $campo => $value) {
			$campos .= "$campo";
			$pines .= ":$campo";
			$rows++;
			if ($rows < $contador) {
				$campos .= ",";
				$pines .= ",";
			}
		}
		$query_save = "Insert into $tabla($campos) value($pines)";
		$guardar = $this->conexion->prepare($query_save);
		foreach ($datos as $campo => $value) {
			$guardar->bindParam(':campo', $value);
		}
		$guardar->execute($datos);
		$result = $this->conexion->lastInsertId();
		$guardar->closeCursor();
		return $result;
	}


	/* actualizar registro */
	public function actualizar($parametros, $datos){
		$tabla = $parametros['tabla'];
		$campo = $parametros['campo'];
		$id = $parametros['id'];
		foreach ($datos as $campos => $var) {
			$query_modify = "update $tabla set $campos = :$campos where $campo = :id";
			$editar = $this->conexion->prepare($query_modify);
			$temporal = array("$campos" => $var, 'id' => $id);
			$editar->execute($temporal);
		}
		$result = 1;
		$editar->closeCursor();
		return $result;
	}
	/* elimin ar*/
	
	public function eliminar($tabla,$campo,$id){
		$query_delete="delete from $tabla where $campo = :id";
		$eliminar=$this->conexion->prepare($query_delete);			
		$eliminar->execute(array('id'=>$id));				
		$result =1; // Exitoso
		$eliminar->closeCursor();
		return $result;	
	}			

}    