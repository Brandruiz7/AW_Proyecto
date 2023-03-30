<?php 
include '../Controllers/usuariosController.php';
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
      <div class="text">Recuperar Usuario</div>
      
      <!-- El form debe tener un action vacío y método de tipo POST -->
      <form action="" method="post">
        <div class="field">
          <span class="fas fa-envelope"></span>
          <input type="text" required placeholder="Ingrese su correo electrónico" 
          id="correoElectronico" name="correoElectronico">
        </div>
        <br/>
        <button class="btn btn-primary btn-block" 
                disable id="btnRecuperar" name="btnRecuperar">Recuperar</button>
      </form>
    </div>

    <script src="javascripts/funcionesRecuperar.js"></script>
  </body>
</html>