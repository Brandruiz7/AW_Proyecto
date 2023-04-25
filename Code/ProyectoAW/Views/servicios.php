<?php 
/**
 * Explicación general de la vista:
 * 
 * servicios.php es una vista cuya idea es mostrar los planes de fidelidad que tiene 
 * la empresa disponible para adquirir (SILVER, GOLD, PLATINUN).
 *  
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
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Nuestros Servicios
                </h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                <p class="section-subtitle2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    Únase a millones de usuarios que disfrutan usando los servicios de Razer para enriquecer su
                    experiencia de juego.
                    <br>
                    Razer Gold and Silver ofrece a los usuarios la ventaja competitiva en cualquier campo de batalla.
                    Use PIN dorados para comprar de nuestra lista de juegos en constante expansión en Gold Webshop.
                    Proteja su equipo con RazerCare y use Razer ID para acceder a los mejores servicios que Razer tiene
                    para ofrecer.
                    <br><br>
                    Desbloquea tu máximo potencial de juego con Razer Services ahora.
                    <br><br>
                    Obtenga una ventaja competitiva y aproveche nuestro soporte, experiencia y comunidad con su Razer
                    ID. Integrado con los servicios y el software de Razer, puede obtener acceso a toneladas de
                    herramientas con su ID de Razer, incluida la compra del mejor equipo para jugadores en nuestro
                    sitio, canjear Razer Silver, guardar sus configuraciones personalizadas en Synapse y más.
                </p>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Start Pricing Table Section -->
    <div id="pricing" class="section pricing-section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Precios por suscripción</h2>
                <hr class="lines">
            </div>

            <div class="row pricing-tables">
                <?php
                    MostrarPlanes();
                ?>
            </div>
        </div>
    </div>
    <!-- End Pricing Table Section -->

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
    function ActualizarCarritoPlan(ConsecutivoProducto) {
        $.ajax({
                type: 'POST',
                url: '../Controllers/productosController.php',
                data: {
                    'ActualizarCarritoPlan': 'ActualizarCarritoPlan',
                    'ConsecutivoProducto': ConsecutivoProducto,
                },
                success: function(res) {
                    alert("Carrito actualizado correctamente");
                    window.location.href = "principal.php";
                }
            }); 
    }
    </script>
</body>

</html>