<?php 
/**
 * Explicación general de la vista:
 * 
 * verFacturas.php es una vista cuya idea es brindar un resumen general 
 * de la factura que tiene el cliente y esta vista cuenta con lo siguiente:
 * **
 * **   - N° Factura.
 * **   - Fecha de compra.
 * **   - ¢ SubTotal.
 * **   - ¢ Impuesto.
 * **   - ¢ Total.
 * **   - Ver detalle.
 * **
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once" que apunta 
 * a los controladores respectivos que almacenará las funciones que validan la 
 * información.
 * 
 * En el caso de utilitarios.php, almacenará código reutilizable.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
  include_once 'utilitarios.php';
  include_once '../Controllers/usuariosController.php'; 
  include_once '../Controllers/carritoController.php'; 
  include_once '../Controllers/pagosController.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
      MostrarHead();
    ?>

<body>

    <!-- Header Start -->
    <?php
      MostrarPoliticas();
    ?>
    <!-- Header End -->

    <!-- Services Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Productos en el
                    carrito</h2>
            </div>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <table class="table table-hover" style="color:white;">
                            <thead>
                                <tr>
                                    <th># N° Factura</th>
                                    <th>Fecha de Compra</th>
                                    <th>¢ SubTotal</th>
                                    <th>¢ Impuesto</th>
                                    <th>¢ Total</th>
                                    <th>Ver detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    VerFacturas();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
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

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <?php 
      MostrarJS();
    ?>
</body>

</html>