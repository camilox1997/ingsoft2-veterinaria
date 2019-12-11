<?php session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']['tipo'] != "admin"){
        require_once 'core/ControladorBase.php';

        $entidad = new ControladorBase;
        $entidad->redirect("Login","index");
    } else {
        $mascota = array();
        if(isset($_SESSION['mascota'])){
            $mascota = $_SESSION['mascota'];
        } else {
            $_SESSION['mascota'] = $propietario;
        }
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
            <?php
                if(isset($_GET["confirm"]) && $_GET["confirm"] == "not"){
            ?>
            <script>alert("Identificacion ingresada ya pertenece a otro usuario!!")</script>
            <?php
                }
            ?>
            <form class="" method="post" action="<?php echo $helper->url("Mascota","buscarRaza");?>&condition=ok">
                <div class="input-group input-group mb-3">
                <div class="input-group-prepend">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
                <input id="search" name="search" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" disabled value="<?php echo isset($_GET['id'])? $_GET['nombre']: ''?>">
            </div>
            </form>
            <form class="" name="addUser" method="post" action="<?php echo $helper->url("Mascota","crear");?>&identificacion_propietario=<?php echo empty($mascota)==true? $propietario->identificacion : $mascota->identificacion;?>&idraza=<?php echo isset($_GET['id'])? $_GET['id']: ''?>" onsubmit="return validationRegisterPetsForm();">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="identificacion">Identificacion de propietario</label>
                        <input type="text" class="form-control" id="identificacion_propietario" name="identificacion_propietario" placeholder="" value="<?php echo empty($mascota)==true? $propietario->identificacion : $mascota->identificacion;?>" onkeypress="return solonumeros(event);" onpaste="return false" required disabled>
                    </div>                    
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre del propietario</label>
                        <input type="text" class="form-control" id="nombre_propietario" name="nombre_propietario" placeholder="" required disabled value="<?php echo empty($mascota)==true? $propietario->nombre : $mascota->nombre;?>">
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="apellido">Nombre de mascota</label>
                        <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" onkeypress="return sololetras(event)"  <?php echo isset($_GET['condicion'])? $_GET['condicion']=="ok"? '':'disabled' : 'disabled' ?> placeholder="" required onkeypress="return existeRaza(event);">
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="idraza">Id de la raza</label>
                        <input type="text" class="form-control" id="idraza" name="idraza" placeholder="" disabled required value="<?php echo isset($_GET['id'])? $_GET['id']: ''?>"> 
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="sexo">Sexo</label>
                        <select id="sexo" name="sexo" class="browser-default custom-select" <?php echo isset($_GET['condicion'])? $_GET['condicion']=="ok"? '':'disabled' : 'disabled' ?> >
                            <option value="M">Macho</option> 
                            <option value="F">Hembra</option>
                        </select>
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="username">Peso</label>
                        <input type="text" onpaste="return false" class="form-control" id="peso" name="peso" value="" placeholder="" onkeypress="return solonumeros(event);" required <?php echo isset($_GET['condicion'])? $_GET['condicion']=="ok"? '':'disabled' : 'disabled' ?> >
                        <div class="invalid-feedback">
                            Debe llenar este campo.
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-2 mb-2">
                        <label for="username">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" min="2000-01-01" placeholder="" required <?php echo isset($_GET['condicion'])? $_GET['condicion']=="ok"? '':'disabled' : 'disabled' ?> >
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