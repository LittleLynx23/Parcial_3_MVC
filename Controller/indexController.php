<?php
require_once "Model/AdminModel.php";
class IndexController{

    private $model_admin;

    public function __construct(){
        $this->model_admin = new AdminModel();
    }

    public function inicio(){
        $listado = $this->model_admin->findAll();
        require_once "View/index.php";

    }

}