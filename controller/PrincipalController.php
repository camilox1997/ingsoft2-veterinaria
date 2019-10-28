<?php
class PrincipalController extends ControladorBase{
    
    public function index(){
        $this->view("index", array(
            "Hola"=>"Clinica veterinaria como reyes",
        ));
    }
}
?>