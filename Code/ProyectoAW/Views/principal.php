<?php 
/**
 * Explicación general de la vista:
 * 
 * principal.php se encargará del primer contacto que tendrá el Cliente/Adminitrador.
 * La idea es generar un impacto positivo y es por ello que tiene información como:
 * **
 * **   - Un video que muestra el logo de la empresa.
 * **   - Breve reseña.
 * **   - ¿Por qué deberían elegirnos?
 * **   - Cantidad de compras u afiliaciones totales. (Contador)
 * **
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once"  que apunta al
 * del controlador usuarios respectivo que almacenará las funciones que validan la información
 * del usuario conectado y el tipo de usuario que es. Además permite en la sección de 
 * contáctenos mandar un correo al administrador con un mensaje para que se pongan en contacto
 * con el cliente.
 * 
 * En el caso de utilitarios.php, almacenará código reutilizable.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         3.3
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
      MostrarPrincipal();
    ?>
    <!-- Header Section End -->

    <!-- Reseña Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
        <div class="container">
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                <br>
                Razer es una empresa global que se dedica a la fabricación de productos y software para gamers. La
                compañía fue fundada en 2005 en San Francisco, California, y desde entonces se ha convertido en una
                marca líder en el mercado de periféricos para juegos.
                <br><br>
                Los productos de Razer incluyen ratones, teclados, auriculares, controladores y otros dispositivos que
                se utilizan comúnmente en el mundo de los videojuegos. La empresa también produce computadoras
                portátiles y de escritorio diseñadas específicamente para jugadores.
                <br><br>
                Además de los productos físicos, Razer ofrece una amplia gama de software y servicios para los gamers,
                incluyendo su plataforma de comunicación y colaboración, Razer Comms, y el software de personalización
                de periféricos, Razer Synapse.
                <br><br>
                Razer tiene una gran presencia en la comunidad de jugadores y patrocina a varios equipos y eventos de
                deportes electrónicos. La empresa también es conocida por su compromiso con la sostenibilidad y la
                responsabilidad social, y ha lanzado varios programas para reducir su impacto ambiental y apoyar a
                organizaciones benéficas en todo el mundo.
            </p>
        </div>
    </section>
    <!-- Reseña Section End -->

    <!-- ¿Por qué deberían elegirnos? Section -->
    <section id="blog" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">¿Por qué comprar en Razer.com?</h2>
                <hr class="lines"><br><br>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="dist/img/blog/img1.jpg" alt="">
                            </a>
                        </div>
                        <br>
                        <div class="blog-item-text">
                            <h3>
                                <p style="text-align:center; font-size:30px; line-height:120%;">Sé el primero</p>
                            </h3>
                            <p style="color: #fff; text-align:center; line-height:30px;">
                                Razer.com es el único lugar donde puedes comprar nuestro equipo Razer más esperado
                                inmediatamente después de su lanzamiento.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="dist/img/blog/img2.jpg" alt="">
                            </a>
                        </div>
                        <br>
                        <div class="blog-item-text">
                            <h3>
                                <p style="text-align:center; font-size:30px; line-height:120%;">La mayor gama de equipos Razer</p>
                            </h3>
                            <p style="color: #fff; text-align:center; line-height:30px;">
                                Como tienda en línea oficial de Razer, tenemos una enorme colección de productos que no
                                podrás encontrar en ningún otro lugar.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="dist/img/blog/img3.png" alt="">
                            </a>
                        </div>
                        <br>
                        <div class="blog-item-text">
                            <h3>
                                <p style="text-align:center; font-size:30px; line-height:120%;">Equipos y recompensas exclusivas Razer</p>
                            </h3>
                            <p style="color: #fff; text-align:center; line-height:30px;">
                                Accede a equipos Razer de edición limitada que solo están disponibles en Razer.com.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ¿Por qué deberían elegirnos? Section End -->

    <!-- Contador Section -->
    <div class="counters section" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">32879</span></h3>
                            <h4>Afiliaciones diarias</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lnr lnr-briefcase"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">1342509</span></h3>
                            <h4>Puntos distribuidos</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lnr lnr-user"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">2452053</span></h3>
                            <h4>Clientes</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lnr lnr-heart"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">2289238</span></h3>
                            <h4>Calificaciones excelentes</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contador Section -->

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