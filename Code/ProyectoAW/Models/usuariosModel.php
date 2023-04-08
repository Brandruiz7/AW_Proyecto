<?php 

include_once 'conexionModel.php';

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarUsuarios
 * y se le envían las variables de sesión de usuario y tipoUsuario, para
 * verificar la sesión y retornar todos los usuarios que se encuentran en la
 * base de datos. Al finalizar se cierra la instancia.
 * 
 * Return:
 * $res                 Retorna los datos de la base MySQL.
 */
function consultarUsuariosModel()
{   
    $instancia    = Open();
    
    $usuario      = $_SESSION["CorreoElectronico"];
    $tipoUsuario  = $_SESSION["TipoUsuario"];
    $sentencia    = "CALL ConsultarUsuarios('$usuario','$tipoUsuario');"; 
    $respuesta    = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function ConsultarTiposUsuarioModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTiposUsuario();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function actualizarUsuarioModel($contrasenna,$cedula,$nombre,$perfil,$consecutivo){
    $instancia = Open();
    
    $sentencia = "CALL ActualizarUsuario('$contrasenna','$cedula','$nombre',$perfil,$consecutivo);";
    
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}


/**
 * Esta función se encarga de llamar la función de MySQL ActualizarDatos
 * y se le envía el parámetro de consecutivo. Con ello, el usuario que 
 * contiene el consecutivo enviado se actualiza de activo a inactivo.
 * Al finalizar se cierra la instancia.
 * 
 * Parámetro:
 * 
 * $consecutivo         Almacena el consecutivo del usuario.
 * 
 * Return:
 * $res                 Retorna los datos de la base MySQL.
 */
function actualizarDatosModel($consecutivo){
    $instancia  = Open();
    
    $sentencia  = "CALL ActualizarDatos('$consecutivo');";
    echo          $sentencia;
    $res        = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarCedula
 * y se le envía el parámetro de cedula. Esta función se encarga de
 * enviar la cédula y consultar en la base de datos si hay coincidencias.
 * Al finalizar se cierra la instancia.
 * 
 * Parámetro:
 * 
 * $cedula              Almacena la cédula del usuario.
 * 
 * Return:
 * $res                 Retorna los datos de la base MySQL.
 */
function buscarUsuarioModel($correoElectronico){

    $instancia  = Open();

    $sentencia  = "CALL ConsultarCorreo('$correoElectronico');";
    $res        = $instancia -> query($sentencia);

    Close($instancia);
    return $res; 

}

/**
 * Esta función se encarga de llamar la función de MySQL RegistrarUsuarios
 * y se le envian varios parámetros para poder registrar un nuevo usuario en 
 * la base de datos. Una vez concluido, se cierra la instancia.
 * 
 * Parámetro:
 * 
 * $nombre              Almacena el nombre del usuario.
 * $cedula              Almacena la cédula del usuario.
 * $correoElectronico   Almacena el correo del usuario.
 * $telefono            Almacena el teléfono del usuario.
 * $contrasenna         Almacena la contrasena del usuario.
 * 
 * Return:
 * $res                 Retorna los datos de la base MySQL.
 */
function registrarModel($nombre, $cedula, $correoElectronico, $telefono, $contrasenna){
    $instancia  = Open();
    
    $sentencia  = "CALL RegistrarUsuarios('$nombre', '$cedula', '$correoElectronico', '$telefono', '$contrasenna');";
    $res        = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

?> 
