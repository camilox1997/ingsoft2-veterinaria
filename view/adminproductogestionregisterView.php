<?php session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']['tipo'] != "admin"){
        require_once 'core/ControladorBase.php';

        $entidad = new ControladorBase;
        $entidad->redirect("Login","index");
    } else {
?>
<html>
    <head>
        <?php require_once 'view/module/headers.php';?>
    </head>
    
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php require_once 'view/module/admin/sidemenubar.php'?>
            </div>
            <?php require_once 'view/module/product/gestion/topTitleProductGestion.php'?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Producto</li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Producto","getProductos") ?>">Lista</a></li>
                    <li class="breadcrumb-item"><a href="#">Registrar nuevo</a></li>
                </ol>
            </nav>
            <?php
                if(isset($_GET["confirm"]) && $_GET["confirm"] == "not"){
            ?>
            <script>alert("Identificacion ingresada ya pertenece a otro usuario!!")</script>
            <?php
                }
            ?>
            <form class="" name="addUser" method="post" action="<?php echo $helper->url("Producto","crear");?>" onsubmit="return validationRegisterUserForm();">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="identificacion">Producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="" onpaste="return false" required>
                    </div>                    
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Tipo Producto</label>
                        <select id="tipo_producto" name="tipo_producto" class="browser-default custom-select">
                            <option value="Inyectable" >Inyectable</option> 
                            <option value="Antibiotico"  >Antibioticos</option>
                            <option value="Antiparasitarios" >Antiparasitarios</option>
                            <option value="Antinflamatorio" >Antinflamatorio</option> 
                            <option value="Hormonales"  >Hormonales</option>
                        </select>
                       <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="apellido">Precio</label>
                        <input type="number" class="form-control" id="precio_producto" name="precio_producto" placeholder="" required onkeypress="return solonumeros(event);">
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Registrar">
            </form>
        <?php require_once 'view/module/endBody.php'?>
    </body>
</html>

<?php 
    }//fin del sino 
}else{
    require_once 'core/ControladorBase.php';

    $entidad = new ControladorBase;
    $entidad->redirect("Login","index");
}
?>