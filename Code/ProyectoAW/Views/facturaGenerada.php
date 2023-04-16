<?php 
  include_once 'utilitarios.php';
  include_once '../Controllers/usuariosController.php'; 
  include_once '../Controllers/carritoController.php';
  ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
      MostrarHead();
    ?>

<body>
    <section id="services" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Productos en el
                    carrito</h2>
            </div>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">

                        <table class="table table-hover" style="color:black;">
                        <h1>Factura de compra</h1> <br><br>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>¢ Precio</th>
                                    <th>¢ SubTotal</th>
                                    <th>¢ Impuesto</th>
                                    <th>¢ Total</th>
                                </tr>
                            </thead>
                            <br><br>
                            <tbody>
                                <?php
                                    MostrarCarritoTotal();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>

        </div>
        </div>
    </section>

</body>

</html>

<?php
    $html=ob_get_clean();
    //echo $html;

    require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf -> getOptions();
    $options -> set(array('isRemoteEnabled' => true));
    $dompdf -> setOptions($options);

    $dompdf -> loadHtml($html);
    $dompdf -> setPaper('A4', 'landscape');

    $dompdf -> render();
    $dompdf -> stream("factura.pdf", array("Attachment" => false));

?>