<?php 
/**
 * Explicación general de la vista:
 * 
 * actualizarProducto.php es una vista especial que solo tiene acceso el administrador.
 * La idea es brindar un resumen general de los datos y es por ello que tiene lo siguiente:
 * **
 * **   - Nombre del producto.
 * **   - Nombre completo registrado.
 * **   - Correo electrónico.
 * **   - Contraseña y confirmar contraseña.
 * **   - Número de teléfono.
 * **
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once"  que apunta al
 * del controlador productos respectivo que almacenará las funciones que validan la información
 * del producto mostrado y el tipo de que es. También recibe los datos que se han modificado
 * y los envía en POST cuando se da clic en el botón de actualizar.
 * 
 * Los datos que se muestran en la página se consultan en la base de datos y se almacena en un array 
 * en la variable $datos, de esa manera se puede obtener la información del cliente y se distribuye 
 * en los value de los respectivos input. Esto es gracias a la recuperación del consecutivo que ha 
 * sido mandado de mantenimientoProducto.php
 * 
 * En el caso de utilitarios.php, almacenará código reutilizable.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.5
 */
  include_once 'utilitarios.php';
  include_once '../Controllers/productosController.php';
  $datos = ConsultarProducto($_GET["q"]);
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
      MostrarHead();
    ?>

<body>

    <!-- Header Section Start -->
    <?php
      MostrarHeaderAdicionales();
    ?>
    <!-- Header Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Mantenimiento
                    Producto</h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                <br>
                Esta página está designada para poder actualizar a los productos que tiene registrada la marca de la
                serpiente de tres cabezas. Por favor asegúrese de realizar los cambios siguiendo la normativa interna de
                la institución.
                <br>
                <br>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body login-card-body">
                                <h4 class="login-box-msg" style="color:#66b933">Actualizar Información de Producto</h4>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="ConsecutivoProducto" name="ConsecutivoProducto"
                                        value="<?php echo $datos["ConsecutivoProducto"] ?>">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Nombre del producto"
                                               readonly required id="NombreProducto" name="NombreProducto"
                                                value="<?php echo $datos["Nombre_Producto"] ?>">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Precio" id="Precio"
                                                name="Precio" value="<?php echo $datos["Precio"] ?>">
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" placeholder="Estado" required id="Estado"
                                                name="Estado">
                                                <?php
                                                    ConsultarTiposEstadoProducto($datos["Estado"]);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="file" class="form-control" placeholder="Ruta de Imagen"
                                                id="RutaImagen" name="RutaImagen"
                                                value="<?php echo $datos["RutaImagen"] ?>">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Stock" required
                                                id="Stock" name="Stock" value="<?php echo $datos["Stock"] ?>">
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" placeholder="Perfil" required id="Perfil"
                                                name="Perfil">
                                                <?php
                                                    ConsultarTiposProducto($datos["TipoProducto"]);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-block" value="Actualizar"
                                        id="btnActualizarProducto" name="btnActualizarProducto">

                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            </p>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Contact Section Start and Footer-->
    <?php 
        MostrarContactUs();
        MostrarFooter();
    ?>
    <!-- Footer Section End -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <?php 
      MostrarJS();
    ?>
    <script src="javascripts/funcionesActualizarUsuario.js"></script>
</body>

</html>