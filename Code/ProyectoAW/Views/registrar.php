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
    <title>Razer | Registrarse</title>
</head>

<body>
    <div class="container">
        <div class="text">Registrarse</div>

        <!-- El form debe tener un action vacío y método de tipo POST -->
        <form action="" method="post">
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="text" required placeholder="Cédula" id="Identificacion" name="Identificacion"
                    onblur="buscarNombreApi();">
            </div>
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="text" required placeholder="Nombre" disable id="Nombre" name="Nombre">
            </div>
            <br>
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="mail" required placeholder="Correo Electrónico" id="correoElectronico"
                    name="correoElectronico" onblur="validarCorreo();">
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
    <script src="javascripts/funcionesActualizarUsuario.js"></script>
</body>

</html>