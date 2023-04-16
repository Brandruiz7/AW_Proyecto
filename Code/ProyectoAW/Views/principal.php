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
      MostrarPrincipal();
    ?>
    <!-- Header Section End -->


    <!-- Services Section Start -->
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
        </div>
    </section>
    <!-- Services Section End -->



    <!-- Team section Start -->
    <section id="team" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nuestro equipo</h2>
                <hr class="lines">
                <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                    dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="single-team">
                        <img src="dist/img/team/team1.jpg" alt="">
                        <div class="team-details">
                            <div class="team-inner">
                                <h4 class="team-title">Jhon Doe</h4>
                                <p>Chief Technical Officer</p>
                                <ul class="social-list">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="single-team">
                        <img src="dist/img/team/team2.jpg" alt="">
                        <div class="team-details">
                            <div class="team-inner">
                                <h4 class="team-title">Paul Kowalsy</h4>
                                <p>CEO & Co-Founder</p>
                                <ul class="social-list">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="single-team">
                        <img src="dist/img/team/team3.jpg" alt="">
                        <div class="team-details">
                            <div class="team-inner">
                                <h4 class="team-title">Emilly Williams</h4>
                                <p>Business Manager</p>
                                <ul class="social-list">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="single-team">
                        <img class="img-fulid" src="dist/img/team/team4.jpg" alt="">
                        <div class="team-details">
                            <div class="team-inner">
                                <h4 class="team-title">Patricia Green</h4>
                                <p>Graphic Designer</p>
                                <ul class="social-list">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team section End -->

    <!-- testimonial Section Start -->
    <div id="testimonial" class="section" data-stellar-background-ratio="0.1">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="touch-slider owl-carousel owl-theme">
                        <div class="testimonial-item">
                            <img src="dist/img/testimonial/customer1.jpg" alt="Client Testimonoal" />
                            <div class="testimonial-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing
                                    ciusmod tempor incididunt ut labore et</p>
                                <h3>Jone Deam</h3>
                                <span>Fondor of Jalmori</span>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <img src="dist/img/testimonial/customer2.jpg" alt="Client Testimonoal" />
                            <div class="testimonial-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing
                                    ciusmod tempor incididunt ut labore et</p>
                                <h3>Oidila Matik</h3>
                                <span>President Lexo Inc</span>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <img src="dist/img/testimonial/customer3.jpg" alt="Client Testimonoal" />
                            <div class="testimonial-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing
                                    ciusmod tempor incididunt ut labore et</p>
                                <h3>Alex Dattilo</h3>
                                <span>CEO Optima Inc</span>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <img src="dist/img/testimonial/customer4.jpg" alt="Client Testimonoal" />
                            <div class="testimonial-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. send do <br> adipisicing
                                    ciusmod tempor incididunt ut labore et</p>
                                <h3>Paul Kowalsy</h3>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial Section Start -->

    <!-- Counter Section Start -->
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
    <!-- Counter Section End -->

    <!-- Blog Section -->
    <section id="blog" class="section" style="background-color: #000000;">
        <!-- Container Starts -->
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nuestro Blog</h2>
                <hr class="lines">
                <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                    dignissimos! <br> Lorem ipsum dolor sit amet, consectetur.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="dist/img/blog/img1.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="date"><i class="lnr  lnr-clock"></i>2 Days Ago</span>
                                <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span>
                            </div>
                            <h3>
                                <a href="single-post.html">How often should you tweet?</a>
                            </h3>
                            <p style="color: #fff;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua...
                            </p>

                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="dist/img/blog/img2.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="date"><i class="lnr  lnr-clock"></i>2 Days Ago</span>
                                <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span>
                            </div>
                            <h3>
                                <a href="single-post.html">Content is still king</a>
                            </h3>
                            <p style="color: #fff;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua...
                            </p>

                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="dist/img/blog/img3.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <div class="meta-tags">
                                <span class="date"><i class="lnr  lnr-clock"></i>2 Days Ago</span>
                                <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span>
                            </div>
                            <h3>
                                <a href="single-post.html">Social media at work</a>
                            </h3>
                            <p style="color: #fff;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua...
                            </p>

                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>
            </div>
        </div>
    </section>
    <!-- blog Section End -->

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