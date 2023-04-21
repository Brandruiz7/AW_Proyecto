<?php
    include_once '../Models/carritoModel.php';

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

function MostrarCarritoTemporal(){
    $res = MostrarCarritoTemporalModel();

    if($res -> num_rows > 0){
        $datosCarrito = mysqli_fetch_array($res);
        $_SESSION["CantidadTemporal"] = $datosCarrito["CantidadTemporal"];
        $_SESSION["MontoTemporal"] = $datosCarrito["MontoTemporal"];
    }
}

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