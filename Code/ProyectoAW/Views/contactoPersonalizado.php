<?php 
/**
 * Explicación general de la vista:
 * 
 * contactoPersonalizado.php es una vista cuya idea es brindar un resumen general del soporte y 
 * esta vista cuenta con lo siguiente:
 * **
 * **   - Introducción breve del la página.
 * **   - Un código QR que redirecciona al WhatsApp.
 * **   - Un enlace de WhatsApp con el link del administrador
 * **
 * Ahora, en el caso que la persona le dé clic al enlace se mostrará una alerta de salida del 
 * sitio y para manejar un orden en el proyecto se agrega un "include_once" que apunta al
 * del controlador usuarios respectivo que almacenará las funciones que validan la información.
 * 
 * En el caso de utilitarios.php, almacenará código reutilizable.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
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
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Te damos la
                    bienvenida a la asistencia personalizada de Razer
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
                Es por ello que la marca ofrece a sus clientes la oportunidad de obtener asistencia personalizada en
                caso de encontrar un problema en nuestros equipos electrónicos o en la renumeración de las monedas que
                maneje la marca RAZER en ese momento, entiéndase como (GOLD, PLATA, PLATINO) y cualquier otra añadida.
                <br><br>
            <div class="section-header section-title wow fadeIn">
                <img src="dist/img/asistencia.png" style="max-height: 200px; margin-bottom: 1rem;">
                <br><br>
                <p>
                    En caso de no poder escanear el código haga clic en Ir a WhatsApp
                </p>
                <br>
                <a href="https://wa.link/52ipcu" class="btn btn-primary3" onclick=alerta(); style="width:20%;">
                    Ir a WhatsApp
                </a>
            </div>
            </p>
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
    <script>
    function alerta() {
        alert("Esta página te redireccionará fuera del sitio")
    }
    </script>
</body>

</html>