<?php
require_once 'Entities/autor.php';
require_once "Model/autorModel.php";

class autorController{

    private $model_autor;

    public function __construct(){
        $this->model_autor = new autorModel();
    }

    public function lista(){
        $lista = $this->model_autor->listar("tautor");
        require_once "View/Autor/autor.php";

    }
    
    //Para ver la vista del admin nuevo que se va a agregar
    public function nuevo(){
        require_once "View/Autor/nuevo.php";
    }

    //Para ver la vista de editar un admin
    public function editar(){
        $id = trim($_GET['id']);
        if(empty($id)){    
            $detalle = false;
        }else{
            $detalle = $this->model_autor->editar('tautor','nAutor_id',$id);
        }
        require_once "View/Autor/editar.php";
    }

    public function actualizar(){
        $editar = new AutorModel();
        $datos = $_POST["datos"];
        $id = $_POST["id"];
        $tabla = $_POST["tabla"];
        $campo = $_POST["campo"];
        $parametros = array('tabla'=> $tabla, 'campo' => $campo,'id'=>$id);
        $admin = $editar->modificar($parametros, $datos);
        if($admin) {
            $msg['msg'] = 'Datos actualizados correctamente';
            $msg['tipo'] = "success";
            $msg['titulo'] = "Exito";    
        } else {
            $msg['msg'] = "Error al actualizar los datos. Por favor, intente nuevamente.";
            $msg['tipo'] = "danger";
            $msg['titulo'] = "Alerta";    
        }
        echo json_encode($msg);
    }

    //Esto es para agregar un nuevo admin (lo tomé del archivo de agregar.php del mono)
    public function agregar(){

        $guardar = new AutorModel();
        $datos = $_POST["datos"];
        $tabla = $_POST["tabla"];
        $save = $guardar->guardar($tabla, $datos);
        if($save) {
            $msg['msg'] = 'Datos guardados correctamente';
            $msg['tipo'] = "success";
            $msg['titulo'] = "Exito";    
        } else {
            $msg['msg'] = "Error al guardar los datos. Por favor, intente nuevamente.";
            $msg['tipo'] = "danger";
            $msg['titulo'] = "Alerta";    
        }
        echo json_encode($msg);
    }

    //Esto lo tomé de eliminar.php del mono que es para eliminar desde la lista
    public function eliminar(){
        $eliminar = new AutorModel();
        $id = $_POST["id"];
        $tabla = $_POST["tabla"];
        $campo = $_POST["campo"];
        $admin = $eliminar->eliminar($tabla,$campo,$id);
        if($admin) {
            $msg['msg'] = 'Datos Eliminados correctamente';
            $msg['tipo'] = "success";
            $msg['titulo'] = "Exito";    
        } else {
            $msg['msg'] = "Error al eliminar los datos del estudiante. Por favor, intente nuevamente.";
            $msg['tipo'] = "danger";
            $msg['titulo'] = "Alerta";    
        }
        echo json_encode($msg);
        
    }






}