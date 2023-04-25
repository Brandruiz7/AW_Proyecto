<?php 
/**
 * Explicación general de la vista:
 * 
 * recuperar.php es una vista cuya idea es brindar una forma para que los usuarios puedan
 * recuperar por medio del correo electrónico su respectiva contraseña-
 * 
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once" que apunta al del 
 * controlador usuario respectivo que almacenará las funciones que validan la información.
 * 
 * En el caso de utilitarios.php, almacenará código reutilizable.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
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
    <link rel="icon" type="image/x-icon" href="dist/img/logo-nav.png">
    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="container">
        <div class="text">Recuperar Usuario</div>

        <!-- El form debe tener un action vacío y método de tipo POST -->
        <form action="" method="post">
            <div class="field">
                <span class="fas fa-envelope"></span>
                <input type="text" required placeholder="Ingrese su correo electrónico" id="correoElectronico"
                    name="correoElectronico">
            </div>
            <br />
            <button class="btn btn-primary btn-block" disable id="btnRecuperar" name="btnRecuperar">Recuperar</button>
            <div class="signup">
                ¿Recordaste la contraseña?
                <a href="login.php">Regresa al Login</a>
            </div>
        </form>
    </div>
    <script src="javascripts/funcionesRecuperar.js"></script>
</body>

</html>