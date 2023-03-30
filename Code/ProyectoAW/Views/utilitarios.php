<?php 
include_once '../Controllers/loginController.php';

if(session_status()==PHP_SESSION_NONE) {
  session_start();
}

function MostrarHead (){
    echo '
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Mate</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/line-icons.css">
    <link rel="stylesheet" href="dist/css/owl.carousel.css">
    <link rel="stylesheet" href="dist/css/owl.theme.css">
    <link rel="stylesheet" href="dist/css/nivo-lightbox.css">
    <link rel="stylesheet" href="dist/css/magnific-popup.css">
    <link rel="stylesheet" href="dist/css/slicknav.css">
    <link rel="stylesheet" href="dist/css/animate.css">
    <link rel="stylesheet" href="dist/css/main.css">    
    <link rel="stylesheet" href="dist/css/responsive.css">

  </head>
    ';
}


function MostrarHeader(){
  if($_SESSION["CorreoElectronico"] == null){
    header("Location: ../Views/login.php");
  }
    echo '
    <header id="hero-area" data-stellar-background-ratio="0.5">    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a href="principal.php" class="navbar-brand"><img class="img-fulid" src="dist/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lnr lnr-menu"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="principal.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#services">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#features">Características</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#team">Equipo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contáctenos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="productos.php">Productos</a>
            </li>
          </ul>
          <form action="" method="POST">
          <li class="nav-item d-none d-sm-inline-block">
            <input type="submit" class="btn" id="btnCerrarSesion" 
            name="btnCerrarSesion" value="Cerrar Sesión">
          </li>
        </form>
        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
         <li>
            <a class="page-scroll" href="#hero-area">Home</a>
          </li>
          <li>
            <a class="page-scroll" href="#services">Services</a>
          </li>
          <li>
            <a class="page-scroll" href="#features">Features</a>
          </li>
          <li>
            <a class="page-scroll" href="#portfolios">Works</a>
          </li>
          <li>
            <a class="page-scroll" href="#team">Team</a>
          </li>
          <li >
            <a class="page-scroll" href="#blog">Blog</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="productos.php">Productos</a>
          </li>
          <form action="" method="POST">
          <li class="nav-item d-none d-sm-inline-block">
            <input type="submit" class="btn" id="btnCerrarSesion" 
            name="btnCerrarSesion" value="Cerrar Sesión">
          </li>
        </form>
      </ul>
      <!-- Mobile Menu End -->

    </nav>
    <!-- Navbar End -->   
    <div class="container">      
      <div class="row justify-content-md-center">
        <div class="col-md-10">
          <div class="contents text-center">
            <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Crea, diseña y haz cosas asombrosas</h1>
            <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms">Prueba más de 20 aplicaciones y disfruta de todos los beneficios de la suscripción</p>
          </div>
        </div>
      </div> 
    </div>           
  </header>

    ';
}

function MostrarContactUs(){
    echo'
    <section id="contact" class="section" data-stellar-background-ratio="-0.2">      
    <div class="contact-form">
      <div class="container">
        <div class="row">     
          <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="contact-us">
              <h3>Contáctanos</h3>
              <div class="contact-address">
                <p>Centerville Road, DE 19808, EE. UU. </p>
                <p class="phone">Teléfono: <span>(+94 123 456 789)</span></p>
                <p class="email">Correo electrónico: <span>(contacto@mate.com)</span></p>
              </div>
              <div class="social-icons">
                <ul>
                  <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
              </div>
            </div>
          </div>     
          <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="contact-block">
            <form action="" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="nameC" name="nameC" placeholder="Nombre" required data-error="Por favor ingresa tu nombre">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" placeholder="Ingrese su correo electrónico" id="correoC" class="form-control" name="correoC" required data-error="Por favor ingresa tu correo electrónico">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <textarea class="form-control" name="message" id="message" placeholder="Escribe un mensaje" rows="8" data-error="Escribe tu mensaje" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button text-center">
                      <button class="btn btn-common" name="btnNotificar" id="btnNotificar" type="submit">Enviar mensaje</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div> 
                      <div class="clearfix"></div> 
                    </div>
                  </div>
                </div>            
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>           
  </section>
    ';
}


function MostrarFooter(){
    echo '
    <footer>          
    <div class="container">
      <div class="row">
        <!-- Footer Links -->
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <ul class="footer-links">
            <li>
              <a href="#">Página principal</a>
            </li>
            <li>
              <a href="#">Servicios</a>
            </li>
            <li>
              <a href="#">Sobre Nosotros</a>
            </li>
            <li>
              <a href="#">Contáctenos</a>
            </li>
            <li>
              <a href="politicas.php">Políticas y privacidad</a>
            </li>
            <li>
              <a href="terminos.php">Términos y condiciones</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <div class="copyright">
            <p>Todos los derechos reservados &copy;</p>
          </div>
        </div>  
      </div>
    </div>
  </footer>
    ';
}

Function MostrarJS(){
    echo'
    <script src="dist/js/jquery-min.js"></script>
    <script src="dist/js/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.mixitup.js"></script>
    <script src="dist/js/nivo-lightbox.js"></script>
    <script src="dist/js/owl.carousel.js"></script>    
    <script src="dist/js/jquery.stellar.min.js"></script>    
    <script src="dist/js/jquery.nav.js"></script>    
    <script src="dist/js/scrolling-nav.js"></script>    
    <script src="dist/js/jquery.easing.min.js"></script>    
    <script src="dist/js/smoothscroll.js"></script>    
    <script src="dist/js/jquery.slicknav.js"></script>     
    <script src="dist/js/wow.js"></script>   
    <script src="dist/js/jquery.vide.js"></script>
    <script src="dist/js/jquery.counterup.min.js"></script>    
    <script src="dist/js/jquery.magnific-popup.min.js"></script>    
    <script src="dist/js/waypoints.min.js"></script>    
    <script src="dist/js/form-validator.min.js"></script>
    <script src="dist/js/contact-form-script.js"></script>   
    <script src="dist/js/main.js"></script>

    ';
}


?>

