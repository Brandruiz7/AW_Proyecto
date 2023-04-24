<?php
include_once 'ConexionModel.php';

/**
 * Esta función se encarga de llamar la función de MySQL ConfirmarPago y
 * se le envía el parámetro de consecutivo de usuario. Con ello se devuelven los datos
 * que tienen coincidencia en el pago con el usuario.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConfirmarPagoModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL ConfirmarPago('$ConsecutivoUsuario');";
    $instancia -> query($sentencia);

    Close($instancia);
}

/**
 * Esta función se encarga de llamar la función de MySQL VerFacturas y se le envía 
 * el parámetro de consecutivo de usuario. Con ello se devuelven los datos
 * que tienen coincidencia en Facturas con el usuario.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function VerFacturasModel(){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL VerFacturas('$ConsecutivoUsuario');";
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL VerDetalleFacturas
 * y se le envían los parámetros de ConsecutivoEncabezado y ConsecutivoUsuario
 * para verificar si los datos se encuentran registrados en la base. Al finalizar se 
 * cierra la instancia.
 * 
 * @param int           $ConsecutivoEncabezado  Almacena el consecutivo del encabezado.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function VerDetalleFacturasModel($ConsecutivoEncabezado){
    $instancia = Open();
    $ConsecutivoUsuario = $_SESSION["ConsecutivoUsuario"];

    $sentencia = "CALL VerDetalleFacturas($ConsecutivoEncabezado,'$ConsecutivoUsuario');";
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

?>