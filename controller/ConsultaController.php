<?php
class ConsultaController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("adminconsultagestion" , array(
            "hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function getConsultas(){
        $consulta=new Consulta();
        $allconsulta=$consulta->getAllConsult();
        $consult=$consulta->getConsultSimplePagination(0);
        $this->view("adminconsultagestion", array(
            "allconsulta"=>$allconsulta,
            "consulta"=>$consult
        ));
    }

    public function getConsultaPagination(){
        $consulta=new Producto();
        $allconsulta=$consulta->getAllConsult();
        $consult=$consulta->getConsultSimplePagination($_GET['page']);
        $this->view("adminconsultagestion", array(
            "allconsulta"=>$allconsulta,
            "consulta"=>$consult
        ));
    }

    public function getConsultaConsultPagination(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $columna = "id";
            $producto=new Producto();
            $product=$producto->getBy($columna,$_POST['search']);
            $this->view("adminconsultagestion", array(
                "allproduct"=>$product,
                "product"=>$product
            ));
        } else {
            $this->getProductos();
        }
    }

    public function crear(){
        if(isset($_POST["id_mascota"]) && !empty($_POST["id_mascota"]) ){
            $consulta=new Consulta();
            $id_mascota = $_POST["id_mascota"];
            $identificacion_propietario = $_POST["identificacion_propietario"];
            $vacunacion = $_POST["vacunacion"];
            $desparacitacion = $_POST["desparacitacion"];
            $problemas_previos = $_POST["problemas_previos"];
            $alergias_conocidas = $_POST["alergias_conocidas"];
            $poblacion_suceptible = $_POST["poblacion_suceptible"];
            $otros_animales = $_POST["otros_animales"];
            $habitat = $_POST["habitat"];
            $motivo_consulta = $_POST["motivo_consulta"];
            $estado_reproductivo = $_POST["estado_reproductivo"];
            $frecuencia_enfermedades = $_POST["frecuencia_enfermedades"];
            $cirugias_anteriores = $_POST["cirugias_anteriores"];
            $tratamiento_previo = $_POST["tratamiento_previo"];
            $condicion_corporal = $_POST["condicion_corporal"];
            $pulso = $_POST["pulso"];
            $frecuencia_cardiaca = $_POST["frecuencia_cardiaca"];
            $frecuencia_respiratoria = $_POST["frecuencia_respiratoria"];
            $temperatura_rectal = $_POST["temperatura_rectal"];
            $mucosas = $_POST["mucosas"];
            $estado_mucosa = $_POST["estado_mucosa"];
            $palpitacion_rectal = $_POST["palpitacion_rectal"];
            $tratamiento_previo = $_POST["tratamiento_previo"];
            $condicion_corporal = $_POST["condicion_corporal"];
            $deshidratacion = $_POST["deshidratacion"];
            $detallex_examen_fisico = $_POST["detallex_examen_fisico"];
            $diagnostico = $_POST["diagnostico"];
            $plan_terapeutico = $_POST["plan_terapeutico"];
            $observaciones = $_POST["observaciones"];
            
            $consulta->setId(0);
            $consulta->setIdMascota($id_mascota);
            $consulta->setIdCliente($identificacion_propietario);
            $consulta->setVacunacion($vacunacion);
            $consulta->setDesparasitacion($desparacitacion);
            $consulta->setProblemasPrevios($problemas_previos);
            $consulta->setAlergiasConocidas($alergias_conocidas);
            $consulta->setPoblacionSuceptible($poblacion_suceptible );
            $consulta->setOtrosAnimales($otros_animales);
            $consulta->setHabitat($habitat);
            $consulta->setMotivoConsulta($motivo_consulta);
            $consulta->setEstadoReproductivo($estado_reproductivo);
            $consulta->setFrecuenciaEnfermedades($frecuencia_enfermedades);
            $consulta->setCirugiasAnteriores($cirugias_anteriores);
            $consulta->setTratamientoPrevio($tratamiento_previo);
            $consulta->setCondicionCorporal($condicion_corporal);
            $consulta->setPulso($pulso);
            $consulta->setFrecuenciaCardiaca($frecuencia_cardiaca);
            $consulta->setFrecuenciaRespiratoria($frecuencia_respiratoria);
            $consulta->setTemperaturaRectal($temperatura_rectal);
            $consulta->setMucosa($mucosas );
            $consulta->setEstadoMucosa($estado_mucosa);
            $consulta->setPalpitacionRectal($palpitacion_rectal);
            $consulta->setTratamientoPrevio($tratamiento_previo);
            $consulta->setCondicionCorporal($condicion_corporal);
            $consulta->setDeshidratacion($deshidratacion);
            $consulta->setDetalleExamenFisico($detallex_examen_fisico);
            $consulta->setIdDiagnostico($diagnostico);
            $consulta->setPlanTerapeutico($plan_terapeutico);
            $consulta->setObservaciones($observaciones);
             $save = $consulta->save();
            if($save->rowCount() > 0){
                $this->redirect("Consulta", "getConsultas&confirm=yesregister");
            } else {
                $this->redirect("Administrador", "index");
            }  
        } else {
            $this->redirect("Producto","getConsultas&validation=not");
        }
    }

    public function registrarIndex(){
        $diagnostico=new Diagnostico();
        $diagnostic = $diagnostico->getAll();
        $this->view("adminconsultagestionregister", array(
            "diagnostic"=>$diagnostic,
            "Hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function getProductoConsultPagination(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $columna = "id";
            $producto=new Producto();
            $product=$producto->getBy($columna,$_POST['search']);
            $this->view("adminproductogestion", array(
                "allproduct"=>$product,
                "product"=>$product
            ));
        } else {
            $producto=new Producto();
            $allproduct=$producto->getAll();
            $pagina = 0;
            if($_GET["page"] && !empty($_GET['page']))$pagina = $_GET['page'];

            $product=$producto->getAllPagination($pagina);
            $this->view("adminselectrazamascotagestion", array(
                "allproduct"=>$allproduct,
                "product"=>$product
            ));
        }
    }

    public function editar(){
        if(isset($_GET["id"])){
            $producto=new Producto();
            
            $id = $_GET["id"];
            $nombre_producto = $_POST["nombre_producto"];
            $tipo_producto = $_POST["tipo_producto"];
            $precio_producto = $_POST["precio_producto"];

            $producto->setId($id);
            $producto->setNombreProducto($nombre_producto);
            $producto->setTipoProducto($tipo_producto);
            $producto->setPrecioProducto($precio_producto);

            $update = $producto->update();

            if($update->rowCount() > 0 ){
                $this->redirect("Producto", "getProductos&confirm=yesedit");
            } else {
                $this->redirect("Administrador", "index");
            }
        }
    }

    public function editarIndex(){
        if(isset($_GET["id"])){
            $producto = new Producto();
            $productedit=$producto->getById($_GET["id"]);

            $this->view("adminproductogestionedit", array(
                "productedit"=>$productedit,
                "Hola"=>"Clinica veterinaria como reyes"
            ));
        }
    }

    public function borrar(){
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $producto = new Producto();
            $delete = $producto->deleteById($id);

            if ($delete->rowCount() > 0){
                $this->redirect("Producto", "getProductos&confirm=yesdelete");
            } else {
                $this->redirect("Administrador", "index");
            }
        }else {
            $this->redirect("Producto", "getProductos");
        }
        
    }
}
?>