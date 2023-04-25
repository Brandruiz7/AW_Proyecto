<?php 

include_once 'conexionModel.php';

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarUsuarios
 * y se le envían las variables de sesión de usuario y tipoUsuario, para
 * verificar la sesión y retornar todos los usuarios que se encuentran en la
 * base de datos. Al finalizar se cierra la instancia.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarUsuariosModel(){   
    $instancia    = Open();
    
    $usuario      = $_SESSION["CorreoElectronico"];
    $tipoUsuario  = $_SESSION["TipoUsuario"];
    $sentencia    = "CALL ConsultarUsuarios('$usuario','$tipoUsuario');"; 
    $respuesta    = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarUsuario
 * y se le envía el parámetro de ConsecutivoUsuario para verificar si los
 * datos se encuentran registrados en la base. 
 * Al finalizar se cierra la instancia.
 * 
 * @param int           $ConsecutivoUsuario     Almacena el consecutivo del Usuario.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarUsuarioModel($ConsecutivoUsuario){
    $instancia = Open();

    $sentencia = "CALL ConsultarUsuario($ConsecutivoUsuario);"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarTiposUsuario
 * para verificar si los datos se encuentran registrados en la base. 
 * Al finalizar se cierra la instancia.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposUsuarioModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTiposUsuario();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarTiposEstado. Con
 * ello se devuelven los datos que tienen coincidencia en el carrito con el usuario.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposEstadoUsuarioModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTiposEstado();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL ActualizarUsuario
 * y se le envían los parámetros para verificar si los datos se encuentran 
 * registrados en la base. 
 * Al finalizar se cierra la instancia.
 * 
 * @param string        $contrasenna            Almacena la contraseña.
 * @param int           $cedula                 Almacena la cédula del usuario.
 * @param string        $nombre                 Almacena el nombre del usuario.
 * @param int           $estado                 Almacena el consecutivo del estado.
 * @param int           $perfil                 Almacena el consecutivo del tipo de usuario.
 * @param int           $ConsecutivoUsuario     Almacena el consecutivo del Usuario.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ActualizarUsuarioModel($contrasenna,$cedula,$nombre,$estado,$perfil,$ConsecutivoUsuario){
    $instancia = Open();
    
    $sentencia = "CALL ActualizarUsuario('$contrasenna','$cedula','$nombre',$estado,$perfil,$ConsecutivoUsuario);";
    
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL EditarPerfilUsuario
 * y se le envían los parámetros para verificar si los datos se encuentran 
 * registrados en la base. 
 * Al finalizar se cierra la instancia.
 * 
 * @param string        $contrasenna            Almacena la contraseña.
 * @param string        $correoElectronico      Almacena el correo electrónico del usuario.
 * @param string        $Telefono               Almacena el número de teléfono del usuario.
 * @param int           $ConsecutivoUsuario     Almacena el consecutivo del Usuario.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function EditarPerfilUsuarioModel($contrasenna,$correoElectronico,$Telefono,$consecutivo){
    $instancia = Open();
    
    $sentencia = "CALL EditarPerfilUsuario('$contrasenna','$correoElectronico',$Telefono,$consecutivo);";
    
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}


/**
 * Esta función se encarga de llamar la función de MySQL ActualizarEstadoUsuario
 * y se le envía el parámetro ConsecutivoUsuario para verificar si los datos se 
 * encuentran registrados en la base y actualiza el esto del usuario.
 * Al finalizar se cierra la instancia.
 * 
 * @param int           $ConsecutivoUsuario     Almacena el consecutivo del Producto.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ActualizarEstadoUsuarioModel($ConsecutivoUsuario){
    $instancia  = Open();
    
    $sentencia  = "CALL ActualizarEstadoUsuario('$ConsecutivoUsuario');";
    echo          $sentencia;
    $res        = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarCorreo
 * y se le envían los parámetros de correoElectronico para verificar si 
 * los datos se encuentran registrados en la base. 
 * Al finalizar se cierra la instancia.
 * 
 * @param int           $correoElectronico      Almacena el correo electrónico del usuario.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarCorreoModel($correoElectronico){

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
 * 
 * @param  string       $nombre                 Almacena el nombre del usuario.
 * @param  int          $cedula                 Almacena la cédula del usuario.
 * @param  string       $correoElectronico      Almacena el correo del usuario.
 * @param  string       $telefono               Almacena el teléfono del usuario.
 * @param  string       $contrasenna            Almacena la contrasena del usuario.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function RegistrarModel($nombre, $cedula, $correoElectronico, $telefono, $contrasenna){
    $instancia  = Open();
    
    $sentencia  = "CALL RegistrarUsuarios('$nombre', '$cedula', '$correoElectronico', '$telefono', '$contrasenna');";
    $res        = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarTestimonios. Con ello
 * se devuelven los datos todos los datos que están registrados en la tabla testimonios.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTestimoniosModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTestimonios();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

?> 
