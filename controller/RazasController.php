<?php
class RazasController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $raza=new Raza();
        $allraza=$raza->getAll();
        $raz=$raza->getAllPagination(0);
        $this->view("adminrazagestion", array(
            "allraza"=>$allraza,
            "raza"=>$raz
        ));
    }

    public function getRazaPagination(){
        $raza=new Raza();
        $allraza=$raza->getAll();
        $razas=$raza->getAllPagination($_GET['page']);
        $this->view("adminrazagestion", array(
            "allraza"=>$allraza,
            "raza"=>$razas
        ));
    }

    public function getRazaConsultPagination(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $columna = "nombre";
            $raza=new Raza();
            $razas=$raza->getBy($columna,$_POST['search']);
            $this->view("adminrazagestion", array(
                "allraza"=>$razas,
                "raza"=>$razas
            ));
        } else {
            $this->index();
        }
    }

    public function validationRegisterForm(){
        if(isset($_POST['nombre']) && isset($_POST['tipo_mascota'])){
            if(empty($_POST['nombre']) && empty($_POST['tipo_mascota'])){
                $this->redirect("Razas","index&validation=errorall");
            }
            else if(empty($_POST['nombre'])) $this->redirect("Razas","index&validation=errorname");
            else if(empty($_POST['tipo_mascota'])) $this->redirect("Razas","index&validation=errortipe_race");
            return true;
        }
        return false;
    }

    public function crear(){
        if(isset($_POST["nombre"])){
            if($this->validationRegisterForm()){
                $raza=new Raza();
                $nombre = $_POST["nombre"];
                $tipoMascota = $_POST["tipo_mascota"];
                $raza->setId(0);
                $raza->setNombre($nombre);
                $raza->setTipoMascota($tipoMascota);
                $save = $raza->save();
                if($save->rowCount() > 0){
                    $this->redirect("Razas", "index");
                } else {
                    $this->redirect("Administrador", "index");
                }
            }  else {
                $this->redirect("Razas","crearIndex&confirm=not");
            }  
        }
            
    }

    public function crearIndex(){
        $this->view("adminrazagestionregister", array(
            "Hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function editar(){
        if(isset($_GET["id"])){
            $raza=new Raza();
            
            $id = $_GET["id"];
            $nombre = $_POST["nombre"];
            $tipoMascota = $_POST["tipo_mascota"];

            $raza->setId($id);
            $raza->setNombre($nombre);
            $raza->setTipoMascota($tipoMascota);
            $update = $raza->update();

            if($update->rowCount() > 0 ){
                $this->redirect("Razas", "index");
            } else {
                $this->redirect("Administrador", "index");
            }
        }
    }

    public function editarIndex(){
        if(isset($_GET["id"])){
            $raza = new Raza();
            $razaedit=$raza->getById($_GET["id"]);

            $this->view("adminrazagestionedit", array(
                "razaedit"=>$razaedit,
                "Hola"=>"Clinica veterinaria como reyes"
            ));
        }
    }

    public function borrar(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $raza = new Raza();
            $delete = $raza->deleteById($id);

            if ($delete->rowCount() > 0){
                $this->redirect("Razas", "index");
            } else {
                $this->redirect("Administrador", "index");
            }
        }else {
            $this->redirect("Razas", "index");
        }   
    }
}
?>