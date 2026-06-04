<?php

require_once "Config/config.php";

session_start();

$url = (isset($_GET['url']) && $_GET['url'] != '')
    ? strtolower($_GET['url'])
    : 'index';

$accion = (isset($_GET['accion']) && $_GET['accion'] != '')
    ? strtolower($_GET['accion'])
    : 'inicio';

$id = (isset($_GET['id']) && $_GET['id'] != '')
    ? $_GET['id']
    : null;

$ruta = "Controller/".$url."Controller.php";

if(file_exists($ruta)){

    require_once $ruta;

    $controlador = ucfirst($url)."Controller";
    $controller = new $controlador();

    if(method_exists($controller, $accion)){

        if($id){
            $controller->$accion($id);
        }else{
            $controller->$accion();
        }

    }else{

        $error = "Accion no encontrada";
        require_once "View/Errors/404.php";

    }

}else{

    $error = "Controlador no encontrado";
    require_once "View/Errors/404.php";

}