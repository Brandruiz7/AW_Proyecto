<?php

include_once '../Models/productosModel.php';

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

/**
 * Se encarga de consultar los usuarios que hay en la base de datos. La idea es
 * que por medio de consultarUsuariosModel, se haga la consulta en la base y 
 * devuelva las coincidencias que existan. Pero esto solo se podrá hacer si ya el usuario
 * se encuentra con la sesión iniciada, porque en el modelo se solicitan las varibles
 * de sesión que se encuentran en loginController.php
 */
function ConsultarProductos(){

    $res = ConsultarProductosModel();

    /**
     * Funcionamiento del if:
     * 
     * Este if verifica si el resultado de la consulta anterior tuvo más de cero
     * filas como respuesta. Si es correcto, entra al if y después a un while que devolverá
     * todas las coincidencias de cada uno de los usuarios que se encuentran registrados en la
     * base de datos y se imprimen en pantalla con un echo.
     * 
     * Si no retorna filas, significa que no hubo coincidencias y redirecciona se muestra el 
     * mensaje por medio de un echo.
     */
    if($res -> num_rows > 0){
        while($fila = mysqli_fetch_array($res)){
            echo    "<tr>";
            echo    "<td>" . $fila["Nombre_Producto"].  "</td>";
            echo    "<td>" . $fila["Precio"] .          "</td>";
            echo    "<td>" . $fila["RutaImagen"] .      "</td>";
            echo    "<td>" . $fila["Stock"].            "</td>";
            echo    "<td>" . $fila["Estado"].           "</td>";
            
            /**
             * Funcionamiento del IF:
             * 
             * Este if recibe la variable de sesión de usuario que ha iniciado sesión 
             * y le muestra los datos según el tipo de usuario (Administrador o cliente). 
             * Después se hace una validación, si el estado del usuario recuperado 
             * anteriormente es Activo, entonce debe mostrar un echo que permita 
             * actualizar y eliminar lógicamente un registro. En caso contrario solo actualizar.
             * 
             * Nota: ?q=" . $fila["ConsecutivoProducto"] . " es para buscar el usuario con el 
             * consecutivo sin cargar la página
             * 
             * Con el onclick='setConsecutivoProducto(this.dataset.id) se envía el consecutivo
             * por medio de la función que está en el sitio donde se llame el <script>
             * 
             */
            if($_SESSION["TipoUsuario"] == 1){
                if($fila["Estado"] == "Activo"){
                    echo    "<td>
                            <a href='../Views/actualizarProducto.php?q=" . $fila["ConsecutivoProducto"] . "'>Actualizar</a> 
                            | <a href='' data-toggle='modal' data-target='#exampleModal2' data-id=". $fila['ConsecutivoProducto'] ." name='btnInactivarProducto' id='btnInactivarProducto'
                            onclick='setConsecutivoProducto(this.dataset.id)'>Eliminar</a>
                            </td>";
                }else{
                    echo    "<td>
                            <a href='../Views/actualizarProducto.php?q=" . $fila["ConsecutivoProducto"] . "'>Actualizar</a>
                            </td>";
                }
            }else{
                echo    "<td>
                        <a href='../Views/actualizarProducto.php?q=" . $fila["ConsecutivoProducto"] . "'>Actualizar</a>
                        </td>"; 
            }
            echo    "</tr>";
        }
    }else{        
        echo "No hay datos";
    }
}

function ConsultarProducto($consecutivo){
    $res = ConsultarProductoModel($consecutivo);
    return mysqli_fetch_array($res);
}

function ConsultarTiposProducto($tipoProducto){
    $respuesta = ConsultarTiposProductoModel();

    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            if($tipoProducto == $fila["TipoProducto"]){
            // El primero es el código interno y el otro es lo que el usuario ve
            echo "<option selected value=" . $fila["TipoProducto"] . ">" . $fila["NombreTipoProducto"] . "</option>";
            }else{
            // El primero es el código interno y el otro es lo que el usuario ve
            echo "<option value=" . $fila["TipoProducto"] . ">" . $fila["NombreTipoProducto"] . "</option>";                
            }

        }
    }
}

function ConsultarTiposEstadoProducto($Estado){
    $respuesta = ConsultarTiposEstadoProductoModel();

    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            if($Estado == $fila["TipoEstado"]){
            // El primero es el código interno y el otro es lo que el usuario ve
            echo "<option selected value=" . $fila["TipoEstado"] . ">" . $fila["NombreTipoEstado"] . "</option>";
            }else{
            // El primero es el código interno y el otro es lo que el usuario ve
            echo "<option value=" . $fila["TipoEstado"] . ">" . $fila["NombreTipoEstado"] . "</option>";                
            }

        }
    }
}

if(isset($_POST["btnActualizarProducto"])){

    $Adjunto = "dist/img/" . $_FILES["RutaImagen"]["name"];
    $NombreProducto         = $_POST["NombreProducto"];
    $Precio                 = $_POST["Precio"];
    $RutaImagen             = addslashes("dist\img\\" . $_FILES["RutaImagen"]["name"]);
    $Stock                  = $_POST["Stock"];
    $ConsecutivoProducto    = $_POST["ConsecutivoProducto"];
    $TipoProducto           = $_POST["Perfil"];
    $Estado                 = $_POST["Estado"];
    move_uploaded_file($_FILES["RutaImagen"]["tmp_name"], $Adjunto);

    $respuesta = ActualizarProductoModel($NombreProducto,$Precio,$RutaImagen, $Stock,$ConsecutivoProducto, $TipoProducto ,$Estado);
    
    if($respuesta == true){
        header("Location: ../Views/mantenimientoProducto.php");
    }
}

if(isset($_POST["btnRegistrarProducto"])){

    $Adjunto = "dist/img/" . $_FILES["RutaImagen"]["name"];
    $NombreProducto         = $_POST["NombreProducto"];
    $Precio                 = $_POST["CostoProducto"];
    $RutaImagen             = addslashes("dist\img\\" . $_FILES["RutaImagen"]["name"]);
    $Stock                  = $_POST["Stock"];
    $TipoProducto           = $_POST["Perfil"];
    $Descripcion            = $_POST["Descripcion"];
    move_uploaded_file($_FILES["RutaImagen"]["tmp_name"], $Adjunto);

    $res = RegistrarProductosModel($NombreProducto,$Precio,$RutaImagen, $Stock,$TipoProducto,$Descripcion);
    
    if($res == true){
        header("Location: ../Views/mantenimientoProducto.php");
    }
}



// Esta función se encargará de mostrar los productos que hay en la base
function MostrarProductos(){
    $respuesta = ConsultarProductosModel();

    // Este if verifica si hay datos en la consulta anterior
    if($respuesta -> num_rows > 0){
        // Se imprimen los datos mientras haya respuesta de la consulta
        while($fila = mysqli_fetch_array($respuesta)){
            if($fila["Estado"]=="Activo"){
                if($fila["TipoProducto"]==1){
                echo '
                    <div class="col-md-4 col-sm-6 col-12 pricing-table2">
                        <div>
                            <span class="info-box-icon">
                                <img style="width:300px; height:300px;"src="'. $fila["RutaImagen"] .'" /> <br><br>          
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="font-size:25px;">'. $fila["Nombre_Producto"] .'   -   ₡'. number_format($fila["Precio"]) .'</span><br>
                                <span class="progress-description"> Unidades: '. $fila["Stock"] .'</span><br><br>';
                                
                                if(session_status() != PHP_SESSION_NONE){
                                echo'
                                <div class="input-group mb-3" style="width:100%";>
                                    <input style="margin-left:15px;" type="text" class="form-control" placeholder="Cantidad" onkeypress="return onlyNumberKey(event)" maxlength="2" required id="Cantidad-'. $fila["ConsecutivoProducto"] . '">
                                    <div class="input-group-append" style="width:15%">
                                        <div class="input-group-text" onclick="ActualizarCarrito('. $fila["ConsecutivoProducto"] . ',' . $fila["Stock"] . ')">
                                            <span style="font-size:24px; font-weight:bold;"> + </span>
                                        </div>
                                    </div>
                                </div>';
                                }
                            echo'
                            </div>
                        </div>
                    </div>';
                }
            } 
        }
    }

}

function MostrarPlanes(){
    $respuesta = ConsultarProductosModel();

    // Este if verifica si hay datos en la consulta anterior
    if($respuesta -> num_rows > 0){
        // Se imprimen los datos mientras haya respuesta de la consulta
        
        while($fila = mysqli_fetch_array($respuesta)){
            if($fila["Estado"]=="Activo"){
                if($fila["TipoProducto"]==2){
                    echo '
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="pricing-table">
                            <div class="pricing-details">
                                <h2>'. $fila["Nombre_Producto"] .'</h2>
                                <span>₡'. number_format($fila["Precio"]) .'</span>
                                <ul style="text-align:justify;">
                                '. $fila["Descripcion"] .'
                                </ul>
                            </div>';
                            if(session_status() != PHP_SESSION_NONE){
                                echo'
                                <div onclick="ActualizarCarritoPlan('. $fila["ConsecutivoProducto"] . ')">
                                    <span class="btn btn-common" style="font-size:12px; font-weight:bold;"> Comprar</span>
                                </div>';
                            }
                            echo'    
                        </div>
                    </div>           
                    ';
                }
            
            }
        }
    }

}


if(isset($_POST["ActualizarCarrito"])){

    $ConsecutivoProducto    =   $_POST["ConsecutivoProducto"];
    $CantidadProducto       =   $_POST["CantidadProducto"];

    ActualizarCarritoModel($ConsecutivoProducto,$CantidadProducto);
}

if(isset($_POST["ActualizarCarritoPlan"])){

    $ConsecutivoProducto    =   $_POST["ConsecutivoProducto"];

    ActualizarCarritoPlanModel($ConsecutivoProducto);
}

// Permite inactivar un registro mientras se presione el btnInactivar
if(isset($_POST["btnInactivarProducto"])){
    
    // Si recibe un consecutivo entra al if y ejecuta los pasos.
    if(isset($_POST["Consecutivo"])){
        $res = InactivarProductoModel($_POST["Consecutivo"]);
        if($res){
            echo "El usuario se desactivó";
        }
        else{
            echo "Hubo un error desactivando el usuario";
        }
    }
}

?>