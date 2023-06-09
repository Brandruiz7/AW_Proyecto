<?php 
/**
 * Explicación general de la vista:
 * 
 * politicas.php es una vista cuya idea es brindar un resumen general a los usuarios sobre
 * las políticas de privacidad con las que se rige la empresa.
 * 
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once" que apunta al del 
 * controlador usuario respectivo que almacenará las funciones que validan la información.
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

    <!-- Header Start -->
    <?php
      MostrarPoliticas();
    ?>
    <!-- Header End -->

    <!-- Services Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Política de
                    privacidad</h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                <br>
                En Razer, entendemos la importancia de la privacidad de nuestros clientes y visitantes en línea. Por
                eso,
                hemos creado esta política de privacidad para explicar cómo recopilamos, utilizamos y protegemos la
                información personal que obtenemos a través de nuestro sitio web.
                <br>
                <br>
                Información que recopilamos
                <br>
                <br>
                Cuando visitas nuestro sitio web, podemos recopilar cierta información personal, como tu nombre,
                dirección de correo electrónico, dirección de facturación y número de teléfono. Esta información se
                utiliza para procesar tus pedidos, responder a tus consultas y mejorar la calidad de nuestro servicio al
                cliente.
                <br>
                <br>
                Cuando visitas nuestro sitio web, podemos recopilar cierta información personal, como tu nombre,
                dirección de correo electrónico, dirección de facturación y número de teléfono. Esta información se
                utiliza para procesar tus pedidos, responder a tus consultas y mejorar la calidad de nuestro servicio al
                cliente.
                <br>
                <br>
                Uso de la información
                <br>
                <br>
                Utilizamos la información personal que recopilamos para procesar tus pedidos, responder a tus consultas
                y proporcionarte información sobre nuestros productos y servicios. También podemos utilizar la
                información para mejorar nuestro sitio web, enviar actualizaciones y promociones, y para fines de
                investigación y análisis.
                <br>
                <br>
                Divulgación de la información
                <br>
                <br>
                En Razer, nos tomamos muy en serio la privacidad de nuestros clientes y visitantes. Por lo tanto, no
                vendemos, alquilamos ni compartimos tu información personal con terceros, excepto cuando sea necesario
                para procesar tus pedidos o cumplir con las leyes aplicables.
                <br>
                <br>
                Protección de la información
                <br>
                <br>
                En Razer, utilizamos medidas de seguridad físicas, electrónicas y administrativas para proteger la
                información personal que recopilamos. Sin embargo, ninguna medida de seguridad es completamente
                infalible, por lo que no podemos garantizar la seguridad de la información transmitida a través de
                nuestro sitio web.
                <br>
                <br>
                Cookies y tecnologías similares
                <br>
                <br>
                Utilizamos cookies y tecnologías similares para recopilar información sobre tu actividad en nuestro
                sitio web. Estas tecnologías nos permiten personalizar tu experiencia en nuestro sitio web, analizar el
                tráfico del sitio y proporcionarte publicidad relevante.
                <br>
                <br>
                Cambios en la política de privacidad
                <br>
                <br>
                Nos reservamos el derecho de cambiar esta política de privacidad en cualquier momento. Si hacemos
                cambios significativos a esta política, publicaremos una versión actualizada en nuestro sitio web y te
                notificaremos por correo electrónico si tenemos tu dirección de correo electrónico.
                <br>
                <br>
                Contacto
                <br>
                <br>
                Si tienes preguntas o preocupaciones sobre nuestra política de privacidad, por favor contáctanos a
                través de la información de contacto proporcionada en nuestro sitio web.
                <br>
                <br>
                Al crear tu propia política de privacidad, asegúrate de personalizarla para que se ajuste a tus
                prácticas comerciales específicas y cumpla con las leyes aplicables en tu país y región.
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
</body>

</html>