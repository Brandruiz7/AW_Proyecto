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
      MostrarSobreNosotros();
    ?>
    <!-- Header Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Sobre Nosotros
                </h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                La marca de la serpiente de tres cabezas de Razer es uno de los logotipos más reconocidos en las
                comunidades de juegos y deportes electrónicos a nivel mundial. Con una base de fans que se extiende por
                todos los continentes, la compañía ha diseñado y construido el ecosistema centrado en los jugadores más
                grande del mundo, compuesto por hardware, software y servicios.
                <br><br>
                El hardware galardonado de Razer incluye periféricos de juego de alto rendimiento y portátiles de juego
                Blade.
                <br>
                La plataforma de software de Razer, con más de 175 millones de usuarios, incluye Razer Synapse (una
                plataforma de Internet de las cosas), Razer Chroma RGB (un sistema de tecnología de iluminación RGB
                propietaria que admite miles de dispositivos y cientos de juegos/aplicaciones) y Razer Cortex (un
                optimizador y lanzador de juegos).
                <br>
                Razer también ofrece servicios de pago para jugadores, jóvenes, millennials y la Generación Z. Razer
                Gold es uno de los servicios de pago de juegos más grandes del mundo, y Razer Fintech proporciona
                servicios financieros en mercados emergentes.
                <br>
                Fundada en 2005, Razer tiene su sede dual en Irvine (California) y Singapur, con sedes regionales en
                Hamburgo y Shanghái. Razer tiene 19 oficinas en todo el mundo y es reconocida como la marca líder para
                los jugadores en EE. UU., Europa y China.
                <br><br>
                Distinciones:
                <br>
                <br>
                En 2021:
                <br>
                Razer se lleva el Best of CES por novena vez, y también presenta el diseño conceptual del proyecto
                Hazel, la mascarilla inteligente más inteligente y amigable socialmente del mundo.
                <br>
                Razer presenta la nueva tecnología de HyperPolling de 8 KHz para alimentar el Razer Viper 8K, el mouse
                de juego más rápido del mundo.
                <br>
                Bajo el lema #GoGreenWithRazer, Razer se compromete a una hoja de ruta de sostenibilidad de 10 años para
                un futuro más verde y sostenible para que todos puedan jugar.
                <br>
                Razer celebra el primer Razer DevCon para impulsar la innovación de la industria y la integración de
                funciones de vanguardia en todo el ecosistema de Razer, acercando a los desarrolladores a los jugadores.
                <br>
                En E3 2021, Razer encabeza la exhibición de juegos más grande del mundo con una presentación interactiva
                de realidad extendida.
                <br>
                <br>
                El Razer Blade 14 vuelve como el portátil de juego de 14 pulgadas más potente del mundo, y es el primer
                Blade que presenta un procesador AMD.
                Razer Gold sigue siendo el crédito virtual líder para jugadores de todo el mundo, con más de 28 millones
                de usuarios registrados. Con una red de cerca de 6 millones de puntos de contacto de canales, los
                usuarios pueden comprar y usar fácilmente Razer Gold en más de 42 000 juegos y títulos de
                entretenimiento. Además, con cada gasto de Razer Gold, los usuarios ganan Razer Silver, el único
                programa de recompensas de lealtad diseñado para jugadores. Con la expansión del programa de recompensas
                Razer Silver, los usuarios ahora disfrutan de más formas de ganar y canjear Silver en categorías como
                hardware, juegos y entretenimiento de Razer.
            </p>

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

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <?php 
      MostrarJS();
    ?>
</body>

</html>