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
            <?php require_once 'view/module/user/gestion/topTitleUserGestion.php'?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Razas</li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Razas","index") ?>">Lista</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Razas","crearIndex") ?>">Registrar nuevo</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="identificacion">Id</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="" value="<?php echo $razaedit->id?>" onkeypress="return solonumeros(event);" onpaste="return false" disabled>
                </div>
            </div>
            <form class="" method="post" action="<?php echo $helper->url("Razas","editar");?>&id=<?php echo $razaedit->id;?>" onsubmit="return validationRegisterRazasForm();">
                <div class="row">
                    
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo $razaedit->nombre?>" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="apellido">Tipo de mascota</label>
                        <select id="tipo_mascota" name="tipo_mascota" class="browser-default custom-select">
                            <option value="Perro" <?php echo $razaedit->tipo_mascota=="Perro"? 'selected' : '';?> >Perros</option> 
                            <option value="Gato" <?php echo $razaedit->tipo_mascota=="Gato"? 'selected' : '';?> >Gatos</option>
                            <option value="Ave" <?php echo $razaedit->tipo_mascota=="Ave"? 'selected' : '';?> >Aves</option>
                        </select>
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