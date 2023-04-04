<?php 

include_once 'conexionModel.php';

function consultarProductosModel()
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


?> 
