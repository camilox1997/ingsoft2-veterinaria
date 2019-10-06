<?php
    require_once 'configuracion/conexion.php';
    
    if(!isset($_GET['c'])){
        require_once 'controlador/inicio.controlador.php';
        $controlador = new InicioControlador();
        call_user_func(array($controlador, 'Inicio'));
    }else {
        $controlador = $_GET['c'];
        require_once 'controlador/'.$controlador.'.controlador.php';
        $controlador = ucwords($controlador).'Controlador';
        $controlador = new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : 'Inicio';
        call_user_func(array($controlador,$accion));
    }
?>