<?php
class MascotaController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("adminmascotagestion" , array(
            "hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function getMascotas(){
        $mascota=new Mascota();
        $allmascot=$mascota->getAll();
        $pets=$mascota->getMascotasPagination(0);
        $this->view("adminmascotagestion", array(
            "allmascot"=>$allmascot,
            "pets"=>$pets
        ));
    }

    public function getMascotaPagination(){
        $mascota=new Mascota();
        $allmascot=$mascota->getAll();
        $pets=$mascota->getMascotasPagination($_GET['page']);
        $this->view("adminmascotagestion", array(
            "allmascot"=>$allmascot,
            "pets"=>$pets
        ));
    }

    public function getMascotaConsultPagination(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $columna = "nombre";
            $mascota=new Mascota();
            $pets=$mascota->getBy($columna,$_POST['search']);
            $this->view("adminusergestion", array(
                "allusers"=>$pets,
                "users"=>$pets
            ));
        } else {
            $this->getMascotas();
        }
    }

    function CalculaEdad( $fecha ) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }

    public function crear(){
        if(isset($_GET["identificacion_propietario"])){
            $mascota=new Mascota();
            $identificacion = $_GET["identificacion_propietario"];
            $nombre = $_POST["nombre_mascota"];
            $raza = $_GET["idraza"];
            $sexo = $_POST["sexo"];
            $peso = $_POST["peso"];
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
            $mascota->setId(0);
            $mascota->setResponsable($identificacion);
            $mascota->setNombre($nombre);
            $mascota->setId_raza($raza);
            $mascota->setSexo($sexo);
            $mascota->setPeso(floatval($peso));
            $mascota->setFecha_nacimiento($fecha_nacimiento);
            $mascota->setEdad($this->CalculaEdad($fecha_nacimiento));
            $save = $mascota->save();
            if($save->rowCount() > 0){
                $this->redirect("Mascota", "getMascotas");
            } else {
                $this->redirect("Administrador", "index");
            }  
        } else {
            $this->redirect("Administrador","getUsers&validation=not");
        }
    }

    public function registrarIndex(){
        if(isset($_GET["identificacion"])){
            $usuario = new Usuario();
            $propietario = $usuario->getByIdentified($_GET['identificacion']);
            $this->view("adminmascotagestionregister", array(
                "propietario"=>$propietario,
                "Hola"=>"Clinica veterinaria como reyes"
            ));
        }else {
            $this->view("adminmascotagestionregister", array(
                "Hola"=>"Clinica veterinaria como reyes"
            ));
        }
    }

    public function buscarRaza(){
        if(isset($_GET["condition"]) == "ok"){
            $raza=new Raza();
            $allraza=$raza->getAll();
            $raz=$raza->getAllPagination(0);
            $this->view("adminselectrazamascotagestion", array(
                "allraza"=>$allraza,
                "raza"=>$raz
            ));
        }
    }

    public function editar(){
        if(isset($_GET["id"])){
            $mascota=new Mascota();
            
            $id = $_GET["id"];
            $nombre = $_POST["nombre_mascota"];
            $sexo = $_POST["sexo"];
            $peso = $_POST["peso"];

            $mascota->setId($id);
            $mascota->setNombre($nombre);
            $mascota->setSexo($sexo);
            $mascota->setPeso($peso);

            $update = $mascota->update();

            if($update->rowCount() > 0 ){
                $this->redirect("Mascota", "getMascotas");
            } else {
                $this->redirect("Administrador", "index");
            }
        }
    }

    public function editarIndex(){
        if(isset($_GET["id"])){
            $mascota = new Mascota();
            $petsedit=$mascota->getById($_GET["id"]);

            $this->view("adminmascotagestionedit", array(
                "petsedit"=>$petsedit,
                "Hola"=>"Clinica veterinaria como reyes"
            ));
        }
    }

    public function borrar(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $mascota = new Mascota();
            $delete = $mascota->deleteById($id);

            if ($delete->rowCount() > 0){
                $this->redirect("Mascota", "getMascotas");
            } else {
                $this->redirect("Administrador", "index");
            }
        }else {
            $this->redirect("Administrador", "getMascotas");
        }
        
    }
}
?>