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

/**
 * Esta función se encarga de llamar la función de MySQL ActualizarCarrito
 * y se le envían los parámetros de ConsecutivoProducto y CantidadProducto
 * para verificar si los datos se encuentran registrados en la base. Al finalizar se 
 * cierra la instancia.
 * 
 * @param int           $ConsecutivoProducto    Almacena el consecutivo del producto.
 * @param int           $CantidadProducto       Almacena la cantidad de producto.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ActualizarCarritoModel($ConsecutivoProducto, $CantidadProducto){
    $instancia = Open();

    $usuario   = $_SESSION["ConsecutivoUsuario"];   

    $sentencia = "CALL ActualizarCarrito($ConsecutivoProducto, $usuario , $CantidadProducto);"; 
    $instancia -> query($sentencia);

    Close($instancia);
}

/**
 * Esta función se encarga de llamar la función de MySQL ActualizarCarritoPlan
 * y se le envían los parámetros de ConsecutivoProducto y el ConsecutivoUsuario 
 * para verificar si los datos se encuentran registrados en la base. 
 * Al finalizar se cierra la instancia.
 * 
 * @param int           $ConsecutivoProducto    Almacena el consecutivo del Producto.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ActualizarCarritoPlanModel($ConsecutivoProducto){
    $instancia = Open();

    $usuario   = $_SESSION["ConsecutivoUsuario"];   

    $sentencia = "CALL ActualizarCarritoPlan($ConsecutivoProducto, $usuario);"; 
    $instancia -> query($sentencia);

    Close($instancia);
}


?>