<?php
    include_once 'conexionModel.php';

/**
 * Esta función se encarga de llamar la función de MySQL MostrarCarritoTemporal
 * y se le envía el parámetro de consecutivo de usuario. Con ello se devuelven los datos
 * que tienen coincidencia en el carrito con el usuario.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function MostrarCarritoTemporalModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL MostrarCarritoTemporal('$ConsecutivoUsuario');";
    $res = $instancia -> query($sentencia);

    Close($instancia);
    return $res;
}

/**
 * Esta función se encarga de llamar la función de MySQL MostrarCarritoTotal
 * y se le envía el parámetro de consecutivo de usuario. Con ello se devuelven los datos
 * que tienen coincidencia en el carrito con el usuario.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function MostrarCarritoTotalModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL MostrarCarritoTotal('$ConsecutivoUsuario');";
    $res = $instancia -> query($sentencia);

    Close($instancia);
    return $res;
}

?>