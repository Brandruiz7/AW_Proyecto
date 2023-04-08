<?php

include '../Models/loginModel.php';

if(session_status()==PHP_SESSION_NONE) {
    session_start();
}

/**
 * Reconoce si se presionó o no el botón btnIniciarSesion. Si es así,
 * se envía una consulta a iniciarSesion Model con los parámetros, la idea
 * es verificar si el correo y la contraseña están en la base para poder
 * iniciar sesión.
 */
if(isset($_POST["btnIniciarSesion"])){
    /**
     * Se reciben los datos de los campos en login.php y se almacenan en
     * las variables $correoElectronico y $contrasenna. Después se envían
     * por medio de parámetros
     */
    $correoElectronico      = $_POST["correoElectronico"]; 
    $contrasenna            = $_POST["contrasenna"];
    $res                    = iniciarSesionModel($correoElectronico, $contrasenna);

    /**
     * Funcionamiento del if:
     * 
     * Este if verifica si el resultado de la consulta anterior tuvo más de cero
     * filas como respuesta. Si es correcto, entra al if y se crea una variable
     * $datosUsuario que irá almacenando todas las flas en un array. Después se crean
     * variables de sesión en las que se almacenan datos que se creen necesarios para 
     * otros sectores del proyecto. Después el usuario es redirigido a la página principal.
     * 
     * Si no retorna filas, significa que no hubo coincidencias y redirecciona al usuario a 
     * la vista de login.php
     */
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
 * Permite destruir la sesión mietras se presione el btnCerrarSesion, una vez
 * presionado el botón el usuario regresa a la página de login.php
 */
if(isset($_POST['btnCerrarSesion'])){
    session_destroy();
    header("Location: ../Views/login.php");
}

?>