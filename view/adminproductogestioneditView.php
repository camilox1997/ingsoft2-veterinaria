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
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Producto","registrarIndex") ?>">Registrar nuevo</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="identificacion">Id</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="" value="<?php echo $productedit->id?>" onkeypress="return solonumeros(event);" onpaste="return false" disabled>
                </div>
            </div>
            <form class="" method="post" action="<?php echo $helper->url("Producto","editar");?>&id=<?php echo $productedit->id;?>">
                <div class="row">
                    
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="" value="<?php echo $productedit->nombre_producto?>" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="apellido">Tipo producto</label>
                        <select id="tipo_producto" name="tipo_producto" class="browser-default custom-select">
                            <option value="Inyectable" <?php echo $productedit->tipo_producto=="Inyectable"? 'selected' : '';?> >Inyectable</option> 
                            <option value="Antibiotico" <?php echo $productedit->tipo_producto=="Antibiotico"? 'selected' : '';?> >Antibiotico</option>
                            <option value="Antiparasitarios" <?php echo $productedit->tipo_producto=="Antiparasitarios"? 'selected' : '';?> >Antiparasitarios</option>
                            <option value="Antinflamatorio" <?php echo $productedit->tipo_producto=="Antinflamatorio"? 'selected' : '';?> >Antinflamatorio</option> 
                            <option value="Hormonales" <?php echo $productedit->tipo_producto=="Hormonales"? 'selected' : '';?> >Hormonales</option>
                        </select>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="direccion">Precio</label>
                        <input type="number" class="form-control" id="precio_producto" name="precio_producto" placeholder="" value="<?php echo $productedit->precio_producto?>" required onkeypress="return solonumeros(event);">
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    
                </div>
                <input class="btn btn-primary" type="submit" value="Actualizar">
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