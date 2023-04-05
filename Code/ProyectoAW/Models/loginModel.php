<?php 

include 'conexionModel.php';

/**
 * Esta función se encarga de llamar la función de MySQL IniciarSesion
 * y se le envían los parámetros de correo y contraseña para verificar
 * si los datos se encuentran registrados en la base. Al finalizar se 
 * cierra la instancia.
 * 
 * Parámetros:
 * 
 * $correoElectronico   Almacena el correo electrónico.
 * $contrasenna         Almacena la contraseña.
 * 
 * Return:
 * $res                 Retorna los datos de la base MySQL.
 */
function iniciarSesionModel($correoElectronico,$contrasenna){

    $instancia  = Open();

    $sentencia  = "CALL IniciarSesion('$correoElectronico','$contrasenna');";
    $res        = $instancia -> query($sentencia);

    Close($instancia);
    
    return $res;  //Los datos de la persona 

}

?>  
