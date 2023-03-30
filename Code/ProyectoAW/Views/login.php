<?php 
include '../Controllers/loginController.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="dist/css/login.css" />
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <title>Iniciar Sesión</title>
  </head>
  <body>
    <div class="container">
      <div class="text">Iniciar Sesión</div>
      
      <!-- El form debe tener un action vacío y método de tipo POST -->
      <form action="" method="post">
        <div class="field">
          <span class="fas fa-user"></span>
          <input type="text" required placeholder="Correo Electrónico" 
          id="correoElectronico" name="correoElectronico" onkeyup="habilitarCampos();">
        </div>
        <div class="field">
          <span class="fas fa-lock"></span>
          <input type="password" required placeholder="Contraseña" 
          id="contrasenna" name="contrasenna" onkeyup="habilitarCampos();"> 
        </div>
        <br/>
        <div class="signup">
          ¿No te has registrado?
          <a href="registrar.php">Regístrate ahora</a>
        </div>
        <button class="btn btn-primary btn-block" 
                disable id="btnIniciarSesion" name="btnIniciarSesion">Ingresar</button>
                <div class="forgot">¿Olvidó la contraseña? <a href="recuperar.php">Recuperar contraseña</a></div>
      </form>
    </div>

    <script src="javascripts/funcionesLogin.js"></script>
  </body>
</html>