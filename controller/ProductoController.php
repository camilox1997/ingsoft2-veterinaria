<?php
class ProductoController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("adminproductogestion" , array(
            "hola"=>"Clinica veterinaria como reyes"
        ));
    }

    public function getProductos(){
        $producto=new Producto();
        $allproduct=$producto->getAll();
        $product=$producto->getAllPagination(0);
        $this->view("adminproductogestion", array(
            "allproduct"=>$allproduct,
            "product"=>$product
        ));
    }

    public function getProductosPagination(){
        $producto=new Producto();
        $allproduct=$producto->getAll();
        $product=$producto->getAllPagination($_GET['page']);
        $this->view("adminproductogestion", array(
            "allproduct"=>$allproduct,
            "product"=>$product
        ));
    }

    public function getProductosConsultPagination(){
        if(isset($_POST['search']) && $_POST['search'] != ''){
            $columna = "id";
            $producto=new Producto();
            $product=$producto->getBy($columna,$_POST['search']);
            $this->view("adminproductogestion", array(
                "allproduct"=>$product,
                "product"=>$product
            ));
        } else {
            $this->getProductos();
        }
    }

    public function crear(){
        if(isset($_POST["nombre_producto"]) && !empty($_POST["nombre_producto"]) ){
            $producto=new Producto();
            $nombre_producto = $_POST["nombre_producto"];
            $tipo_producto = $_POST["tipo_producto"];
            $precio_producto = $_POST["precio_producto"];
            $producto->setId(0);
            $producto->setNombreProducto($nombre_producto);
            $producto->setTipoProducto($tipo_producto);
            $producto->setPrecioProducto($precio_producto);
            $save = $producto->save();
            if($save->rowCount() > 0){
                $this->redirect("Producto", "getProductos&confirm=yesregister");
            } else {
                $this->redirect("Administrador", "index");
            }  
        } else {
            $this->redirect("Producto","getProductos&validation=not");
        }
    }

    public function registrarIndex(){
        $this->view("adminproductogestionregister", array(
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