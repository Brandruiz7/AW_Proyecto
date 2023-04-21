<?php
include_once 'ConexionModel.php';
function ConfirmarPagoModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL ConfirmarPago('$ConsecutivoUsuario');";
    $instancia -> query($sentencia);

    Close($instancia);
}

function VerFacturasModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL VerFacturas('$ConsecutivoUsuario');";
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function VerDetalleFacturasModel($ConsecutivoEncabezado){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL VerDetalleFacturas($ConsecutivoEncabezado,'$ConsecutivoUsuario');";
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

?>