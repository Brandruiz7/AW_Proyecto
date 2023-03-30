<?php 

// Datos necesarios para entrar a la base de datos
function Open(){
    $servidor = "127.0.0.1: 3307"; //Localhost: (Servidor de MySQL de Xampp)
    $usuario = "root";
    $contrasenna = "";
    $baseDatos = "proyecto_aw_mn";
    
    return mysqli_connect($servidor, $usuario, $contrasenna, $baseDatos);
}

// Cerrar la instancia de la base
function Close($instancia){
    mysqli_close($instancia);
}

?>