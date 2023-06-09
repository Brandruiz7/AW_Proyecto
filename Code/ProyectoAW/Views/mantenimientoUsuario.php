<?php 
/**
 * Explicación general de la vista:
 * 
 * mantenimientoUsuario.php es una vista cuya idea es brindar un resumen general de los 
 * usuarios y esta vista cuenta con lo siguiente:
 * **
 * **   - Correo electrónico del usuario.
 * **   - Identificación del usuario.
 * **   - Nombre completo del usuario.
 * **   - Tipo de usuario.
 * **   - Estado.
 * **   - Acciones (Actualizar | Eliminar).
 * **
 * Ahora, en el caso que la persona le dé clic al botón actualizar se enviará el consecutivo 
 * del usuario a la página actualizarUsuario. También hay un modal que se activa cuando se da
 * clic a eliminar, ese mismo almacenará el consecutivo y en caso de confirmar será enviado a 
 * la base de datos para ser procesado y para manejar un orden en el proyecto se agrega un 
 * "include_once" que apunta al del controlador usuario respectivo que almacenará las 
 * funciones que validan la información.
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
            </p>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr class="mantenimiento">
                                    <th>Correo Electrónico</th>
                                    <th>Identificación</th>
                                    <th>Nombre completo</th>
                                    <th>Tipo Usuario</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            <tbody class="mantenimiento">
                                <?php 
                                    consultarUsuarios();
                                ?>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </section>
            </div>
            <form action="" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¡Atención!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Está completamente seguro?
                                <input type="hidden" id="consecutivoUsuario" name="consecutivoUsuario">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" value="true" name="btnInactivar"
                                    id="btnInactivar" onclick="confirmarInactivacion()">Inactivar cuenta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="javascripts/inactivarUsuario.js"></script>
    <script>
    function setConsecutivoUsuario(id) {
        document.getElementById('consecutivoUsuario').value = id;
    }
    </script>
</body>

</html>