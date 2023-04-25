<?php
/**
 * Explicación general del controlador:
 * 
 * productosController.php es un controlador de las funciones de los productos que están 
 * registrados en la página. En él encontrará las funcionalidades como:
 * *
 * *    - Consultar todos los productos que hay en la tienda.
 * *    - Consultar las características de un producto en específico.
 * *    - Consultar los tipos de productos que ofrece la tienda.
 * *    - Consultar el estado de los productos para ver si están activos o inactivos.
 * *    - CRUD de productos de la tienda y los planes de fidelidad Razer.
 * *
 * Se utiliza include_once para mandar a llamar a las funciones del modelo correspondiente
 * y la idea es que pueda ser utilizado solo si el usuario ha iniciado sesión.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.8
 */
include_once '../Models/productosModel.php';
include_once '../Models/carritoModel.php';

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles 
 * son los productos que están registrados. Si la solicitud devuelve más de cero filas 
 * significa que hubo coincidencias y es por ello que se almacenan en la variable $fila y
 * se procesan los datos según sus nombre en la base de datos. Además dependiendo si es 
 * usuario es Administrador / Cliente o el producto se encuentre activo o inactivo, puede
 * ver un enlace de actualizar o eliminar. 
 * 
 * En el caso de que presione el botón de actualizar se activa una función que envía el 
 * consecutivo a la página actualizarProducto.php, se recibe por medio de un script y se
 * asigna.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.5
 */
function ConsultarProductos(){

    $res = ConsultarProductosModel();

    if($res -> num_rows > 0){
        while($fila = mysqli_fetch_array($res)){
            echo    "<tr>";
            echo    "<td>" . $fila["Nombre_Producto"].  "</td>";
            echo    "<td>" . $fila["Precio"] .          "</td>";
            echo    "<td>" . $fila["RutaImagen"] .      "</td>";
            echo    "<td>" . $fila["Stock"].            "</td>";
            echo    "<td>" . $fila["Estado"].           "</td>";
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

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles 
 * son los datos del producto que tiene el consecutivo que ha sido enviado por parámetro.
 * 
 * @return array                @res                    Devuelve los datos según el 
 *                                                      consecutivo del producto
 * 
 * @author                      Brandon Ruiz Miranda
 * @version                     1.1
 */
function ConsultarProducto($ConsecutivoProducto){
    $res = ConsultarProductoModel($ConsecutivoProducto);
    return mysqli_fetch_array($res);
}

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles
 * son los tipos de productos. Si la solicitud devuelve más de cero filas significa que 
 * encontró coincidencias y es por ello que se almacenan en la variable $fila y se procesan
 * los datos según sus nombre en la base de datos.
 * 
 * Además, en el option se le agrega en value el consecutivo del tipo de producto y se le
 * muestra al usuario el nombre del tipo. De esta manera cuando se envía una solicitud el
 * valor que se obtiene es el consecutivo del producto. Se le agrega un selected para que
 * cuando se abra el desplegable seleccione de una vez el dato que coincide con el registrado.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposProducto($tipoProducto){

    $respuesta = ConsultarTiposProductoModel();

    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            if($tipoProducto == $fila["TipoProducto"]){
            echo "<option selected value=" . $fila["TipoProducto"] . ">" . $fila["NombreTipoProducto"] . "</option>";
            }else{
            echo "<option value=" . $fila["TipoProducto"] . ">" . $fila["NombreTipoProducto"] . "</option>";                
            }
        }
    }
}

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles
 * son los tipos de estado. Si la solicitud devuelve más de cero filas significa que hubo
 * coincidencias y es por ello que se almacenan en la variable $fila y se procesan los datos
 * según sus nombres en la base de datos.
 * 
 * Además, en el option se le agrega en value el consecutivo del tipo de estado y se le 
 * muestra al usuario el nombre del tipo. De esta manera cuando se envía una solicitud el
 * valor que se obtiene es el consecutivo del estado. Se le agrega un selected para que 
 * cuando se abra el desplegable seleccione de una vez el dato que coincide con el registrado.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposEstadoProducto($Estado){

    $respuesta = ConsultarTiposEstadoProductoModel();

    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            if($Estado == $fila["TipoEstado"]){
            echo "<option selected value=" . $fila["TipoEstado"] . ">" . $fila["NombreTipoEstado"] . "</option>";
            }else{
            echo "<option value=" . $fila["TipoEstado"] . ">" . $fila["NombreTipoEstado"] . "</option>";                
            }
        }
    }
}

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para poder 
 * actualizar los datos del producto. Por medio del método POST, se recolecta la 
 * información de los inputs correspondientes y se almacenan en variables locales.
 * 
 * En el caso del adjunto, se recupera por medio de un $_FILES y se almacena en la 
 * dirección dist/img/ + el nombre del archivo y su extensión. Por medio de addslashes
 * se le define un formato que pueda ser interpretado por la base de datos para cuando
 * se quiera buscar en el disco imágenes.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
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

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para poder 
 * registrar los datos del producto. Por medio del método POST, se recolecta la 
 * información de los inputs correspondientes y se almacenan en variables locales.
 * 
 * En el caso del adjunto, se recupera por medio de un $_FILES y se almacena en la 
 * dirección dist/img/ + el nombre del archivo y su extensión. Por medio de addslashes
 * se le define un formato que pueda ser interpretado por la base de datos para cuando
 * se quiera buscar en el disco imágenes.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
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



/**
 * Esta función se encarga de mandar una solicitud a la base de datos para poder 
 * consultar los datos del producto. Y si obtiene coincidencias guarda los datos
 * en un array en la variable $fila. En este caso, si el producto está activo y 
 * el tipo de producto corresponde a 1 (Productos de Tienda), se  muestran los datos
 * según los nombres que se encuentran en la base de datos.
 * 
 * Si una persona quiere comprar uno, le da clic al botón " + " y se agrega el 
 * producto al carrito mandando el consecutivo del producto por medio de una función
 * en un script.  
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function MostrarProductos(){

    $respuesta = ConsultarProductosModel();

    if($respuesta -> num_rows > 0){
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

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para poder consultar
 * los datos del producto. Y si obtiene coincidencias guarda los datos en un array en la
 * variable $fila. En este caso, si el producto está activo y el tipo de producto 
 * corresponde a 2 (Planes de fidelidad), se muestran los datos según los nombres que se
 * encuentran en la base de datos.
 * 
 * Si una persona quiere comprar uno, le da clic al botón " + " y se agrega el producto 
 * al carrito mandando el consecutivo del producto por medio de una función en un script.  
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function MostrarPlanes(){
    
    $respuesta = ConsultarProductosModel();

    if($respuesta -> num_rows > 0){
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

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para actualizar 
 * el carrito con los productos que el cliente agrega. Para ello se le manda el 
 * Consecutivo del Producto y la Cantidad del Producto para más detalle.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST["ActualizarCarrito"])){

    $ConsecutivoProducto    =   $_POST["ConsecutivoProducto"];
    $CantidadProducto       =   $_POST["CantidadProducto"];

    ActualizarCarritoModel($ConsecutivoProducto,$CantidadProducto);
}

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para actualizar 
 * el carrito con los productos que el cliente agrega. Para ello se le manda el Consecutivo
 * de Producto.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST["ActualizarCarritoPlan"])){

    $ConsecutivoProducto    =   $_POST["ConsecutivoProducto"];

    ActualizarCarritoPlanModel($ConsecutivoProducto);
}

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para inactivar 
 * lógicamente un registro de la base de datos cuando se presiona el botón de 
 * inactivar producto.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST["btnInactivarProducto"])){
    
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