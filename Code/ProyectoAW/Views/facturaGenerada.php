<?php 
  include_once 'utilitarios.php';
  include_once '../Controllers/usuariosController.php'; 
  include_once '../Controllers/carritoController.php';
  include_once('../Models/pagosModel.php');
  ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<style>
    .section {
        padding: 80px 0;
    }

    .section-header {
        color: #fff;
        margin-bottom: 40px;
        text-align: center;
    }

    .section-header .section-title {
        font-size: 42px;
        margin-top: 0;
        text-transform: uppercase;
        font-weight: 700;
        color: #66b933;
        position: relative;
    }

    .section-header .section-title span {
        color: #66b933;
    }

    .section-header .section-subtitle {
        margin-top: 15px;
        color: #ffffff;
        font-size: 18px;
        font-weight: 400;
    }

    .section-header .section-subtitle2 {
        text-align: justify;
        margin-top: 15px;
        color: #ffffff;
        font-size: 18px;
        font-weight: 400;
    }

    .section-header .lines {
        margin: auto;
        width: 70px;
        position: relative;
        border-top: 2px solid #66b933;
        margin-top: 15px;
    }

    body {
        font-family: "Poppins", sans-serif;
        color: #333;
        font-size: 14px;
        font-weight: 400;
        background: #fff;
        overflow-x: hidden;
        font-family: sans-serif;
    }

    html {
        overflow-x: hidden;
    }

    p {
        font-size: 18px;
        line-height: 30px;
        color: #ffffff;
    }

    a:hover,
    a:focus {
        color: #66b933;
    }

    a {
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Poppins", sans-serif;
        font-size: 40px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    ul {
        margin: 0;
        padding: 0;
    }

    ul li {
        list-style: none;
    }

    a:hover,
    a:focus {
        text-decoration: none;
        outline: none;
    }

    a:not([href]):not([tabindex]) {
        color: #fff;
    }

    a:not([href]):not([tabindex]):focus,
    a:not([href]):not([tabindex]):hover {
        color: #66b933;
    }

    .container {
        margin-right: auto;
        margin-left: auto;
        padding-right: 15px;
        padding-left: 15px;
        width: 100%;
    }

    .container-fluid {
        width: 100%;
        margin-right: auto;
        margin-left: auto;
        padding-right: 15px;
        padding-left: 15px;
        width: 100%;
    }

    table {
        display: table;
        border-collapse: separate;
        box-sizing: border-box;
        text-indent: initial;
        border-spacing: 2px;
        border-color: gray;
    }

    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
    }

    tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    table {
        border-collapse: collapse;
    }

    .table td,
    .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #e9ecef;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #e9ecef;
    }

    .table tbody+tbody {
        border-top: 2px solid #e9ecef;
    }

    .table .table {
        background-color: #fff;
    }

    .table-bordered {
        border: 1px solid #e9ecef;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #e9ecef;
    }

    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 2px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary>td,
    .table-primary>th {
        background-color: #b8daff;
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .table-hover .table-primary:hover>td,
    .table-hover .table-primary:hover>th {
        background-color: #9fcdff;
    }

    .table-secondary,
    .table-secondary>td,
    .table-secondary>th {
        background-color: #dddfe2;
    }

    .table-hover .table-secondary:hover {
        background-color: #cfd2d6;
    }

    .table-hover .table-secondary:hover>td,
    .table-hover .table-secondary:hover>th {
        background-color: #cfd2d6;
    }

    .table-success,
    .table-success>td,
    .table-success>th {
        background-color: #c3e6cb;
    }

    .table-hover .table-success:hover {
        background-color: #b1dfbb;
    }

    .table-hover .table-success:hover>td,
    .table-hover .table-success:hover>th {
        background-color: #b1dfbb;
    }

    .table-info,
    .table-info>td,
    .table-info>th {
        background-color: #bee5eb;
    }

    .table-hover .table-info:hover {
        background-color: #abdde5;
    }

    .table-hover .table-info:hover>td,
    .table-hover .table-info:hover>th {
        background-color: #abdde5;
    }

    .table-warning,
    .table-warning>td,
    .table-warning>th {
        background-color: #ffeeba;
    }

    .table-hover .table-warning:hover {
        background-color: #ffe8a1;
    }

    .table-hover .table-warning:hover>td,
    .table-hover .table-warning:hover>th {
        background-color: #ffe8a1;
    }

    .table-danger,
    .table-danger>td,
    .table-danger>th {
        background-color: #f5c6cb;
    }

    .table-hover .table-danger:hover {
        background-color: #f1b0b7;
    }

    .table-hover .table-danger:hover>td,
    .table-hover .table-danger:hover>th {
        background-color: #f1b0b7;
    }

    .table-light,
    .table-light>td,
    .table-light>th {
        background-color: #fdfdfe;
    }

    .table-hover .table-light:hover {
        background-color: #ececf6;
    }

    .table-hover .table-light:hover>td,
    .table-hover .table-light:hover>th {
        background-color: #ececf6;
    }

    .table-dark,
    .table-dark>td,
    .table-dark>th {
        background-color: #c6c8ca;
    }

    .table-hover .table-dark:hover {
        background-color: #b9bbbe;
    }

    .table-hover .table-dark:hover>td,
    .table-hover .table-dark:hover>th {
        background-color: #b9bbbe;
    }

    .table-active,
    .table-active>td,
    .table-active>th {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover>td,
    .table-hover .table-active:hover>th {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .thead-inverse th {
        color: #fff;
        background-color: #212529;
    }

    .thead-default th {
        color: #495057;
        background-color: #e9ecef;
    }

    .table-inverse {
        color: #fff;
        background-color: #212529;
    }

    .table-inverse td,
    .table-inverse th,
    .table-inverse thead th {
        border-color: #32383e;
    }

    .table-inverse.table-bordered {
        border: 0;
    }

    .table-inverse.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .table-inverse.table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.075);
    }
</style>

<body>
    <section id="services" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"
                    style="color:#black;">Productos en el carrito</h2>
            </div>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <table class="table table-hover" style="color:#black;">
                            <h1>Factura de compra</h1> <br><br>
                            <thead>
                                <tr>
                                    <th style="text-align: justify;">Producto</th>
                                    <th style="text-align: justify;">Cantidad</th>
                                    <th style="text-align: justify;">¢ Precio</th>
                                    <th style="text-align: justify;">¢ SubTotal</th>
                                    <th style="text-align: justify;">¢ Impuesto</th>
                                    <th style="text-align: justify;">¢ Total</th>
                                </tr>
                            </thead>
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
    // Generar el archivo PDF
    $html=ob_get_clean();
    require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf -> getOptions();
    $options -> set(array('isRemoteEnabled' => true));
    $dompdf -> setOptions($options);

    $dompdf -> loadHtml($html);
    $dompdf -> setPaper('A3', 'portrait');

    $dompdf -> render();

    // Obtener el contenido del archivo PDF como una cadena
    $contenido_pdf = $dompdf->output();

    $NombreCliente         =  $_SESSION["Nombre"];

    // Para que el mensaje sea envíado con un formato específico se envía como HTML para una mejor comprensión
    $cuerpo = '<html><body>';
    $cuerpo .= '<p>Estimado (a), '.$NombreCliente.'</p>';
    $cuerpo .= '<p>Gracias por su compra:</p>';
    $cuerpo .= '<p>Si no recuerda haber realizado esta compra, por favor ponerse en contacto con servicio al cliente en cuanto pueda.</p>';
    $cuerpo .= '<p>No responder el correo, este mensaje fue generado automáticamente por el sistema.</p>';
    $cuerpo .= '</body></html>';

    // Enviar el correo electrónico con el contenido del archivo PDF como el cuerpo
    enviarPDF($_SESSION["CorreoElectronico"],'Compra en línea', $cuerpo, $contenido_pdf);

    ConfirmarPagoModel();

    header("Location: ../Views/principal.php");

?>