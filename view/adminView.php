<?php session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']['tipo'] != "admin"){
       require_once 'core/ControladorBase.php';
       
       $entidadBase = new ControladorBase();
       $entidadBase->redirect("Login","index");
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
            
        </div>
        <?php require_once 'view/module/endBody.php'; ?>
    </body>
</html>
<?php
    }
} else {
    require_once 'core/ControladorBase.php';
       
    $entidadBase = new ControladorBase();
    $entidadBase->redirect("Login","index");
}
?>