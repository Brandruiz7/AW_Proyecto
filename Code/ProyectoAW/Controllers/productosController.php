<?php

include_once '../Models/productosModel.php';

function consultarProductos(){

    //Los datos recibidos se pasan al modelo y luego van a la base de datos
    $res = consultarProductosModel();

    if($res -> num_rows > 0){
        // Se extrae los datos y se guarda en el array según las posiciones
        while($fila = mysqli_fetch_array($res)){
            echo    "<tr>";
            echo    "<td>" . $fila["CorreoElectronico"].    "</td>";
            echo    "<td>" . $fila["Cedula"] .              "</td>";
            echo    "<td>" . $fila["Nombre"] .              "</td>";
            echo    "<td>" . $fila["Apellidos"] .              "</td>";
            echo    "<td>" . $fila["NombreTipoUsuario"].    "</td>";
            echo    "<td>" . $fila["Estado"].               "</td>";

            // ?q=" . $fila["ConsecutivoUsuario"] . " es para buscar el usuario con el consecutivo sin cargar la página
            if($_SESSION["TipoUsuario"] == 1){
                if($fila["Estado"] == "Activo"){
                    echo    "<td>
                            <a href='../Views/actualizarUsuario.php?q=" . $fila["ConsecutivoUsuario"] . "'>Actualizar</a> 
                            | <a href='' data-toggle='modal' data-target='#exampleModal' data-id=". $fila['ConsecutivoUsuario'] ." name='btnDesactivar' id='btnDesactivar'
                            onclick='setConsecutivoUsuario(this.dataset.id)'>Eliminar</a>
                            </td>";
                }else{
                    echo    "<td>
                            <a href='../Views/actualizarUsuario.php?q=" . $fila["ConsecutivoUsuario"] . "'>Actualizar</a>
                            </td>";
                }
            }else{
                echo    "<td>
                        <a href='../Views/actualizarUsuario.php?q=" . $fila["ConsecutivoUsuario"] . "'>Actualizar</a>
                        </td>"; 
            }
            echo    "</tr>";
        }
    }else{        
        echo "No hay datos";
    }
}

function MostrarProductos()
{
    $respuesta = ConsultarUsuariosModel();

    if($respuesta -> num_rows > 0)
    {
        while($fila = mysqli_fetch_array($respuesta))
        {
            echo '
                <div class="col-md-4 col-sm-6 col-12 pricing-table2">
                    <div>
                        <span class="info-box-icon">
                            <img src="dist\img\headset.jpg" />           
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">'. $fila["CorreoElectronico"] .'</span>
                            <span class="info-box-number">41,410</span>
                            <span class="progress-description">
                                70% Increase in 30 Days
                            </span>
                        </div>
                    </div>
                </div>
                    
                    
                ';
        }
    }

}

if(isset($_POST["btnInactivar"])){
    if(isset($_POST["Consecutivo"])){
        $res = actualizarDatosModel($_POST["Consecutivo"]);
        if($res){
            echo "El usuario se desactivó";
        }
        else{
            echo "Hubo un error desactivando el usuario";
        }
    }
}

?>