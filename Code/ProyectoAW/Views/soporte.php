<?php 
  include_once 'utilitarios.php';
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
      MostrarPoliticas();
    ?>
    <!-- Header Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Centro de soporte Razer
                </h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                ¡Hola! Bienvenido a la página de asistencia de Razer. Aquí encontrarás toda la información que necesitas
                para resolver cualquier problema que puedas tener con tus productos Razer.
                <br><br>
                Nuestro equipo de asistencia está disponible para ayudarte en cualquier momento, a través de diferentes
                canales de comunicación, como chat en línea, correo electrónico y teléfono. Además, también puedes
                acceder a nuestra base de conocimientos, donde encontrarás una gran cantidad de información útil sobre
                nuestros productos y soluciones a problemas comunes.
                <br><br>
                En nuestra sección de descargas, podrás encontrar los controladores y software necesarios para sacar el
                máximo provecho de tus productos Razer. También te ofrecemos la posibilidad de registrar tus productos
                Razer y recibir actualizaciones y noticias exclusivas sobre nuestros últimos lanzamientos.
                <br><br>
                Si tienes algún problema con tu producto Razer, nuestro equipo de asistencia técnica está aquí para
                ayudarte. Nuestros expertos en reparación pueden ayudarte a solucionar cualquier problema técnico que
                puedas tener, y si es necesario, te proporcionaremos una reparación o reemplazo.
            </p>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Blog Section -->
    <section id="blog" class="section" style="background-color: #000000;">
        <!-- Container Starts -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <img src="dist/img/blog/insider.svg" style="max-height: 80px; margin-bottom: 1rem;">
                        </div>
                        <br>
                        <div class="blog-item-text">
                            <h3>
                                <p style="text-align:center; font-size:30px; line-height:120%; color: #66b933;">RAZER
                                    INSIDER</p>
                            </h3>
                            <p style="color: #fff; text-align:center; line-height:30px;">
                                Razer.com es el único lugar donde puedes encontrar manuales de usuario actualizados
                                sobre nuestros equipos,
                                inmediatamente, después de su lanzamiento.
                            </p>
                            <a href="https://insider.razer.com/?utm_source=razer_support&utm_medium=referral&utm_campaign=Razer+Insider&utm_id=new_insider_20230222"
                                class="btn btn-primary2" onclick=alerta();>
                                Ir al sitio Insider
                            </a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <img src="dist/img/blog/question-mark.svg" style="max-height: 80px; margin-bottom: 1rem;">
                        </div>
                        <br>
                        <div class="blog-item-text">
                            <h3>
                                <p style="text-align:center; font-size:30px; line-height:120%; color: #66b933;">
                                    ¿AYUDA PERSONALIZADA?</p>
                            </h3>
                            <p style="color: #fff; text-align:center; line-height:30px;">
                                Como tienda en línea oficial de Razer, tenemos una enorme colección de productos que no
                                podrás encontrar en ningún otro lugar.
                            </p>
                            <a href="contactoPersonalizado.php" class="btn btn-primary2">Contáctanos</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>
            </div>
        </div>
    </section>
    <!-- blog Section End -->

    <!-- testimonial Section Start -->
    <div id="testimonial" class="section" data-stellar-background-ratio="0.1" style="background-color: black;">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="touch-slider owl-carousel owl-theme">
                        <?php
                            MostrarTestimonios();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial Section Start -->

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