<?php
class UsuarioController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $usuario=new Usuario();
        $allusers=$usuario->getAllUsers();

        $this->view("index", array(
            "allusers"=>$allusers,
            "Hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function crear(){
        if(isset($_POST["identificacion"])){
            $usuario=new Usuario();
            
            $identificacion = $_POST["identificacion"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $usuername = $_POST["username"];
            $pass = sha1($_POST["pass"]);
            $tipo = $_POST["tipo"];

            $usuario->setIdentificacion($identificacion);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setDireccion($direccion);
            $usuario->setTelefono($telefono);
            $usuario->setUserName($usuername);
            $usuario->setPass($pass);
            $usuario->setTipo($tipo);

            $save = $usuario->save();
        }

        $this->redirect("Usuario","index");
    }

    public function borrar(){
        if(isset($_GET["identificacion"])){
            $identificacion = long2ip($_GET["identificacion"]);

            $usuario = new Usuario();
            $usuario->deleteByIdentified($identificacion);

            $this->redirect();
        }
    }
}
?>