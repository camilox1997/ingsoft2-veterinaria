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
            <?php require_once 'view/module/pets/gestion/topTitlePetsGestion.php'?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Mascota</li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Mascota","getMascotas") ?>">Lista</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="identificacion">Responsable</label>
                    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="" value="<?php echo $petsedit->responsable?>" onkeypress="return solonumeros(event);" onpaste="return false" disabled>
                </div>
            </div>
            <form class="" method="post" action="<?php echo $helper->url("Mascota","editar");?>&id=<?php echo $petsedit->id;?>" onsubmit="return validationEditPetsForm();">
                <div class="row">
                    
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" placeholder="" value="<?php echo $petsedit->nombre_mascota?>" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="apellido">Sexo</label>
                        <select id="sexo" name="sexo" class="browser-default custom-select">
                            <option value="M" <?php echo $petsedit->sexo=="M"? 'selected' : '';?> >Macho</option> 
                            <option value="F" <?php echo $petsedit->sexo=="F"? 'selected' : '';?> >Hembra</option>
                        </select>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="direccion">Peso</label>
                        <input type="text" class="form-control" id="peso" name="peso" placeholder="" value="<?php echo $petsedit->peso?>" required>
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