<?php 

include_once 'conexionModel.php';


function buscarUsuarioModel($cedula){

    $instancia = Open();

    $sentencia = "CALL ConsultarCedula('$cedula');";
    $res = $instancia -> query($sentencia);

    Close($instancia);
    return $res;  //Los datos de la persona 

}

function registrarModel($nombre,$apellidos, $cedula, $correoElectronico, $telefono, $contrasenna){
    $instancia = Open();
    
    $sentencia = "CALL RegistrarUsuarios('$nombre','$apellidos', '$cedula', '$correoElectronico', '$telefono', '$contrasenna');";
    $res = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

?> 
