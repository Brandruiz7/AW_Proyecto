<?php 

include_once 'conexionModel.php';

function ConsultarProductosModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarProductos();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function ActualizarCarritoModel($ConsecutivoProducto, $CantidadProducto){
    $instancia = Open();

    $usuario   = $_SESSION["ConsecutivoUsuario"];   

    $sentencia = "CALL ActualizarCarrito($ConsecutivoProducto, $usuario , $CantidadProducto);"; 
    $instancia -> query($sentencia);

    Close($instancia);
}

function ActualizarCarritoPlanModel($ConsecutivoProducto){
    $instancia = Open();

    $usuario   = $_SESSION["ConsecutivoUsuario"];   

    $sentencia = "CALL ActualizarCarritoPlan($ConsecutivoProducto, $usuario);"; 
    $instancia -> query($sentencia);

    Close($instancia);
}

function InactivarProductoModel($consecutivo){
    $instancia  = Open();
    
    $sentencia  = "CALL InactivarProducto('$consecutivo');";
    echo          $sentencia;
    $res        = $instancia -> query($sentencia);
    
    Close($instancia);
    return $res;
}

function ConsultarTiposProductoModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTiposProducto();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function ActualizarProductoModel($NombreProducto,$Precio,$RutaImagen, $Stock,$ConsecutivoProducto, $TipoProducto,$Estado){
    $instancia = Open();
    
    $sentencia = "CALL ActualizarProducto('$NombreProducto','$Precio','$RutaImagen',$Stock,$ConsecutivoProducto, $TipoProducto,$Estado);";
    
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function ConsultarProductoModel($consecutivo)
{   
    $instancia = Open();

    // Usuario va en comillas por ser un varchar
    $sentencia = "CALL ConsultarProducto($consecutivo);"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function ConsultarTiposEstadoProductoModel(){
    $instancia = Open();

    $sentencia = "CALL ConsultarTiposEstado();"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

function RegistrarProductosModel($NombreProducto,$Precio,$RutaImagen, $Stock,$TipoProducto,$Descripcion){
    $instancia = Open();

    $sentencia = "CALL RegistrarProductos('$NombreProducto',$Precio,'$RutaImagen', $Stock,$TipoProducto,'$Descripcion');"; 
    $respuesta = $instancia -> query($sentencia);

    Close($instancia);
    return $respuesta;
}

?> 
