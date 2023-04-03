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

    <!-- Header Start -->
    <?php
      MostrarTienda();
    ?>
    <!-- Header End -->

    <!-- Features Section Start -->
    <section id="features" class="section" data-stellar-background-ratio="0.2" style="padding-top:150px;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">ACÉRCATE AL MUNDO DE LOS PROFESIONALES</h2>
                <hr class="lines">
                <p class="section-subtitle">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                dignissimos!
                <br>
                Lorem ipsum dolor sit amet, consectetur.
                </p>
            </div>
        </div>
    </section>
    <!-- Features Section End -->



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