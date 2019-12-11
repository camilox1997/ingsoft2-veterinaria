<style>

/*side bar menu admin*/
.navbar.fixed-left{
    background:lavender !important;
}

.custom-toggler.navbar-toggler {
    border-color: rgb(255,102,203) !important;
}

 .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,102,203, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E") !important;
  }
@media (min-width:768px){body{padding-top:0}}@media (min-width:768px){body{margin-left:232px}}.navbar.fixed-left{position:fixed;top:0;left:0;right:0;z-index:1030}@media (min-width:768px){.navbar.fixed-left{bottom:0;width:232px;flex-flow:column nowrap;align-items:flex-start}.navbar.fixed-left .navbar-collapse{flex-grow:0;flex-direction:column;width:100%}.navbar.fixed-left .navbar-collapse .navbar-nav{flex-direction:column;width:100%}.navbar.fixed-left .navbar-collapse .navbar-nav .nav-item{width:100%}.navbar.fixed-left .navbar-collapse .navbar-nav .nav-item .dropdown-menu{top:0}}@media (min-width:768px){.navbar.fixed-left{right:auto}.navbar.fixed-left .navbar-nav .nav-item .dropdown-toggle:after{border-top:.3em solid transparent;border-left:.3em solid;border-bottom:.3em solid transparent;border-right:none;vertical-align:baseline}.navbar.fixed-left .navbar-nav .nav-item .dropdown-menu{left:100%}}
</style>

<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-left">
    <a class="navbar-brand" href="#"><img id="logo" src="img/clinica_como_reyes_LOGO_NAV.png" alt="logo como reyes"></a>
    <button class="custom-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">Principal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $helper->url("Administrador","getUsers");?>">Usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $helper->url("Mascota","getMascotas");?>" >Mascotas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $helper->url("Razas","index");?>">Raza</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Consulta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $helper->url("Diagnostico","index");?>" >Diagnostico</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Producto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Facturacion</a>
            </li>
            <style>
                #myPerfilDropdown{
                    padding: 0px;
                    margin: 0px;
                    font: white;
                }

                #myPerfilDropdown > button{
                    background: purple !important;
                }
            </style>
            <div class="dropdown" id="myPerfilDropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['user']['username']?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="index.php?controller=Login&action=salir">Salir</a>
                </div>
            </div>
        </ul>
    </div>
</nav>