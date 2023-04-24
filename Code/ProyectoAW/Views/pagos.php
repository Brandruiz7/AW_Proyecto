<?php 
/**
 * Explicación general de la vista:
 * 
 * mantenimientoUsuario.php es una vista cuya idea es brindar un resumen general de los usuarios 
 * y esta vista cuenta con lo siguiente:
 * **
 * **   - Correo electrónico del usuario.
 * **   - Identificación del usuario.
 * **   - Nombre completo del usuario.
 * **   - Tipo de usuario.
 * **   - Estado.
 * **   - Acciones (Actualizar | Eliminar).
 * **
 * Ahora, en el caso que la persona le dé clic al botón actualizar se enviará el consecutivo 
 * del usuario a la página actualizarUsuario. También hay un modal que se activa cuando se da
 * clic a eliminar, ese mismo almacenará el consecutivo y en caso de confirmar será enviado a 
 * la base de datos para ser procesado y para manejar un orden en el proyecto se agrega un 
 * "include_once" que apunta al del controlador usuario respectivo que almacenará las 
 * funciones que validan la información.
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