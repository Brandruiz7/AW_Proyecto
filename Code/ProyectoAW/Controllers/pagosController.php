<?php
/**
 * Explicación general del controlador:
 * 
 * pagosController.php es un controlador de las funciones de los pagos que se realizan en la página. 
 * En él encontrará las funcionalidades como:
 * *
 * *    - Ver el encabezado de facturas registradas por el usuario.
 * *    - Ver las facturas registradas por el usuario.
 * *
 * Se utiliza include_once para mandar a llamar a las funciones del modelo correspondiente
 * y la idea es que pueda ser utilizado solo si el usuario ha iniciado sesión.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
include_once('../Models/pagosModel.php');

if (session_status() == PHP_SESSION_NONE){
    session_start();
}
    
/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles son las
 * facturas que tiene registradas el usuario que ha iniciado sesión. Los datos si tiene más de cero
 * coincidencias significa que sí tiene datos en el encabezado de factura y dichos datos se procesan
 * según el nombre respectivo en la base de datos en una tabla.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function VerFacturas(){
    $respuesta = VerFacturasModel();
    
    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            echo "<tr>";
            echo "<td>" . $fila["ConsecutivoEncabezado"] . "</td>";
            echo "<td>" . $fila["FechaCompra"] . "</td>";
            echo "<td>" . number_format($fila["SubTotal"], 2) . "</td>";
            echo "<td>" . number_format($fila["IVA"], 2) . "</td>";
            echo "<td>" . number_format($fila["Total"], 2) . "</td>";
            echo "<td> <a href='../Views/verDetalleFactura.php?q=" . $fila["ConsecutivoEncabezado"] . "'>Ver detalle</a></td>";
            echo "</tr>";
        }
    }
}

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer el detalle de las
 * facturas que tiene registradas el usuario que ha iniciado sesión. En este caso se le envía como 
 * parámetro el consecutivo del encabezado porque puede que el usuario tenga varias facturas. 
 * Después, los datos si tiene más de cero coincidencias significa que sí tiene datos en el encabezado
 * de factura y dichos datos se procesan según el nombre respectivo en la base de datos en una tabla.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function VerDetalleFacturas($ConsecutivoEncabezado){
    $respuesta = VerDetalleFacturasModel($ConsecutivoEncabezado);
    
    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            echo "<tr>";
            echo "<td>" . $fila["ConsecutivoEncabezado"] . "</td>";
            echo "<td>" . $fila["Nombre_Producto"] . "</td>";
            echo "<td>" . $fila["Cantidad"] . "</td>";
            echo "<td>" . number_format($fila["Precio"], 2) . "</td>";
            echo "<td>" . number_format($fila["SubTotal"], 2) . "</td>";
            echo "<td>" . number_format($fila["IVA"], 2) . "</td>";
            echo "<td>" . number_format($fila["Total"], 2) . "</td>";
            echo "<td>" . $fila["FechaCompra"] . "</td>";
            echo "</tr>";
        }
    }
}

?>