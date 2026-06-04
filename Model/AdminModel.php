<?php
require_once "core/BaseDatos.php";
require_once "Entities/admin.php";
class AdminModel extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    //READ
    public function findById($id){
        try{
            $sql = "select * from tAdmin where nAdmin_id = :id";				
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(':id', $id);						
            $sentencia->execute();			
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);	
            if($resultado){ 
                $admin = new Admin($resultado['nAdmin_id'],$resultado['cNombre'],$resultado['cClave'],$resultado['lestado']);             
                return $admin;
            }else{
                return null;
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }    
    public function findAll(){

        try{           
            $sql = "select * from tAdmin"; 
            $consulta =  $this->conexion->prepare($sql);
            $consulta->execute();	
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);                           
            $lista = [];
            foreach ($resultados as $resultado) {
                $admin = new Admin($resultado['nAdmin_id'],$resultado['cNombre'],$resultado['cClave'],$resultado['lestado']);                            
                $lista[] = $admin;
            }
            return $lista;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    //CREATE
    public function create(Objeto $objeto){
        try{
            $sql = "INSERT INTO tabla (campo1, campo2) VALUES (:valor1, :valor2)";
            $sentencia = $this->conexion->prepare($sql);	
            $sentencia->bindValue(':valor1', $objeto->getValor1());		
            $sentencia->bindValue(':valor2',$objeto->getValor2());	
            $sentencia->execute();
            $result = $this->conexion->lastInsertId();
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
    public function update(Objeto $objeto){
        try{
            $sql = "UPDATE tabla SET valor1 = :valor1 WHERE valorID = :id";
            $sentencia = $this->conexion->prepare($sql);	
            $sentencia->bindValue(':valor1', $objeto->getValor1);		            
            $sentencia->bindValue(':id', $estudiante->getEstudianteId());		            
            $sentencia->execute();
            return($sentencia->rowCount() > 0) ? true : false;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }     
}    