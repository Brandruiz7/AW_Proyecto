<?php 
/**
 * Explicación general de la vista:
 * 
 * actualizarUsuario.php es una vista especial que solo tiene acceso el administrador.
 * La idea es brindar un resumen general de los datos y es por ello que tiene lo siguiente:
 * **
 * **   - Correo electrónico
 * **   - Nombre completo registrado.
 * **   - Tipo de cliente
 * **   - Campo de contraseña para rellenar en caso de querer cambiarla
 * **
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once"  que apunta al
 * del controlador usuarios respectivo que almacenará las funciones que validan la información
 * del producto mostrado y el tipo de que es. También recibe los datos que se han modificado
 * y los envía en POST cuando se da clic en el botón de actualizar.
 * 
 * Los datos que se muestran en la página se consultan en la base de datos y se almacena en un array 
 * en la variable $datos, de esa manera se puede obtener la información del cliente y se distribuye 
 * en los value de los respectivos input. Esto es gracias a la recuperación del consecutivo que ha 
 * sido mandado de mantenimientoUsuario.php
 * 
 * En el caso de utilitarios.php, almacenará código reutilizable.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.3
 */
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
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Mantenimiento
                    Usuario</h2>
            </div>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                style="text-align: justify;">
                <br>
                Esta página está designada para poder actualizar a los usuarios que tiene registrada la marca de la
                serpiente de tres cabezas. Por favor asegúrese de realizar los cambios siguiendo la normativa interna de
                la institución.
                <br>
                <br>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body login-card-body">
                                <h4 class="login-box-msg" style="color:#66b933">Actualizar Información</h4>

                                <form action="" method="post">

                                    <input type="hidden" id="Consecutivo" name="Consecutivo"
                                        value="<?php echo $datos["ConsecutivoUsuario"] ?>">

                                    <div class="row">
                                        <div class="col-6">
                                            <input type="email" class="form-control" placeholder="Correo Electrónico"
                                                required id="correoElectronico" name="correoElectronico"
                                                onblur="validarCorreo();" readOnly="true"
                                                value=<?php echo $datos["CorreoElectronico"] ?>>
                                        </div>
                                        <div class="col-6">
                                            <input type="password" class="form-control" placeholder="Contraseña"
                                                id="contrasenna" name="contrasenna">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Identificación"
                                                required name="Identificacion" id="Identificacion"
                                                onkeyUp="buscarNombreApi();" value="<?php echo $datos["Cedula"] ?>">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Nombre" required
                                                id="Nombre" name="Nombre" readOnly="true">
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" placeholder="Perfil" required id="Perfil"
                                                name="Perfil">
                                                <?php
                                                        ConsultarTiposUsuario($datos["TipoUsuario"]);
                                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-block" value="Actualizar"
                                        id="btnActualizar" name="btnActualizar">

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
    <script src="javascripts/funcionesActualizarUsuario.js"></script>
</body>

</html>