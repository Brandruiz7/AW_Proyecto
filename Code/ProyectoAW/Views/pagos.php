<?php 
/**
 * Explicación general de la vista:
 * 
 * pagos.php es una vista cuya idea es brindar un resumen general del carrito que tiene el 
 * cliente y esta vista cuenta con lo siguiente:
 * **
 * **   - Consecutivo del producto.
 * **   - Cantidad.
 * **   - Precio.
 * **   - Subtotal.
 * **   - Impuesto.
 * **   - Total.
 * **   - Procesar pago.
 * **
 * Ahora, en el caso que la persona le dé clic al botón de procesar pago se enviará 
 * los datos del carrito a la vista que genera la factura y se envía al cliente por correo.
 * Para manejar un orden en el proyecto se agrega un "include_once" que apunta a los 
 * controladores respectivos que almacenarán las funciones que validan la información.
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
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>¢ Precio</th>
                                    <th>¢ SubTotal</th>
                                    <th>¢ Impuesto</th>
                                    <th>¢ Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    MostrarCarritoTotal();
                                ?>
                            </tbody>
                        </table>
                        <br><br>
                        <?php              
                            if($_SESSION["MontoTemporal"] != 0){
                                echo '
                                <form action="facturaGenerada.php" method="POST">
                                    <div class="section-header">
                                        <input type="submit" value="Procesar Pago" class="btn2 btn-warning" id="btnProcesarPago"
                                            name="btnProcesarPago" style="font-size: 18px;">
                                        </input>
                                    </div>
                                </form>';
                            }
                        ?>
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