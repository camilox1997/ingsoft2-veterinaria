<?php
class ControladorBase{
    public function __construct(){
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';

        foreach (glob("model/*.php") as $file){
            require_once $file;
        }
    }

    public function view($vista, $datos){
        foreach($datos as $id_assoc => $value){
            ${$id_assoc}=$value;
        }

        require_once 'AyudaVistas.php';
        $helper=new AyudaVistas();

        require_once 'view/'.$vista.'View.php';
    }

    public function redirect($controlador=CONTROLADOR_DEFECTO, $accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
}
?>