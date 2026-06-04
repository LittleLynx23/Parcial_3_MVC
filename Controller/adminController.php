<?php
require_once 'Entities/admin.php';
require_once "Model/adminModel.php";

class adminController{

    private $model_admin;

    public function __construct(){
        $this->model_admin = new adminModel();
    }

    public function lista(){
        $lista = $this->model_admin->listar("tadmin");
        require_once "View/Admin/admin.php";

    }

    public function nuevo(){
        require_once "View/Admin/nuevo.php";
    }

    public function editar(){
        $id = trim($_GET['id']);
        if(empty($id)){    
            $detalle = false;
        }else{
            $detalle = $this->model_admin->editar('tadmin','nAdmin_id',$id);
        }
        require_once "View/Admin/editar.php";
    }

    //Esto es para agregar un nuevo admin
    public function agregar(){

        $guardar = new AdminModel();
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


    public function eliminar(){
        $eliminar = new AdminModel();
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