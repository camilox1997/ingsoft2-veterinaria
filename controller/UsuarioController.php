<?php
class UsuarioController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $usuario=new Usuario();
        $allusers=$usuario->getAllUsers();

        $this->view("adminusergestion", array(
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
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $usuername = $_POST["username"];
            $pass = $_POST["pass"];
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

        if(!$update==null){
            $this->redirect("Usuario", "index");
        }
    }

    public function editar(){
        if(isset($_GET["id"])){
            $usuario=new Usuario();
            
            $identificacion = $_POST["identificacion"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];

            $usuario->setIdentificacion($identificacion);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setDireccion($direccion);
            $usuario->setTelefono($telefono);

            $update = $usuario->update();
        }

        if(!$update==null){
            $this->redirect("Usuario", "index");
        }
    }

    
    public function borrar(){
        if(isset($_GET["identificacion"])){
            $identificacion = long2ip($_GET["identificacion"]);

            $usuario = new Usuario();
            $delete = $usuario->deleteByIdentified($identificacion);

            if (!$delete==null){
                $this->redirect("Usuario", "index");
            }
        }
    }
}
?>