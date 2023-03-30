<?php 
  include_once '../Controllers/usuariosController.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="dist/css/login.css" />
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <title>Mate</title>
</head>

<body>
    <div class="container">
        <div class="text">Registrarse</div>

        <!-- El form debe tener un action vacío y método de tipo POST -->
        <form action="" method="post">
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="text" required placeholder="Nombre" id="nombre" name="nombre">
            </div>
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="text" required placeholder="Apellidos" id="apellidos" name="apellidos">
            </div>
            <br>
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="text" required placeholder="Cédula" id="cedula" name="cedula" onblur="validarCedula();">
            </div>
            <br>
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="mail" required placeholder="Correo Electrónico" id="correoElectronico"
                    name="correoElectronico">
            </div>
            <br>
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="text" required placeholder="Teléfono" id="telefono" name="telefono">
            </div>
            <br>
            <div class="field">
                <span class="fas fa-lock"></span>
                <input type="password" required placeholder="Contraseña" id="contrasenna" name="contrasenna">
            </div>
            <br>
            <div class="field">
                <span class="fas fa-lock"></span>
                <input type="password" required placeholder="Confirmar contraseña" id="confirmarContrasenna"
                    name="confirmarContrasenna">
            </div>
            <button class="btn btn-primary btn-block" disable id="btnRegistrar" name="btnRegistrar">Registrar</button>
            <div class="signup">
                ¿Ya tienes cuenta?
                <a href="login.php">Regresa al Login</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="javascripts/funcionesRegistro.js"></script>
    <script src="javascripts/validarContrasenna.js"></script>
</body>

</html>
