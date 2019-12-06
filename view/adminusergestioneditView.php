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
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Administrador","getUsers") ?>">Lista</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Administrador","crearIndex") ?>">Registrar nuevo</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="identificacion">Identifiacion</label>
                    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="" value="<?php echo $useredit->identificacion?>" disabled>
                </div>
            </div>
            <form class="" method="post" action="<?php echo $helper->url("Administrador","editar");?>&id=<?php echo $useredit->identificacion;?>">
                <div class="row">
                    
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo $useredit->nombre?>" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="" value="<?php echo $useredit->apellido?>" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="<?php echo $useredit->direccion?>" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" value="<?php echo $useredit->telefono?>" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                </div>
                <input type="hidden" name="username" value="***">
                <input type="hidden" name="pass" value="***">
                <input type="hidden" name="tipo" value="***">
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