<?php
class DiagnosticoController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $diagnostico=new Diagnostico();
        $alldiagnostic=$diagnostico->getAll();
        $diagnostic=$diagnostico->getAllPagination(0);
        $this->view("admindiagnosticogestion", array(
            "alldiagnostic"=>$alldiagnostic,
            "diagnostic"=>$diagnostic
        ));
    }

    public function getDiagnosticPagination(){
        $diagnostico=new Diagnostico();
        $alldiagnostic=$diagnostico->getAll();
        $diagnostic=$diagnostico->getAllPagination($_GET['page']);
        $this->view("admindiagnosticogestion", array(
            "alldiagnostic"=>$alldiagnostic,
            "diagnostic"=>$diagnostic
        ));
    }

    public function getDiagnosticoConsultPagination(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $columna = "id";
            $diagnostico=new Diagnostico();
            $diagnostic=$diagnostico->getBy($columna,$_POST['search']);
            $this->view("admindiagnosticogestion", array(
                "alldiagnostic"=>$diagnostic,
                "diagnostic"=>$diagnostic
            ));
        } else {
            $this->index();
        }
    }

    public function validationRegisterForm(){
        if(isset($_POST['nombre_diagnostico'])){
            if(empty($_POST['nombre_diagnostico'])){
                $this->redirect("Diagnostico","index&validation=errorall");
            }
            else if(empty($_POST['nombre_diagnostico'])) $this->redirect("Diagnostico","index&validation=errorname");
            return true;
        }
        return false;
    }

    public function crear(){
        if(isset($_POST["nombre_diagnostico"])){
            if($this->validationRegisterForm()){
                $diagnostico=new Diagnostico();
                $nombre_diagnostico = $_POST["nombre_diagnostico"];
                $diagnostico->setIdDiagnostico(0);
                $diagnostico->setNombreDiagnostico($nombre_diagnostico);
                $save = $diagnostico->save();
                if($save->rowCount() > 0){
                    $this->redirect("Diagnostico", "index&confirm=yesregister");
                } else {
                    $this->redirect("Administrador", "index");
                }
            }  else {
                $this->redirect("Diagnostico","crearIndex&confirm=not");
            }  
        }
            
    }

    public function crearIndex(){
        $this->view("admindiagnosticogestionregister", array(
            "Hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function editar(){
        if(isset($_GET["id"])){
            $diagnostico=new Diagnostico();
            
            $id = $_GET["id"];
            $nombre_diagnostico = $_POST["nombre_diagnostico"];

            $diagnostico->setIdDiagnostico($id);
            $diagnostico->setNombreDiagnostico($nombre_diagnostico);
            $update = $diagnostico->update();

            if($update->rowCount() > 0 ){
                $this->redirect("Diagnostico", "index&confirm=yesedit");
            } else {
                $this->redirect("Administrador", "index");
            }
        }
    }

    public function editarIndex(){
        if(isset($_GET["id"])){
            $diagnostico = new Diagnostico();
            $diagnosticoedit=$diagnostico->getById($_GET["id"]);

            $this->view("admindiagnosticogestionedit", array(
                "diagnosticoedit"=>$diagnosticoedit,
                "Hola"=>"Clinica veterinaria como reyes"
            ));
        }
    }

    public function borrar(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $diagnostico = new Diagnostico();
            $delete = $diagnostico->deleteById($id);

            if ($delete->rowCount() > 0){
                $this->redirect("Diagnostico", "index&confirm=yesdelete");
            } else {
                $this->redirect("Administrador", "index");
            }
        }else {
            $this->redirect("Diagnostico", "index");
        }   
    }
}
?>