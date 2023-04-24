<?php 

include 'conexionModel.php';

/**
 * Esta función se encarga de llamar la función de MySQL IniciarSesion
 * y se le envían los parámetros de correo y contraseña para verificar
 * si los datos se encuentran registrados en la base. Al finalizar se 
 * cierra la instancia.
 * 
 * @param string        $correoElectronico      Almacena el correo electrónico.
 * @param string        $contrasenna            Almacena la contraseña.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function iniciarSesionModel($correoElectronico,$contrasenna){

    $instancia  = Open();

    $sentencia  = "CALL IniciarSesion('$correoElectronico','$contrasenna');";
    $res        = $instancia -> query($sentencia);

    Close($instancia);
    
    return $res;

}

?>  
