<?/*php session_start();
if(isset($_SESSION['user'])){
    require_once 'core/ControladorBase.php';
    $controlador = new ControladorBase();
    if($_SESSION['user']['tipo'] == 'admin')
        $controlador->redirect("Administrador", "index");
    elseif($_SESSION['user']['tipo'] == 'cliente'){
        $controlador->redirect("Cliente", "index");
    }
} else {*/
?>
<html>
    <head>
        <?php require_once 'view/module/headers.php';?>
    </head>
    <body>
        <header>
            <nav id="navlimpio" class="navbar"></nav>
            <?php require_once 'view/module/index/topbarmenu.php';?>
        </header>

        <main rol="main">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/pitbull_american_carucel.jpeg" class="d-block w-80" alt="..." wit>
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/gato_carucel.jpg" class="d-block w-80" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/perro_y_gato_carucel.jpg" class="d-block w-80" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="jumbotron">
                            <h1 class="display-4">La clinica veterinaria perfecta para tu mascota</h1>
                            <p class="text-justify lead">Nuestra clínica Veterinaria es especializada en Medicina Felina y Canina, presta servicios de prevención, diagnóstico y tratamiento, con técnicas especializadas y adecuadas 
                                a cada caso, considerando como único el mismo, así como el seguimiento hasta su total recuperación e incorporación,- "en su caso"- a una pauta de comportamiento y vida activa normalizada.​</p>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                        <div class="card col-xs-12 col-md-4" style="width: 18rem;">
                            <img src="img/labrador.jpg" class="card-img-top" alt="..."> 
                            <div class="card-body text-center">
                                <h5 class="card-title"><ion-icon name="paw"></ion-icon> Servicio especializado para perros <ion-icon name="paw"></ion-icon></h5>
                            </div>
                        </div>
                        <div class="card col-xs-12 col-md-4" style="width: 18rem;">
                            <img src="img/gato500x500.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><ion-icon name="paw"></ion-icon> Rincon especial para tu amigo felino <ion-icon name="paw"></ion-icon></h5>
                            </div>
                        </div>
                        <div class="card col-xs-12 col-md-4" style="width: 18rem;">
                            <img src="img/clinica_como_reyes_LOGO_NAV.png" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><ion-icon name="paw"></ion-icon> Clinica veterinaria como <ion-icon name="paw"></ion-icon></h5>
                            </div>
                        </div>
                </div>
            </div>
            <?php require_once 'view/module/index/footer.php';?>
        </main>

        <?php require_once 'view/module/endBody.php'; ?>
    </body>
</html>
<?php/* } */?>