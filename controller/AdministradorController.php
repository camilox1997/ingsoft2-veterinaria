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
        $users=$usuario->getUsersPagination(0);
        $this->view("adminusergestion", array(
            "allusers"=>$allusers,
            "users"=>$users
        ));
    }

    public function getUserPagination(){
        $usuario=new Usuario();
        $allusers=$usuario->getAllUsers();
        $users=$usuario->getUsersPagination($_GET['page']);
        $this->view("adminusergestion", array(
            "allusers"=>$allusers,
            "users"=>$users
        ));
    }

    public function crear(){
        if(isset($_POST["identificacion"])){
            $usuario=new Usuario();
            if(count($usuario->getByIdentified($_POST["identificacion"])) == 0){

                $identificacion = $_POST["identificacion"];
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $direccion = $_POST["direccion"];
                $telefono = $_POST["telefono"];
                $usuername = $_POST["username"];
                $pass = $_POST["pass"];
                if($_POST["tipo"] == "lx") $tipo = "cliente";
                $usuario->setIdentificacion($identificacion);
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setDireccion($direccion);
                $usuario->setTelefono($telefono);
                $usuario->setUserName($usuername);
                $usuario->setPass($pass);
                $usuario->setTipo($tipo);
                $save = $usuario->save();

                if($save->rowCount() > 0){
                    $this->redirect("Administrador", "getUsers");
                } else {
                    $this->redirect("Administrador", "index");
                }
            }  else {
                $this->redirect("Administrador","crearIndex&confirm=not");
            }
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