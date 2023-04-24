<?php 
include_once '../Controllers/loginController.php';
include_once '../Controllers/carritoController.php';

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
    <title>Razer Costa Rica - For Gamers by Gamers</title>

    <link rel="icon" type="image/x-icon" href="dist/img/logo-nav.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
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

function MostrarPrincipal(){
  if($_SESSION["CorreoElectronico"] == null){
    header("Location: ../Views/login.php");
  }

  MostrarCarritoTemporal();
    echo '
    <header id="hero-area6" data-stellar-background-ratio="0.5"> 
    <div class="video-container">
      <video autoplay muted loop>
        <source src="dist/video/sobreNosotros.mp4" type="video/mp4">
        Tu navegador no soporta la reproducción de videos.
      </video>
    </div>   
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
              <a class="nav-link page-scroll" href="#hero-area6">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#blog">Beneficios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contáctenos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
            </li>
          </ul>
            <div class="dropdown show">
              <a class="btn btn-secondary dropdown-toggle" style="font-size:12px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               href="#" class="d-block">'. $_SESSION["Nombre"] . ' | '. $_SESSION["PerfilUsuario"].'
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                if($_SESSION["TipoUsuario"] == 2){
                echo'
                <a class="dropdown-item" href="servicios.php" style="padding-top:10px; padding-left:25px;">Servicios</a>
                <a class="dropdown-item" href="actualizarPerfil.php?q=' . $_SESSION["ConsecutivoUsuario"] .'"
                style="padding-top:10px; padding-left:25px;">Editar Perfil</a>
                <a class="dropdown-item" href="pagos.php" style="padding-top:10px; padding-left:25px;">Procesar pago   ¢'. number_format($_SESSION["MontoTemporal"],2) .'</a>
                <a class="dropdown-item" href="verFacturas.php" style="padding-top:10px; padding-left:25px;">Facturas</a>
                ';
                }
                if($_SESSION["TipoUsuario"] == 1){
                echo' 
                <a class="dropdown-item" href="mantenimientoUsuario.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Usuarios</a>
                <a class="dropdown-item" href="mantenimientoProducto.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Productos</a>
                <a class="dropdown-item" href="registrarProductos.php" style="padding-top:10px; padding-left:25px;">Registrar Productos</a>
                ';
                }
                echo' 
                <form action="" method="POST">
                <li class="dropdown-item" style="padding-top:10px;">
                  <input type="submit" id="btnCerrarSesion" class="dropdown-item" style="text-align:center;"
                  name="btnCerrarSesion" value="Cerrar Sesión">
                </li>
                </form>
              </div>
            </div>

        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
         <li>
            <a class="page-scroll" href="principal.php">Home</a>
          </li>
          <li>
            <a class="page-scroll" href="#portfolios">Works</a>
          </li>
          <li >
            <a class="page-scroll" href="#blog">Blog</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li>
          <a class="page-scroll" href="tienda.php">Tienda</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="servicios.php">Servicios</a>
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
  </header>

    ';
}

function MostrarHeaderAdicionales(){
  if($_SESSION["CorreoElectronico"] == null){
    header("Location: ../Views/login.php");
  }
    echo '
    <header id="hero-area5" data-stellar-background-ratio="0.5">    
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
              <a class="nav-link page-scroll" href="#contact">Contáctenos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
            </li>
          </ul>
            <div class="dropdown show">
              <a class="btn btn-secondary dropdown-toggle" style="font-size:12px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               href="#" class="d-block">'. $_SESSION["Nombre"] . ' | '. $_SESSION["PerfilUsuario"].'
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                if($_SESSION["TipoUsuario"] == 2){
                echo'
                <a class="dropdown-item" href="servicios.php" style="padding-top:10px; padding-left:25px;">Servicios</a>
                <a class="dropdown-item" href="actualizarPerfil.php?q=' . $_SESSION["ConsecutivoUsuario"] .'"
                style="padding-top:10px; padding-left:25px;">Editar Perfil</a>
                <a class="dropdown-item" href="pagos.php" style="padding-top:10px; padding-left:25px;">Procesar pago   ¢'. number_format($_SESSION["MontoTemporal"],2) .'</a>
                <a class="dropdown-item" href="verFacturas.php" style="padding-top:10px; padding-left:25px;">Facturas</a>
                ';
                }
                if($_SESSION["TipoUsuario"] == 1){
                echo' 
                <a class="dropdown-item" href="mantenimientoUsuario.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Usuarios</a>
                <a class="dropdown-item" href="mantenimientoProducto.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Productos</a>
                <a class="dropdown-item" href="registrarProductos.php" style="padding-top:10px; padding-left:25px;">Registrar Productos</a>
                ';
                }
                echo' 
                <form action="" method="POST">
                <li class="dropdown-item" style="padding-top:10px;">
                  <input type="submit" id="btnCerrarSesion" class="dropdown-item" style="text-align:center;"
                  name="btnCerrarSesion" value="Cerrar Sesión">
                </li>
                </form>
              </div>
            </div>

        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
         <li>
            <a class="page-scroll" href="principal.php">Inicio</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
          </li>
          <li>
            <a class="page-scroll" href="#features">Features</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="servicios.php">Productos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
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
            <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><br><br></h1>
            <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms"></p>
          </div>
        </div>
      </div> 
    </div>           
  </header>

    ';
}

function MostrarTienda(){
  if($_SESSION["CorreoElectronico"] == null){
    header("Location: ../Views/login.php");
  }
    echo ' 
    <header id="hero-area2" data-stellar-background-ratio="0.5"> 
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
              <a class="nav-link page-scroll" href="#features">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contáctenos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
            </li>
          </ul>
            <div class="dropdown show">
              <a class="btn btn-secondary dropdown-toggle" style="font-size:12px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               href="#" class="d-block">'. $_SESSION["Nombre"] . ' | '. $_SESSION["PerfilUsuario"].'
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                if($_SESSION["TipoUsuario"] == 2){
                echo'
                <a class="dropdown-item" href="servicios.php" style="padding-top:10px; padding-left:25px;">Servicios</a>
                <a class="dropdown-item" href="actualizarPerfil.php?q=' . $_SESSION["ConsecutivoUsuario"] .'"
                style="padding-top:10px; padding-left:25px;">Editar Perfil</a>
                <a class="dropdown-item" href="pagos.php" style="padding-top:10px; padding-left:25px;">Procesar pago   ¢'. number_format($_SESSION["MontoTemporal"],2) .'</a>
                <a class="dropdown-item" href="verFacturas.php" style="padding-top:10px; padding-left:25px;">Facturas</a>
                ';
                }
                if($_SESSION["TipoUsuario"] == 1){
                echo' 
                <a class="dropdown-item" href="mantenimientoUsuario.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Usuarios</a>
                <a class="dropdown-item" href="mantenimientoProducto.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Productos</a>
                <a class="dropdown-item" href="registrarProductos.php" style="padding-top:10px; padding-left:25px;">Registrar Productos</a>
                ';
                }
                echo' 
                <form action="" method="POST">
                <li class="dropdown-item" style="padding-top:10px;">
                  <input type="submit" id="btnCerrarSesion" class="dropdown-item" style="text-align:center;"
                  name="btnCerrarSesion" value="Cerrar Sesión">
                </li>
                </form>
              </div>
            </div>

        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
         <li>
            <a class="page-scroll" href="principal.php">Inicio</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
          </li>
          <li>
            <a class="page-scroll" href="#features">Features</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="servicios.php">Productos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
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
            <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><br><br></h1>
            <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms"></p>
          </div>
        </div>
      </div> 
    </div> 
    </header>  
    ';
}

function MostrarPoliticas(){
  if($_SESSION["CorreoElectronico"] == null){
    header("Location: ../Views/login.php");
  }
    echo ' 
    <header id="hero-area3" data-stellar-background-ratio="0.5"> 
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
              <a class="nav-link page-scroll" href="#services">Características</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contáctenos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
            </li>
          </ul>
            <div class="dropdown show">
              <a class="btn btn-secondary dropdown-toggle" style="font-size:12px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               href="#" class="d-block">'. $_SESSION["Nombre"] . ' | '. $_SESSION["PerfilUsuario"].'
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                if($_SESSION["TipoUsuario"] == 2){
                echo'
                <a class="dropdown-item" href="servicios.php" style="padding-top:10px; padding-left:25px;">Servicios</a>
                <a class="dropdown-item" href="actualizarPerfil.php?q=' . $_SESSION["ConsecutivoUsuario"] .'"
                style="padding-top:10px; padding-left:25px;">Editar Perfil</a>
                <a class="dropdown-item" href="pagos.php" style="padding-top:10px; padding-left:25px;">Procesar pago   ¢'. number_format($_SESSION["MontoTemporal"],2) .'</a>
                <a class="dropdown-item" href="verFacturas.php" style="padding-top:10px; padding-left:25px;">Facturas</a>
                ';
                }
                if($_SESSION["TipoUsuario"] == 1){
                echo' 
                <a class="dropdown-item" href="mantenimientoUsuario.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Usuarios</a>
                <a class="dropdown-item" href="mantenimientoProducto.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Productos</a>
                <a class="dropdown-item" href="registrarProductos.php" style="padding-top:10px; padding-left:25px;">Registrar Productos</a>
                ';
                }
                echo' 
                <form action="" method="POST">
                <li class="dropdown-item" style="padding-top:10px;">
                  <input type="submit" id="btnCerrarSesion" class="dropdown-item" style="text-align:center;"
                  name="btnCerrarSesion" value="Cerrar Sesión">
                </li>
                </form>
              </div>
            </div>

        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
         <li>
            <a class="page-scroll" href="principal.php">Inicio</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
          </li>
          <li>
            <a class="page-scroll" href="#features">Features</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="servicios.php">Productos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
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
            <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><br><br></h1>
            <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms"></p>
          </div>
        </div>
      </div> 
    </div> 
    </header>  
    ';
}

function MostrarTerminos(){
  if($_SESSION["CorreoElectronico"] == null){
    header("Location: ../Views/login.php");
  }
    echo ' 
    <header id="hero-area4" data-stellar-background-ratio="0.5"> 
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
              <a class="nav-link page-scroll" href="#services">Características</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contáctenos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
            </li>
          </ul>
            <div class="dropdown show">
              <a class="btn btn-secondary dropdown-toggle" style="font-size:12px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               href="#" class="d-block">'. $_SESSION["Nombre"] . ' | '. $_SESSION["PerfilUsuario"].'
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                if($_SESSION["TipoUsuario"] == 2){
                echo'
                <a class="dropdown-item" href="servicios.php" style="padding-top:10px; padding-left:25px;">Servicios</a>
                <a class="dropdown-item" href="actualizarPerfil.php?q=' . $_SESSION["ConsecutivoUsuario"] .'"
                style="padding-top:10px; padding-left:25px;">Editar Perfil</a>
                <a class="dropdown-item" href="pagos.php" style="padding-top:10px; padding-left:25px;">Procesar pago   ¢'. number_format($_SESSION["MontoTemporal"],2) .'</a>
                <a class="dropdown-item" href="verFacturas.php" style="padding-top:10px; padding-left:25px;">Facturas</a>
                ';
                }
                if($_SESSION["TipoUsuario"] == 1){
                echo' 
                <a class="dropdown-item" href="mantenimientoUsuario.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Usuarios</a>
                <a class="dropdown-item" href="mantenimientoProducto.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Productos</a>
                <a class="dropdown-item" href="registrarProductos.php" style="padding-top:10px; padding-left:25px;">Registrar Productos</a>
                ';
                }
                echo' 
                <form action="" method="POST">
                <li class="dropdown-item" style="padding-top:10px;">
                  <input type="submit" id="btnCerrarSesion" class="dropdown-item" style="text-align:center;"
                  name="btnCerrarSesion" value="Cerrar Sesión">
                </li>
                </form>
              </div>
            </div>

        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
         <li>
            <a class="page-scroll" href="principal.php">Inicio</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
          </li>
          <li>
            <a class="page-scroll" href="#features">Features</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="servicios.php">Productos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
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
            <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><br><br></h1>
            <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms"></p>
          </div>
        </div>
      </div> 
    </div> 
    </header>  
    ';
}

function MostrarSobreNosotros(){
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
              <a class="nav-link page-scroll" href="#services">Características</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#team">Equipo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contáctenos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
            </li>
          </ul>
            <div class="dropdown show">
              <a class="btn btn-secondary dropdown-toggle" style="font-size:12px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               href="#" class="d-block">'. $_SESSION["Nombre"] . ' | '. $_SESSION["PerfilUsuario"].'
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                if($_SESSION["TipoUsuario"] == 2){
                echo'
                <a class="dropdown-item" href="servicios.php" style="padding-top:10px; padding-left:25px;">Servicios</a>
                <a class="dropdown-item" href="actualizarPerfil.php?q=' . $_SESSION["ConsecutivoUsuario"] .'"
                style="padding-top:10px; padding-left:25px;">Editar Perfil</a>
                <a class="dropdown-item" href="pagos.php" style="padding-top:10px; padding-left:25px;">Procesar pago   ¢'. number_format($_SESSION["MontoTemporal"],2) .'</a>
                <a class="dropdown-item" href="verFacturas.php" style="padding-top:10px; padding-left:25px;">Facturas</a>
                ';
                }
                if($_SESSION["TipoUsuario"] == 1){
                echo' 
                <a class="dropdown-item" href="mantenimientoUsuario.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Usuarios</a>
                <a class="dropdown-item" href="mantenimientoProducto.php" style="padding-top:10px; padding-left:25px;">Mantenimiento Productos</a>
                <a class="dropdown-item" href="registrarProductos.php" style="padding-top:10px; padding-left:25px;">Registrar Productos</a>
                ';
                }
                echo' 
                <form action="" method="POST">
                <li class="dropdown-item" style="padding-top:10px;">
                  <input type="submit" id="btnCerrarSesion" class="dropdown-item" style="text-align:center;"
                  name="btnCerrarSesion" value="Cerrar Sesión">
                </li>
                </form>
              </div>
            </div>

        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
         <li>
            <a class="page-scroll" href="principal.php">Inicio</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="tienda.php">Tienda</a>
          </li>
          <li>
            <a class="page-scroll" href="#features">Features</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link page-scroll" href="servicios.php">Productos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link page-scroll" href="soporte.php">Soporte</a>
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
            <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><br><br><br></h1>
            <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms"></p>
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
                <p>San José, Costa Rica </p>
                <p class="phone">Teléfono: <span>(+506 7215-3137)</span></p>
                <p class="email">Correo electrónico: <span>(RazerAmbienteWeb2@outlook.com)</span></p>
              </div>
              <div class="social-icons">
                <ul>
                  <li class="facebook">
                    <a href="https://www.facebook.com/razerlatam" onclick=alerta();>
                      <i class="bi bi-facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                      </i>
                    </a>
                  </li>
                  <li class="twitter">
                    <a href="https://twitter.com/RazerES" onclick=alerta();>
                      <i class="bi bi-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg>
                      </i>
                    </a>
                  </li>
                  <li class="instagram">
                    <a href="https://www.instagram.com/razer/" onclick=alerta();>
                      <i class="bi bi-instagram">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                      </svg>
                      </i>
                    </a>
                  </li>
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
              <a href="principal.php">Página principal</a>
            </li>
            <li>
              <a href="servicios.php">Servicios</a>
            </li>
            <li>
              <a href="sobreNosotros.php">Sobre Nosotros</a>
            </li>
            <li>
              <a href="#contact">Contáctenos</a>
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

  <!-- Go To Top Link -->
  <a href="#services" class="back-to-top">
    <i class="bi bi-arrow-up">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
      </svg>
    </i>
  </a>

  <div id="loader">
      <div class="spinner">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
      </div>
  </div>
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
    <script src="dist/js/jquery.slicknav.js"></script>     
    <script src="dist/js/wow.js"></script>   
    <script src="dist/js/jquery.vide.js"></script>
    <script src="dist/js/jquery.counterup.min.js"></script>    
    <script src="dist/js/jquery.magnific-popup.min.js"></script>    
    <script src="dist/js/waypoints.min.js"></script>    
    <script src="dist/js/form-validator.min.js"></script>
    <script src="dist/js/contact-form-script.js"></script>   
    <script src="dist/js/main.js"></script>
    <script>function alerta() {alert("Esta página te redireccionará fuera del sitio")}</script>

    ';
}


?>

