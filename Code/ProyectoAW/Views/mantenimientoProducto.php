<?php 
  include 'utilitarios.php';
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
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Mantenimiento
                    Productos</h2>
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
            </p>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr class="mantenimiento">
                                    <th>Nombre Producto</th>
                                    <th>Precio</th>
                                    <th>Ruta de la Imagen</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            <tbody class="mantenimiento">
                                <?php 
                                    ConsultarProductos();
                                ?>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </section>
            </div>

            <form action="" method="post">
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¡Atención!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Está completamente seguro?
                                <input type="hidden" id="consecutivoProducto" name="consecutivoProducto">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" value="true" name="btnInactivarProducto"
                                    id="btnInactivarProducto" onclick="confirmarInactivacion()">Inactivar producto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </section>
    <!-- Services Section End -->


    <!-- Contact Section Start and Footer-->
    <?php 
      MostrarContactUs();
      MostrarFooter();
    ?>
    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="lnr lnr-arrow-up"></i>
    </a>

    <div id="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <?php 
      MostrarJS();
    ?>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="javascripts/inactivarProducto.js"></script>
    <script>
    function setConsecutivoProducto(id) {
        document.getElementById('consecutivoProducto').value = id;
    }
    </script>
</body>

</html>