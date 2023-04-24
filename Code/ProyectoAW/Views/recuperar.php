<?php 
/**
 * Explicación general de la vista:
 * 
 * mantenimientoUsuario.php es una vista cuya idea es brindar un resumen general de los usuarios 
 * y esta vista cuenta con lo siguiente:
 * **
 * **   - Correo electrónico del usuario.
 * **   - Identificación del usuario.
 * **   - Nombre completo del usuario.
 * **   - Tipo de usuario.
 * **   - Estado.
 * **   - Acciones (Actualizar | Eliminar).
 * **
 * Ahora, en el caso que la persona le dé clic al botón actualizar se enviará el consecutivo 
 * del usuario a la página actualizarUsuario. También hay un modal que se activa cuando se da
 * clic a eliminar, ese mismo almacenará el consecutivo y en caso de confirmar será enviado a 
 * la base de datos para ser procesado y para manejar un orden en el proyecto se agrega un 
 * "include_once" que apunta al del controlador usuario respectivo que almacenará las 
 * funciones que validan la información.
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