<?php
/**
 * Explicación general del controlador:
 * 
 * carritoController.php es un controlador de las funciones del carrito de compras de la
 * página. En él encontrará las funciones como:
 * *
 * *    - MostrarCarritoTemporal.
 * *    - MostrarCarritoTotal.
 * *
 * Se utiliza include_once para mandar a llamar a las funciones del modelo correspondiente
 * y la idea es que pueda ser utilizado solo si el usuario ha iniciado sesión.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
    include_once '../Models/carritoModel.php';

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

/**
 * Esta función se encarga de mandar una solicitud al modelo para consulta el carrito
 * que tiene actualmente el usuario. Los datos se reciben y se almacenan en variables 
 * de SESSION.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function MostrarCarritoTemporal(){
    $res = MostrarCarritoTemporalModel();

    if($res -> num_rows > 0){
        $datosCarrito = mysqli_fetch_array($res);
        $_SESSION["CantidadTemporal"] = $datosCarrito["CantidadTemporal"];
        $_SESSION["MontoTemporal"] = $datosCarrito["MontoTemporal"];
    }
}

/**
 * Esta función se encarga de mandar una solicitud al modelo para consulta el carrito total
 * que tiene actualmente el usuario. Los datos que se reciben son almacenados en un array y
 * procesados en una tabla. Además se almacena el total de la compra.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function MostrarCarritoTotal(){
    $res = MostrarCarritoTotalModel();

    if($res -> num_rows > 0){
        $totalizado = 0;
        while($fila = mysqli_fetch_array($res)){
            $totalizado = $totalizado + $fila["Total"];

            echo "<tr>";
            echo "<td>" . $fila["Nombre_Producto"] . "</td>";
            echo "<td>" . $fila["Cantidad"] . "</td>";
            echo "<td>" . number_format($fila["Precio"], 2) . "</td>";
            echo "<td>" . number_format($fila["SubTotal"], 2) . "</td>";
            echo "<td>" . number_format($fila["Impuesto"], 2) . "</td>";
            echo "<td>" . number_format($fila["Total"], 2) . "</td>";
            echo "</tr>";
        }
        echo "<tr style='font-weight:bold; font-size:14pt;'>";
        echo "<td style='text-align:right' colspan='5'> <br><br> Total:</td>";
        echo "<td style='text-align:left'> <br><br>"  . number_format($totalizado, 2) . "</td>";
        echo "</tr>";

    }
}



?>