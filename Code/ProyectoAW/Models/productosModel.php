<?php 

include_once 'conexionModel.php';


/**
 * Esta función se encarga de llamar la función de MySQL ConsultarProductos. Con ello
 * se devuelven los datos todos los datos que están registrados en la tabla producto.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarProductosModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarProductos();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
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

/**
 * Esta función se encarga de llamar la función de MySQL InactivarProducto
 * y se le envían los parámetros de ConsecutivoProducto para verificar si los datos 
 * se encuentran registrados en la base. Al finalizar se cierra la instancia.
 * 
 * @param string        $ConsecutivoProducto    Almacena el consecutivo del Producto.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function InactivarProductoModel($ConsecutivoProducto){
    $instancia  = Open();
    
    $sentencia  = "CALL InactivarProducto('$ConsecutivoProducto');";
    echo          $sentencia;
    $res        = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarTiposProducto
 * y con ello se devuelven los datos de la tabla tipos de producto y devuelve las
 * coincidencias.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposProductoModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTiposProducto();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL ActualizarProducto
 * y se le envían los parámetros para verificar si los datos se encuentran 
 * registrados en la base. Al finalizar se cierra la instancia.
 * 
 * @param string        $NombreProducto         Almacena el nombre del producto.
 * @param int           $Precio                 Almacena el precio dle producto.
 * @param string        $RutaImagen             Almacena el almacena la ruta de imagen.
 * @param int           $Stock                  Almacena el cantidad disponible.
 * @param int           $ConsecutivoProducto    Almacena el consecutivo del producto.
 * @param int           $TipoProducto           Almacena el consecutivo del tipo de producto.
 * @param int           $Estado                 Almacena el consecutivo del estado.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ActualizarProductoModel($NombreProducto,$Precio,$RutaImagen, $Stock,$ConsecutivoProducto, $TipoProducto,$Estado){
    $instancia = Open();
    
    $sentencia = "CALL ActualizarProducto('$NombreProducto','$Precio','$RutaImagen',$Stock,$ConsecutivoProducto, $TipoProducto,$Estado);";
    
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarProducto
 * y se le envía el parámetro de ConsecutivoProducto para verificar si los 
 * datos se encuentran registrados en la base. Al finalizar se cierra la instancia.
 * 
 * @param string        $ConsecutivoProducto    Almacena el consecutivo del producto.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarProductoModel($ConsecutivoProducto){   
    $instancia = Open();

    $sentencia = "CALL ConsultarProducto($ConsecutivoProducto);"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL ConsultarTiposEstado. Con
 * ello se devuelven los datos que tienen coincidencia en el carrito con el usuario.
 * 
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposEstadoProductoModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTiposEstado();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

/**
 * Esta función se encarga de llamar la función de MySQL RegistrarProductos
 * y se le envían los parámetros para verificar si los datos se encuentran 
 * registrados en la base. Al finalizar se cierra la instancia.
 * 
 * @param string        $NombreProducto         Almacena el nombre del producto.
 * @param int           $Precio                 Almacena el precio dle producto.
 * @param string        $RutaImagen             Almacena el almacena la ruta de imagen.
 * @param int           $Stock                  Almacena el cantidad disponible.
 * @param int           $TipoProducto           Almacena el consecutivo del tipo de producto.
 * @param string        $Descripcion            Almacena la descripción del producto.
 * @return              $res                    Retorna los datos de la base MySQL.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function RegistrarProductosModel($NombreProducto,$Precio,$RutaImagen, $Stock,$TipoProducto,$Descripcion){
    $instancia = Open();

    $sentencia = "CALL RegistrarProductos('$NombreProducto',$Precio,'$RutaImagen', $Stock,$TipoProducto,'$Descripcion');"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

?> 
