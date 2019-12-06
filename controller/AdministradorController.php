<?php
class AdministradorController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("admin" , array(
            "hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function getUsers(){
        $usuario=new Usuario();
        $allusers=$usuario->getAllUsers();

        $this->view("adminusergestion", array(
            "allusers"=>$allusers,
            "Hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function exiteUsuario(){
        if(isset($_POST["identificacion"])){
            $objectValidation = new Usuario();    
            if($objectValidation->getByIdentified($_POST["identificacion"]) != null){
                $response = true;
            } else {
                $response = false;
            }
        } else $response = false;
        return $response;
    }

    public function crear(){
        if(isset($_POST["identificacion"]) && $this->exiteUsuario()==false){
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


            if($update->rowCount() > 0){
                $this->redirect("Administrador", "getUsers");
            } else {
                $this->redirect("Administrador", "index");
            }
        } else {
            $this->redirect("Administrador","crearIndex&confirm=not");
        }
    }

    public function crearIndex(){
        $this->view("adminusergestionregister", array(
            "Hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function editar(){
        if(isset($_GET["id"])){
            $usuario=new Usuario();
            
            $identificacion = $_GET["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            $tipo = $_POST["tipo"];

            $usuario->setIdentificacion($identificacion);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setDireccion($direccion);
            $usuario->setTelefono($telefono);
            $usuario->setUserName($username);
            $usuario->setPass($pass);
            $usuario->setTipo($tipo);

            $update = $usuario->update();

            if($update->rowCount() > 0 ){
                $this->redirect("Administrador", "getUsers");
            } else {
                $this->redirect("Administrador", "index");
            }
        }
    }

    public function editarIndex(){
        if(isset($_GET["id"])){
            $usuario = new Usuario();
            $useredit=$usuario->getByIdentified($_GET["id"]);

            $this->view("adminusergestionedit", array(
                "useredit"=>$useredit,
                "Hola"=>"Clinica veterinaria como reyes"
            ));
        }
    }

    public function borrar(){
        if(isset($_GET["id"])){
            $identificacion = $_GET["id"];

            $usuario = new Usuario();
            $delete = $usuario->deleteByIdentified($identificacion);

            if ($delete->rowCount() > 0){
                $this->redirect("Administrador", "getUsers");
            } else {
                $this->redirect("Administrador", "index");
            }
        }else {
            $this->redirect("Administrador", "getUsers");
        }
        
    }
}
?>