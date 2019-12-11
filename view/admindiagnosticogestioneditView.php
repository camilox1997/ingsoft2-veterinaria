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
            <?php require_once 'view/module/diagnostic/topTitleDiagnosticGestion.php'?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Diagnostico</li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Diagnostico","index") ?>">Lista</a></li>
                </ol>
            </nav>
            <form class="" method="post" action="<?php echo $helper->url("Diagnostico","editar");?>&id=<?php echo $diagnosticoedit->id;?>" onsubmit="return validationEditDiagnosticForm();">
                <div class="row">
                    
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Diagnostico</label>
                        <input type="text" class="form-control" id="nombre_diagnostico" name="nombre_diagnostico" placeholder="" value="<?php echo $diagnosticoedit->nombre_diagnostico?>" required">
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