<?php session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']['tipo'] != "admin"){
       require_once 'core/ControladorBase.php';
       
       $entidadBase = new ControladorBase();
       $entidadBase->redirect("Login","index");
    } else {
        $aticulo_x_pagina=3;
        $paginas = 0;
        if(is_object($raza)){
            $paginas = 0.1;
        } else{
            $paginas = count($allraza)/$aticulo_x_pagina;    
        }
        $paginas = ceil($paginas);
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
            <?php require_once 'view/module/race/gestion/topTitleRazasGestion.php'?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Seleccion de razas</li>
                </ol>
            </nav>
            <style>
                .thead{
                    background: purple !important;
                }
                .thead > tr > th{
                    color: white;
                }
            </style>
            <form class="" method="post" action="<?php echo $helper->url("Razas","getRazaConsultPagination");?>&page=0&attribute=identificacion">
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <input id="search" name="search" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing">
            </div>
            </form>
            
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo de mascota</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($raza)){?>
                        <?php foreach($raza as $raz){?>
                            <tr>    
                                <td><?php echo $raz->id?></td>
                                <td><?php echo $raz->nombre?></td>
                                <td><?php echo $raz->tipo_mascota?></td>
                                <td><a class="btn btn-primary" style="color: white" href="<?php echo $helper->url("Mascota","registrarIndex");?>&id=<?php echo $raz->id;?>&nombre=<?php echo $raz->nombre;?>&condicion=ok"> <ion-icon name="checkmark" style="color: white !important"></ion-icon></a></td>
                        <?php } ?>
                    <?php } else if(is_object($raza)) {?>
                        <tr>    
                            <td><?php echo $raza->id?></td>
                            <td><?php echo $raza->nombre?></td>
                            <td><?php echo $raza->tipo_mascota?></td>
                            <td><a class="btn btn-primary" style="color: white" href="<?php echo $helper->url("Razas","registrarIndex");?>&id=<?php echo $raz->identificacion;?>&nombre=<?php echo $raz->nombre;?>&condicion=ok"> <ion-icon name="checkmark" style="color: white !important"></ion-icon></a> </td>
                    <?php } ?>
                </tbody>      
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?php 
                    if(isset($_GET['page'])){
                        echo $_GET['page']<=1? 'disabled' : '';
                    } else {
                        echo $paginas<=1? 'disable' : '';
                    }
                    ?>"><a class="page-link" href="<?php echo $helper->url("Razas","getRazaPagination");?>&page=<?php if(isset($_GET["page"])) echo $_GET['page']-1; else echo 1?>">Anterior</a></li>

                    <?php for($i=0;$i<$paginas;$i++) { ?>
                    
                    <li class="page-item <?php echo $_GET['page']==$i+1 ? 'active' : ''?>" ><a class="page-link" href="<?php echo $helper->url("Razas","getRazaPagination");?>&page=<?php echo $i+1?>"><?php echo $i+1?></a></li>

                    <?php } ?>
                    <li class="page-item <?php 
                    if(isset($_GET['page'])){
                        echo $_GET['page']>=$paginas? 'disabled' : '';
                    } else {
                        echo $paginas>=1? '' : 'disabled';
                    }
                    ?>" ><a class="page-link" href="<?php echo $helper->url("Razas","getRazaPagination");?>&page=<?php if(isset($_GET["page"])) echo $_GET["page"]+1; else echo 2;?>">Siguiente</a></li>
                </ul>
            </nav>
        <?php require_once 'view/module/endBody.php'?>
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