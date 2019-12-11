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

    public function getUserConsultPagination(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $usuario=new Usuario();
            $users=$usuario->getByIdentified($_POST['search']);
            $this->view("adminusergestion", array(
                "allusers"=>$users,
                "users"=>$users
            ));
        } else {
            $this->getUsers();
        }
    }

    public function validationRegisterForm(){
        if(isset($_POST["identificacion"]) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['username']) && isset($_POST['pass'])){
            if(empty($_POST["identificacion"]) && empty($_POST['nombre']) && empty($_POST['apellido']) && empty($_POST['direccion']) && empty($_POST['telefono']) && empty($_POST['username']) && empty($_POST['pass'])){
                $this->redirect("Administrador","getUsers&validation=errorall");
            } else if(empty($_POST['identificacion'])) $this->redirect("Administrador","getUsers&validation=errorid"); 
            else if(empty($_POST['nombre'])) $this->redirect("Administrador","getUsers&validation=errorname");
            else if(empty($_POST['apellido'])) $this->redirect("Administrador","getUsers&validation=errorlastname");
            else if(empty($_POST['direccion'])) $this->redirect("Administrador","getUsers&validation=errordirec");
            else if(empty($_POST['telefono'])) $this->redirect("Administrador","getUsers&validation=errortel");
            else if(empty($_POST['username'])) $this->redirect("Administrador","getUsers&validation=errorusername");
            else if(empty($_POST['pass'])) $this->redirect("Administrador","getUsers&validation=errorpass");
            return true;
        }
        return false;
    }

    public function crear(){
        if(isset($_POST["identificacion"])){
            if($this->validationRegisterForm()){
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
                        $this->redirect("Administrador", "getUsers&confirm=yesregister");
                    } else {
                        $this->redirect("Administrador", "index");
                    }
                }  else {
                    $this->redirect("Administrador","crearIndex&confirm=not");
                }    
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

            if($update->rowCount() > 0 ) {
                $this->redirect("Administrador", "getUsers&confirm=yesedit");
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
                $this->redirect("Administrador", "getUsers&confirm=yesdelete");
            } else {
                $this->redirect("Administrador", "index");
            }
        }else {
            $this->redirect("Administrador", "getUsers");
        }
        
    }
}
?>