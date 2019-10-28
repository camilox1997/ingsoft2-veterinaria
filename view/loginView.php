<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'view/module/headers.php';?>
</head>
<body class="text-center">
  <div class="login-container d-flex align-items-center justify-content-center">
        <form class="login-form text-center" method="post" action="<?php echo $helper->url("Login","acceder")?>">
          <img class="mb-4" src="img/clinica_como_reyes_LOGO_NAV.png" alt="" width="150" height="150">
          <h1 class="mb-5 font-weight-light text-uppercase">Iniciar sesion</h1>
          <div class="form-group">
              <input type="text" class="form-control rounded-pill" placeholder="Nombre de usuario" name="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control rounded-pill" placeholder="Contraseña" name="password">
          </div>
          <button type="submit" class="btn-custon btn btn-primary btn-block rounded-pill">Iniciar sesion</button>
          <br>
          <p><a href="index.php?controller=Principal">volver</a></p>
        </form>
  <div>
  <?php require_once 'view/module/endBody.php'?>
</body>
</html>