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
        
        foreach($allusers as $user){
            if($user->username==$username)if($user->pass==$password){
                $validateuser=array("username" => $username, "tipo" => $user->tipo);
                break;
            } else {
                $validateuser = null;
            }
        }

        if($validateuser != null){
            session_start();

            $_SESSION['user'] = $validateuser;

            if($_SESSION['user']['tipo']=="admin"){
                $this->redirect("Administrador","index");
            } 
        } else {
            //falta complementos
            $this->redirect("Login", "index");
        }
    }

    public function salir(){
        session_start();

        session_unset();

        session_destroy();
        
        $this->redirect("Principal", "index");
    }

}
?>