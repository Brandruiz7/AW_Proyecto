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
                    <br>
                    Desbloquea tu máximo potencial de juego con Razer Services ahora.
                    <br>
                    <br>
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
                <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                    dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
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

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <?php 
      MostrarJS();
    ?>
</body>

</html>