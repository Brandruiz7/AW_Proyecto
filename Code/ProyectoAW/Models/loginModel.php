<?php 

include 'conexionModel.php';

function iniciarSesionModel($correoElectronico,$contrasenna){

    $instancia = Open();

    $sentencia = "CALL IniciarSesion('$correoElectronico','$contrasenna');";
    $res = $instancia -> query($sentencia);

    Close($instancia);
    
    return $res;  //Los datos de la persona 

}

?>  
