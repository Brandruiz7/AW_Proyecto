<?php
    include_once 'conexionModel.php';

function MostrarCarritoTemporalModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL MostrarCarritoTemporal('$ConsecutivoUsuario');";
    $res = $instancia -> query($sentencia);

    Close($instancia);
    return $res;
}

function MostrarCarritoTotalModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL MostrarCarritoTotal('$ConsecutivoUsuario');";
    $res = $instancia -> query($sentencia);

    Close($instancia);
    return $res;
}

?>