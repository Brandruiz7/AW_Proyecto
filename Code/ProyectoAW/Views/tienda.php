<?php 
/**
 * Explicación general de la vista:
 * 
 * tienda.php es una vista cuya idea es mostrar los productos electrónicos de la tienda
 * se mostrarán los productos que tengan un stock mayor a 0 y cuando un cliente agregue
 * productos al carrito se pasará el consecutivo del producto al carrito para sumarlo
 * a la cuenta personal. Se rebajará el producto del stock (evento).
 *  
 * Ahora, para manejar un orden en el proyecto se agrega un "include_once" que apunta 
 * al del controlador usuarios  y productos respectivo que almacenará las funciones 
 * que validan la información.
 * 
 * En el caso de utilitarios.php, almacenará código reutilizable.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
  include_once 'utilitarios.php';
  include_once '../Controllers/usuariosController.php';  
  include_once '../Controllers/productosController.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
      MostrarHead();
    ?>

<body>

    <!-- Header Start -->
    <?php
      MostrarTienda();
    ?>
    <!-- Header End -->

    <!-- Features Section Start -->
    <section id="features" class="section" data-stellar-background-ratio="0.2" style="padding-top:150px;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">ACÉRCATE AL MUNDO DE LOS PROFESIONALES</h2>
                <hr class="lines">
                <p class="section-subtitle" style="text-align: justify;">
                    ÚLTIMOS LANZAMIENTOS
                    Echa un vistazo a nuestros últimos lanzamientos para conseguir las actualizaciones más recientes
                    para tu equipo. RAZER RATONES, TECLADOS, AURICULARES, ORDENADORES PORTÁTILES Y MUCHO MÁS
                </p>
                <div class="content-wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                  MostrarProductos();
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

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
    // función ASCII
    function onlyNumberKey(evt) {

        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    function ActualizarCarrito(ConsecutivoProducto, Stock) {

        let CantidadProducto = $("#Cantidad-" + ConsecutivoProducto).val();

        // Agregar validación de stock
        if (CantidadProducto > Stock) {
            alert("La cantidad supera el stock del producto");
        } else {
            $.ajax({
                type: 'POST',
                url: '../Controllers/productosController.php',
                data: {
                    'ActualizarCarrito': 'ActualizarCarrito',
                    'ConsecutivoProducto': ConsecutivoProducto,
                    'CantidadProducto': CantidadProducto
                },
                success: function(res) {
                    alert("Carrito actualizado correctamente");
                    window.location.href = "principal.php";
                }
            });
        }
    }
    </script>
</body>

</html>