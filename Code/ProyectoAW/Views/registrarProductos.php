<?php 
  include_once 'utilitarios.php';
  include_once '../Controllers/productosController.php';
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
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Registrar
                    Productos</h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                <br>
                En este lugar el adminitrador podrá registrar un producto en el servicio web, ya sea como producto de
                tienda o
                un plan de fidelidad.
                <br>
                <br>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body login-card-body">
                                <h4 class="login-box-msg" style="color:#66b933; padding-bottom:50px;">Registro de
                                    información</h4>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Nombre del producto</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="Nombre del producto"
                                                style="text-align:center;" required id="NombreProducto"
                                                name="NombreProducto">
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-6">
                                            <p>Costo</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" onkeypress="return onlyNumberKey(event)"
                                                placeholder="Ingrese el costo del producto" required
                                                id="CostoProducto" name="CostoProducto" style="text-align:center;">
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-6">
                                            <p>Por favor ingrese una imagen del producto de ser necesario. Recuerde que
                                                si es
                                                un producto de tienda debe llevar una imagen para que el cliente pueda
                                                observar
                                                con un mayor detalle qué producto va a comprar.
                                            </p>
                                        </div>
                                        <div class="col-3">
                                            <input type="file" class="form-control" placeholder="Ruta de Imagen"
                                                id="RutaImagen" name="RutaImagen">
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control" placeholder="Perfil" id="Perfil" name="Perfil">
                                                <?php
                                                    ConsultarTiposProducto($datos["TipoProducto"]);
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-6">
                                            <p>Ingrese la cantidad de producto que hay en inventario</p>
                                        </div>
                                        <div class="col-6">
                                            <input onkeypress="return onlyNumberKey(event)" class="form-control" placeholder="Stock" required
                                                id="Stock" name="Stock" style="text-align:center;">
                                        </div> 
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <p>Agregue una descripción del producto o la información del plan</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="Descripción del producto"
                                                style="text-align:center;" required id="Descripcion"
                                                name="Descripcion">
                                        </div>
                                    </div>

                                    <br>
                                    <input type="submit" class="btn btn-primary btn-block" value="Registrar Producto"
                                        id="btnRegistrarProducto" name="btnRegistrarProducto">

                                </form>

                            </div>
                        </div>
                    </div>
            </div>
            </p>
        </div>
        </div>

    </section>
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

<script>
    // función ASCII
    function onlyNumberKey(evt) {

        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="javascripts/validarContrasenna.js"></script>
    <script src="javascripts/funcionesActualizarUsuario.js"></script>
</body>

</html>