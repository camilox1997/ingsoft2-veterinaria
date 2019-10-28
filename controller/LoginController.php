<?php
class LoginController extends ControladorBase{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("login", array(
            "Hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function acceder(){
        $usuario=new Usuario();
        $allusers=$usuario->getAllUsers();


        $username=$_POST["username"];
        $password=$_POST["password"];
        

        var_dump($usuario->getAllUsers());
        foreach($allusers as $user){
            if($user->username==$username)if($user->pass==$password){
                $validateuser=array("username" => $username, "tipo" => $user->tipo);
            }
        }

        if($validateuser["tipo"] == "admin"){
            
            echo '<script>alert("administrador")</script>';
            
        }


    }

}
?>