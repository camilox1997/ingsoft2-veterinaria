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
            <form class="" name="addUser" method="post" action="<?php echo $helper->url("Razas","crear");?>" onsubmit="return validationRegisterRazasForm();">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="tipo_mascota">Tipo de mascota</label>
                        <select id="tipo_mascota" name="tipo_mascota" class="browser-default custom-select">
                            <option value="Perro">Perros</option> 
                            <option value="Gato">Gatos</option>
                            <option value="Ave">Aves</option>
                        </select>
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