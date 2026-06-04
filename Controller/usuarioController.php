<?php
require_once 'Entities/usuario.php';
require_once "Model/usuarioModel.php";

class usuarioController{

    private $model_usuario;

    public function __construct(){
        $this->model_usuario = new usuarioModel();
    }

    public function lista(){
        $lista = $this->model_usuario->listar("tusuario");
        require_once "View/Usuario/usuario.php";

    }
    
    //Para ver la vista del usuario nuevo que se va a agregar
    public function nuevo(){
        require_once "View/Usuario/nuevo.php";
    }

    //Para ver la vista de editar un usuario
    public function editar(){
        $id = trim($_GET['id']);
        if(empty($id)){    
            $detalle = false;
        }else{
            $detalle = $this->model_usuario->editar('tusuario','nUsuario_id',$id);
        }
        require_once "View/Usuario/editar.php";
    }

    public function actualizar(){
        $editar = new UsuarioModel();
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

    //Esto es para agregar un nuevo usuario (lo tomé del archivo de agregar.php del mono)
    public function agregar(){

        $guardar = new UsuarioModel();
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
        $eliminar = new UsuarioModel();
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