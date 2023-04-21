<?php 
  include_once 'utilitarios.php';
  include_once '../Controllers/usuariosController.php';  
  $datos = ConsultarUsuario($_GET["q"]); 
?>
<!DOCTYPE html>
<html lang="en">
<?php 
      MostrarHead();
   ?>

<body>

    <!-- Header Section Start -->
    <?php
      MostrarHeaderAdicionales();
    ?>
    <!-- Header Section End -->

    <!-- Services Section Start -->
    <section id="services" class="section" style="background-color: #000000;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Actualizar Perfil
                    Usuario</h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                <br>
                Esta página está designada para poder actualizar a los usuarios que tiene registrada la marca de la
                serpiente de tres cabezas. Por favor asegúrese de realizar los cambios siguiendo los espacios que se le 
                solicitan a continuación.
                <br>
                <br>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body login-card-body">
                                <h4 class="login-box-msg" style="color:#66b933; padding-bottom:50px;">Actualizar
                                    Información</h4>
                                <form action="" method="post">
                                    <input type="hidden" id="Consecutivo" name="Consecutivo"
                                        value="<?php echo $datos["ConsecutivoUsuario"] ?>">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Su cédula es</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="Identificación"
                                                disabled style="text-align:center;" required id="Identificacion"
                                                name="Identificacion" id="Identificación" onkeyUp="buscarNombreApi();"
                                                value="<?php echo $datos["Cedula"] ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Nombre registrado con la cédula</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="Nombre" disabled
                                                required id="Nombre" name="Nombre" readOnly="true"
                                                style="text-align:center;" value="<?php echo $datos["Nombre"] ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Actualice su correo</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="email" class="form-control" placeholder="Correo Electrónico"
                                                required id="correoElectronico" name="correoElectronico"
                                                style="text-align:center;" disabled
                                                value=<?php echo $datos["CorreoElectronico"] ?>>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Si desea cambiar su contraseña, escríbala en el siguiente espacio. Si no
                                                quiere cambiarla, puede dejar el espacio en blanco</p>
                                        </div>
                                        <div class="col-3">
                                            <input type="password" class="form-control" placeholder="Contraseña"
                                                id="contrasenna" name="contrasenna" style="text-align:center;">
                                        </div>
                                        <div class="col-3">
                                            <input type="password" class="form-control"
                                                placeholder="Confirmar contraseña" id="confirmarContrasenna"
                                                name="confirmarContrasenna" style="text-align:center;">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Actualice su número de teléfono</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="Número telefónico"
                                                required id="Telefono" name="Telefono" style="text-align:center;"
                                                value=<?php echo $datos["Telefono"] ?>>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-block" value="Actualizar"
                                        id="btnActualizarPerfil" name="btnActualizarPerfil">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="javascripts/validarContrasenna.js"></script>
    <script src="javascripts/funcionesActualizarUsuario.js"></script>
</body>

</html>