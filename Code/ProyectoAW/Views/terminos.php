<?php 
/**
 * Explicación general de la vista:
 * 
 * terminos.php es una vista cuya idea es mostrar los términos y condiciones de la 
 * empresa.
 *  
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once" que apunta 
 * al del controlador usuarios respectivo que almacenará las funciones que validan la
 * información.
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
      MostrarTerminos();
    ?>
    <!-- Header End -->

    <!-- Services Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
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
                Bienvenido a Razer, una página web de venta de licencias de software de diseño. Al acceder y utilizar
                esta página web, aceptas los términos y condiciones de uso que se describen a continuación. Por favor,
                lee estos términos y condiciones detenidamente antes de utilizar la página web de Razer.
                <br>
                <br>
                2. Licencia de uso
                Razer es un sitio web que vende licencias de software de diseño. Al adquirir una licencia de software a
                través de Razer, se te concede una licencia limitada, no exclusiva e intransferible para utilizar el
                software
                de acuerdo con los términos y condiciones de uso del proveedor de software. La licencia que adquieras
                será
                única y personal para ti y no podrás transferirla o cederla a terceros.
                <br>
                <br>
                3. Precios y pagos
                El precio de las licencias de software se indica en la página web de Razer. Los precios pueden estar
                sujetos
                a cambios sin previo aviso. Al comprar una licencia de software o algún producto de la marca, aceptas
                pagar el precio indicado en la
                página web de Razer en el momento de la compra. Razer utiliza una plataforma de pago seguro para
                procesar
                todas las transacciones.
                <br>
                <br>
                4. Información de la cuenta
                Para comprar licencias de software de diseño en nuestro sitio web, deberá crear una cuenta con su
                información personal y de pago. Usted es responsable de mantener la confidencialidad de su información
                de
                cuenta y contraseña, y es responsable de todas las actividades que ocurran bajo su cuenta.
                <br>
                <br>
                5. Política de reembolso
                No se permiten devoluciones o reembolsos de las licencias de software de diseño compradas en nuestro
                sitio
                web, a menos que se indique lo contrario. Si hay un problema con su licencia de software de diseño,
                contáctenos y haremos todo lo posible para solucionarlo.
                <br>
                <br>
                6. Propiedad intelectual
                Los derechos de propiedad intelectual, incluidos los derechos de autor, marcas comerciales y patentes,
                en el
                contenido de nuestro sitio web y el software de diseño que vendemos, son propiedad de Razer
                o sus respectivos propietarios. Usted no puede utilizar este contenido sin nuestro permiso previo por
                escrito.
                <br>
                <br>
                7. Ley aplicable
                Estos términos y condiciones se rigen e interpretan de acuerdo con las leyes del Costa Rica y se
                someten a la jurisdicción exclusiva de los tribunales de San José.

                Si tiene alguna pregunta sobre estos términos y condiciones, por favor contáctenos en
                RazerAmbienteWeb@outlook.com.

                Fecha de la última actualización: 23 de Marzo de 2023.
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