<?php 
  include 'utilitarios.php';
  include_once '../Controllers/usuariosController.php';  
?>
<!DOCTYPE html>
<html lang="en">
<?php 
      MostrarHead();
   ?>

<body>

    <!-- Header Section Start -->
    <?php
      MostrarHeader();
    ?>
    <!-- Header Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Términos y
                    condiciones</h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
            <br>
            1. Introducción
            Bienvenido a Mate, una página web de venta de licencias de software de diseño. Al acceder y utilizar
            esta página web, aceptas los términos y condiciones de uso que se describen a continuación. Por favor,
            lee estos términos y condiciones detenidamente antes de utilizar la página web de Mate.
            <br>
            <br>
            2. Licencia de uso
            Mate es un sitio web que vende licencias de software de diseño. Al adquirir una licencia de software a
            través de Mate, se te concede una licencia limitada, no exclusiva e intransferible para utilizar el software
            de acuerdo con los términos y condiciones de uso del proveedor de software. La licencia que adquieras será
            única y personal para ti y no podrás transferirla o cederla a terceros.
            <br>
            <br>
            3. Precios y pagos
            El precio de las licencias de software se indica en la página web de Mate. Los precios pueden estar sujetos
            a cambios sin previo aviso. Al comprar una licencia de software, aceptas pagar el precio indicado en la
            página web de Mate en el momento de la compra. Mate utiliza una plataforma de pago seguro para procesar
            todas las transacciones.
            <br>
            <br>
            4. Información de la cuenta
            Para comprar licencias de software de diseño en nuestro sitio web, deberá crear una cuenta con su
            información personal y de pago. Usted es responsable de mantener la confidencialidad de su información de
            cuenta y contraseña, y es responsable de todas las actividades que ocurran bajo su cuenta.
            <br>
            <br>
            5. Política de reembolso
            No se permiten devoluciones o reembolsos de las licencias de software de diseño compradas en nuestro sitio
            web, a menos que se indique lo contrario. Si hay un problema con su licencia de software de diseño,
            contáctenos y haremos todo lo posible para solucionarlo.
            <br>
            <br>
            6. Propiedad intelectual
            Los derechos de propiedad intelectual, incluidos los derechos de autor, marcas comerciales y patentes, en el
            contenido de nuestro sitio web y el software de diseño que vendemos, son propiedad de Mate
            o sus respectivos propietarios. Usted no puede utilizar este contenido sin nuestro permiso previo por
            escrito.
            <br>
            <br>
            7. Ley aplicable
            Estos términos y condiciones se rigen e interpretan de acuerdo con las leyes del Costa Rica y se
            someten a la jurisdicción exclusiva de los tribunales de San José.

            Si tiene alguna pregunta sobre estos términos y condiciones, por favor contáctenos en pruebaPAW@outlook.com.

            Fecha de la última actualización: 23 de Marzo de 2023.
            </p>

        </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Start Pricing Table Section -->
    <div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Precios por suscripción</h2>
          <hr class="lines">
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
        </div>

        <div class="row pricing-tables">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Free</h2>
                <span>$00</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Lo quiero</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Popular</h2>
                <span>$39.99</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Comprar ahora</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Premium</h2>
                <span>$59.99</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Comprar ahora</a>
              </div>
            </div>
          </div>

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
