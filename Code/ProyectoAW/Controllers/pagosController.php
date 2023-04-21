<?php
    include_once('../Models/pagosModel.php');

    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    function VerFacturas(){
        $respuesta = VerFacturasModel();
    
        if($respuesta -> num_rows > 0)
        {
            while($fila = mysqli_fetch_array($respuesta))
            {
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

    function VerDetalleFacturas($ConsecutivoEncabezado){
        $respuesta = VerDetalleFacturasModel($ConsecutivoEncabezado);
    
        if($respuesta -> num_rows > 0)
        {
            while($fila = mysqli_fetch_array($respuesta))
            {
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