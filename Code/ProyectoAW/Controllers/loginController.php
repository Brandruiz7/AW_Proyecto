<?php
/**
 * Explicación general del controlador:
 * 
 * loginController.php es un controlador de las funciones de inicio de sesión. 
 * En él encontrará las funcionalidades como:
 * *
 * *    - Comprobar el inicio de sesión.
 * *    - Cerrar sesión.
 * *
 * Se utiliza include_once para mandar a llamar a las funciones del modelo correspondiente
 * y la idea es que pueda ser utilizado solo si el usuario ha iniciado sesión.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
include '../Models/loginModel.php';

if(session_status()==PHP_SESSION_NONE) {
    session_start();
}

/**
 * Este if - isset se encarga de mandar una solicitud al modelo para consultar si los datos
 * POST de correo y contraseña ingresados en la página de login.php corresponden a un 
 * usuario que está registrado en la Base de datos MySQL cuando se presiona le botón de 
 * Iniciar sesión. Si la consulta obtuvo más de cero coincidencias significa que sí está 
 * registrado el usuario y los datos se procesan en un array según los nombres 
 * respectivos en el proceso (Ver Procesos en base de datos) y se almacenan en variables 
 * de sesión. Si obtiene coincidencias ingresa a la página principal si no regresa al login.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST["btnIniciarSesion"])){
    $correoElectronico      = $_POST["correoElectronico"]; 
    $contrasenna            = $_POST["contrasenna"];
    $res                    = iniciarSesionModel($correoElectronico, $contrasenna);

    if($res -> num_rows > 0){
        $datosUsuario = mysqli_fetch_array($res);
        $_SESSION["ConsecutivoUsuario"] =   $datosUsuario["ConsecutivoUsuario"];
        $_SESSION["CorreoElectronico"]  =   $datosUsuario["CorreoElectronico"];
        $_SESSION["Nombre"]             =   $datosUsuario["Nombre"];
        $_SESSION["TipoUsuario"]        =   $datosUsuario["TipoUsuario"];
        $_SESSION["PerfilUsuario"]      =   $datosUsuario["PerfilUsuario"]; 
        $_SESSION["Cedula"]             =   $datosUsuario["Cedula"];
        $_SESSION["Telefono"]           =   $datosUsuario["Telefono"];
        header("Location: ../Views/principal.php");
    }else{
        header("Location: ../Views/login.php");
    }
}

/**
 * Este if - isset se encarga de destruir la sesión, es decir, se encarga de 
 * cerrar sesión y volver al login cuando se presiona el botón Cerrar Sesión
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST['btnCerrarSesion'])){
    session_destroy();
    header("Location: ../Views/login.php");
}

?>