<?php session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']['tipo'] != "admin"){
       require_once 'core/ControladorBase.php';
       
       $entidadBase = new ControladorBase();
       $entidadBase->redirect("Login","index");
    } else {
        $aticulo_x_pagina=3;
        $paginas = 0;
        if(is_object($users)){
            $paginas = 0.1;
        } else{
            $paginas = count($allusers)/$aticulo_x_pagina;    
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
            <?php require_once 'view/module/user/gestion/topTitleUserGestion.php'?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Administrador","getUsers") ?>">Listar</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $helper->url("Administrador","crearIndex") ?>">Registrar nuevo</a></li>
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
            <form class="" method="post" action="<?php echo $helper->url("Administrador","getUserConsultPagination");?>&page=0&attribute=identificacion">
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
                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($users)){?>
                        <?php foreach($users as $user){?>
                            <tr>    
                                <td><?php echo $user->identificacion?></td>
                                <td><?php echo $user->nombre?></td>
                                <td><?php echo $user->apellido?></td>
                                <td><?php echo $user->direccion?></td>
                                <td><?php echo $user->telefono?></td>
                                <td><a class="btn btn-primary" style="color: white" href="<?php echo $helper->url("Administrador","editarIndex");?>&id=<?php echo $user->identificacion;?>"> <ion-icon name="create" style="color: white !important"></ion-icon></a> <a href="<?php echo $helper->url("Administrador","borrar");?>&id=<?php echo $user->identificacion?>"> <button class="btn btn-danger" style="color: white" onclick="return deleteOption()"> <ion-icon name="trash" style="color: white !important;"></ion-icon></button> </a> <a href="<?php echo $helper->url("Mascota","registrarIndex");?>&identificacion=<?php echo $user->identificacion?>"> <button class="btn btn-success" style="color: white"> <ion-icon name="add-circle-outline" style="color: white !important;"></ion-icon></button> </a></td>
                        <?php } ?>
                    <?php } else if(is_object($users)) {?>
                        <tr>    
                            <td><?php echo $users->identificacion?></td>
                            <td><?php echo $users->nombre?></td>
                            <td><?php echo $users->apellido?></td>
                            <td><?php echo $users->direccion?></td>
                            <td><?php echo $users->telefono?></td>
                            <td><a class="btn btn-primary" style="color: white" href="<?php echo $helper->url("Administrador","editarIndex");?>&id=<?php echo $user->identificacion;?>"> <ion-icon name="create" style="color: white !important"></ion-icon></a> <a href="<?php echo $helper->url("Administrador","borrar");?>&id=<?php echo $user->identificacion?>"> <button class="btn btn-danger" style="color: white" onclick="return deleteOption()"> <ion-icon name="trash" style="color: white !important;"></ion-icon></button> </a> <a href="<?php echo $helper->url("Mascota","registrarMascota");?>&identificacion=<?php echo $user->identificacion?>"> <button class="btn btn-success" style="color: white"> <ion-icon name="add-circle-outline" style="color: white !important;"></ion-icon></button> </a></td>
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
                    ?>"><a class="page-link" href="<?php echo $helper->url("Administrador","getUserPagination");?>&page=<?php if(isset($_GET["page"])) echo $_GET['page']-1; else echo 1?>">Anterior</a></li>

                    <?php for($i=0;$i<$paginas;$i++) { ?>
                    
                    <li class="page-item <?php echo $_GET['page']==$i+1 ? 'active' : ''?>" ><a class="page-link" href="<?php echo $helper->url("Administrador","getUserPagination");?>&page=<?php echo $i+1?>"><?php echo $i+1?></a></li>

                    <?php } ?>
                    <li class="page-item <?php 
                    if(isset($_GET['page'])){
                        echo $_GET['page']>=$paginas? 'disabled' : '';
                    } else {
                        echo $paginas>=1? '' : 'disabled';
                    }
                    ?>" ><a class="page-link" href="<?php echo $helper->url("Administrador","getUserPagination");?>&page=<?php if(isset($_GET["page"])) echo $_GET["page"]+1; else echo 2;?>">Siguiente</a></li>
                </ul>
            </nav>
            <?php
                if(isset($_GET['confirm']) && !empty($_GET['confirm'])){
                    if($_GET['confirm'] == "yesregister"){ ?>
                        <div class="alert alert-success" role="alert">
                            Registro exitoso!!!
                        </div>
                    <?php } else if ($_GET['confirm'] == "yesedit"){ ?>
                        <div class="alert alert-info" role="alert">
                            Actializacion exitosa!!!
                        </div>
                    <?php } else if ($_GET['confirm'] == "yesdelete"){ ?>
                        <div class="alert alert-danger" role="alert">
                            Eliminacion exitosa!!!
                        </div>
                    <?php }
                } 
            ?>
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