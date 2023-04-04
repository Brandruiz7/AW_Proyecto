<?php 

include_once 'conexionModel.php';

function consultarUsuariosModel()
{   
    $instancia = Open();
    
    $usuario = $_SESSION["CorreoElectronico"];
    $tipoUsuario = $_SESSION["TipoUsuario"];

    // Usuario va en comillas por ser un varchar
    $sentencia = "CALL ConsultarUsuarios('$usuario','$tipoUsuario');"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function actualizarDatosModel($consecutivo){
    $instancia = Open();
    
    $sentencia = "CALL ActualizarDatos('$consecutivo');";
    echo $sentencia;
    $res = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

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
