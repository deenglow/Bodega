<?php
require_once 'config/global.php';

if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}


function cargarControlador($controller){

    switch ($controller) {
        case 'bodegas':
            $strFileController='controller/BodegasController.php';
            require_once $strFileController;
            $controllerObj=new BodegasController();
            break;
        
        case 'vinos':
            $strFileController='controller/VinosController.php';
            require_once $strFileController;
            $controllerObj=new VinosController();
            break;
        
        default:
            $strFileController='controller/BodegasController.php';
            require_once $strFileController;
            $controllerObj=new BodegasController();
            break; 
    }
    return $controllerObj;
}

function lanzarAccion($controllerObj){
    if(isset($_GET["action"])){
        $controllerObj->run($_GET["action"]);
    }else{
        $controllerObj->run(ACCION_DEFECTO);
    }
}