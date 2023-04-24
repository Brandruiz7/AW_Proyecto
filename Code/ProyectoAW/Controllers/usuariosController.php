<?php

include_once '../Models/usuariosModel.php';

/**
 * Se encarga de consultar los usuarios que hay en la base de datos. La idea es
 * que por medio de consultarUsuariosModel, se haga la consulta en la base y 
 * devuelva las coincidencias que existan. Pero esto solo se podrá hacer si ya el usuario
 * se encuentra con la sesión iniciada, porque en el modelo se solicitan las varibles
 * de sesión que se encuentran en loginController.php
 */
function consultarUsuarios(){

    $res = ConsultarUsuariosModel();

    /**
     * Funcionamiento del if:
     * 
     * Este if verifica si el resultado de la consulta anterior tuvo más de cero
     * filas como respuesta. Si es correcto, entra al if y después a un while que devolverá
     * todas las coincidencias de cada uno de los usuarios que se encuentran registrados en la
     * base de datos y se imprimen en pantalla con un echo.
     * 
     * Si no retorna filas, significa que no hubo coincidencias y redirecciona se muestra el 
     * mensaje por medio de un echo.
     */
    if($res -> num_rows > 0){
        while($fila = mysqli_fetch_array($res)){
            echo    "<tr>";
            echo    "<td>" . $fila["CorreoElectronico"].    "</td>";
            echo    "<td>" . $fila["Cedula"] .              "</td>";
            echo    "<td>" . $fila["Nombre"] .              "</td>";
            echo    "<td>" . $fila["NombreTipoUsuario"].    "</td>";
            echo    "<td>" . $fila["Estado"].               "</td>";
            
            /**
             * Funcionamiento del IF:
             * 
             * Este if recibe la variable de sesión de usuario que ha iniciado sesión 
             * y le muestra los datos según el tipo de usuario (Administrador o cliente). 
             * Después se hace una validación, si el estado del usuario recuperado 
             * anteriormente es Activo, entonce debe mostrar un echo que permita 
             * actualizar y eliminar lógicamente un registro. En caso contrario solo actualizar.
             * 
             * Nota: ?q=" . $fila["ConsecutivoUsuario"] . " es para buscar el usuario con el 
             * consecutivo sin cargar la página
             * 
             * Con el onclick='setConsecutivoUsuario(this.dataset.id) se envía el consecutivo
             * por medio de la función que está en el sitio donde se llame el <script>
             * 
             */
            if($_SESSION["TipoUsuario"] == 1){
                if($fila["Estado"] == "Activo"){
                    echo    "<td>
                            <a href='../Views/actualizarUsuario.php?q=" . $fila["ConsecutivoUsuario"] . "'>Actualizar</a> 
                            | <a href='' data-toggle='modal' data-target='#exampleModal' data-id=". $fila['ConsecutivoUsuario'] ." name='btnDesactivar' id='btnDesactivar'
                            onclick='setConsecutivoUsuario(this.dataset.id)'>Eliminar</a>
                            </td>";
                }else{
                    echo    "<td>
                            <a href='../Views/actualizarUsuario.php?q=" . $fila["ConsecutivoUsuario"] . "'>Actualizar</a>
                            </td>";
                }
            }else{
                echo    "<td>
                        <a href='../Views/actualizarUsuario.php?q=" . $fila["ConsecutivoUsuario"] . "'>Actualizar</a>
                        </td>"; 
            }
            echo    "</tr>";
        }
    }else{        
        echo "No hay datos";
    }
}

function ConsultarUsuario($consecutivo){
    $res = ConsultarUsuarioModel($consecutivo);
    return mysqli_fetch_array($res);
}

function ConsultarTiposUsuario($tipoUsuario)
{
    $respuesta = ConsultarTiposUsuarioModel();

    if($respuesta -> num_rows > 0)
    {
        while($fila = mysqli_fetch_array($respuesta))
        {
            if($tipoUsuario == $fila["TipoUsuario"]){
            // El primero es el código interno y el otro es lo que el usuario ve
            echo "<option selected value=" . $fila["TipoUsuario"] . ">" . $fila["NombreTipoUsuario"] . "</option>";
            }else{
            // El primero es el código interno y el otro es lo que el usuario ve
            echo "<option value=" . $fila["TipoUsuario"] . ">" . $fila["NombreTipoUsuario"] . "</option>";                
            }

        }
    }
}

if(isset($_POST["btnActualizar"])){
    $contrasenna    =   $_POST["contrasenna"];
    $cedula         =   $_POST["Identificacion"];
    $nombre         =   $_POST["Nombre"];
    $perfil         =   $_POST["Perfil"];
    $consecutivo    =   $_POST["Consecutivo"];

    $respuesta = ActualizarUsuarioModel($contrasenna,$cedula,$nombre, $perfil,$consecutivo);
    
    if($respuesta == true){
        header("Location: ../Views/mantenimientoUsuario.php");
    }
}

if(isset($_POST["btnActualizarPerfil"])){
    $contrasenna        =   $_POST["contrasenna"];
    $correoElectronico  =   $_SESSION["CorreoElectronico"];
    $Telefono           =   $_POST["Telefono"];
    $consecutivo        =   $_POST["Consecutivo"];
    

    $respuesta = EditarPerfilUsuarioModel($contrasenna,$correoElectronico,$Telefono,$consecutivo);
    
    if($respuesta == true){
        header("Location: ../Views/principal.php");
    }
}

/**
 * Permite inactivar un registro mientras se presione el botón btnInactivar. La idea
 * es que si se recibe un consecutivo entre al if y lo envíe por medio de parámetro en 
 * ActualizarEstadoUsuarioModel y el usuario se inactive lógicamente en la base de datos.
 */
if(isset($_POST["btnInactivar"])){
    
    if(isset($_POST["Consecutivo"])){

        $res = ActualizarEstadoUsuarioModel($_POST["Consecutivo"]);
        if($res){
            echo "El usuario se desactivó";
        }
        else{
            echo "Hubo un error desactivando el usuario";
        }
    }
}

/**
 * Se ejecuta cuando se envía la consulta por medio del Ajax en el Js funcionesRegistro.js
 * el dato viaja a la base de datos por medio de buscarUsuarioModel. Si devuelve filas
 * significa que el correo registrado ya tiene datos.
 */
if(isset($_POST["buscarUsuario"])){

    $res = ConsultarCorreoModel($_POST["correo"]);

    if($res -> num_rows > 0){
        echo "El correo ya se encuentra registrado";
    }
    else{
        echo "OK";
    }
}

/**
 * Se ejecuta cuando se presione el botón btnRegistrar, este if - isset se encarga de 
 * se enviar una solicitud a registrarModel. Si el registro develve un true, significa
 * que el registro del nuevo usuario se hizo sin problemas y se redireccion al usuario
 * a la página de login.php
 */

if(isset($_POST['btnRegistrar'])){

    /**
     * Se almacenan los datos que se encuentran en la vista regitrar.php para 
     * posteriormente ser enviados por medio de parámetros a registrarModel que 
     * se encargará de hacer la interacción con la base de datos.
     */
    $nombre             =   $_POST['Nombre'];
    $cedula             =   $_POST['Identificacion'];
    $correoElectronico  =   $_POST['correoElectronico'];
    $telefono           =   $_POST['telefono'];
    $contrasenna        =   $_POST["contrasenna"];

    $res = RegistrarModel($nombre, $cedula, $correoElectronico, $telefono, $contrasenna);

    if($res == true){
        header("Location: ../Views/login.php");
    }
}

/**
 * Se activa cuando se presiona el botón btnRecuperar, este if - isset permite
 * que el cliente recupere la contraseña ya que es enviada por parámetro de 
 * $datosUsuario por correo al cliente que lo solicita. NO es lo correcto, ya que
 * hay que cumplir con una serie de requisitos previos en producción para hacerlo
 * de la mejor manera posible.
 */
if(isset($_POST["btnRecuperar"]))
{
    $correoElectronico  =   $_POST["correoElectronico"];
    $res                =   BuscarUsuariosModel($correoElectronico);

    if($res -> num_rows > 0){
        $datosUsuario = mysqli_fetch_array($res);
        $cuerpo = "Su contraseña actual es: " . $datosUsuario["Contrasenna"];

        enviarCorreo($correoElectronico, 'Recuperar Contraseña',$cuerpo);
        header("Location: ../Views/login.php");
    }
}

/**
 * Se ejecuta cuando se presiona el botón btnNotificar, este se utiliza para enviar un mensaje de un 
 * usuario por medio del campo Contactenos que se encuentra en el Front-End.
 */
if(isset($_POST['btnNotificar'])){

    /**
     * Se traen los campos que se encuentran en la sección de contáctenos. Esos campos son: nombre de la
     * persona que quiere ponerse en contacto con la empresa, el correo electrónico y el mensaje que 
     * quiere enviar.
     * 
     * Después todos se almacena en una variable para posteriormente ser enviada al correo empresarial.
     */
    $nombre              =  $_POST["nameC"];
    $correoElectronico   =  $_POST["correoC"];
    $mensaje             =  $_POST["message"];
    $correoOficial       =  "RazerAmbienteWeb2@outlook.com";

    // Para que el mensaje sea envíado con un formato específico se envía como HTML para una mejor comprensión
    $cuerpo = '<html><body>';
    $cuerpo .= '<p>Estimado encargado,</p>';
    $cuerpo .= '<p>El cliente: ' . $nombre . ', con el correo: ' . $correoElectronico . ', te ha escrito el siguiente mensaje:</p>';
    $cuerpo .= '<p>' . $mensaje . '</p>';
    $cuerpo .= '<p>Por favor, ponerse en contacto con el cliente en cuanto pueda.</p>';
    $cuerpo .= '<p>No responder el correo, este mensaje fue generado automáticamente por el sistema.</p>';
    $cuerpo .= '</body></html>';

    enviarCorreo($correoOficial, 'Mensaje de cliente',$cuerpo);
    header("Location: ../Views/principal.php");
}

/**
 * Esta función se encarga de enviar el correo a los clientes. Es una propiedad de phpMailer.
 */
function enviarCorreo($destinatario, $asunto, $cuerpo)
{
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer();
    $mail -> CharSet = 'UTF-8';

    $mail -> IsSMTP();
    $mail -> Host = 'smtp.office365.com'; // smtp.gmail.com     
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587; // 465 // 25                               
    $mail -> SMTPAuth = true;
    $mail -> Username = 'RazerAmbienteWeb2@outlook.com';               
    $mail -> Password = 'fidelitas1';  
    
    /**  
     *  Este código lo que hace es ir a la vista notificarUsuario.php y buscar
     *  el campo de enviarFile si se ha seleccionado algo desde el explorador 
     *  de archivos. Si es correcto, lo que hace es adjuntar ese archivo y el
     *  nombre del mismo con el método AddAttachment.
     */

    if (isset($_FILES['enviarFile']) && $_FILES['enviarFile']['error'] == UPLOAD_ERR_OK) {
        $mail -> AddAttachment($_FILES['enviarFile']['tmp_name'], $_FILES['enviarFile']['name']);
    } else {
        echo "Error al cargar el archivo.";
    }
    
    $mail -> SetFrom('RazerAmbienteWeb2@outlook.com', "Razer Team");
    $mail -> Subject = $asunto;
    $mail -> MsgHTML($cuerpo);   
    $mail -> AddAddress($destinatario, 'UsuarioRazer');

    $mail -> send();
}

/**
 * Esta función se encarga de enviar el pdf a los clientes. Para ello, se utiliza una serie 
 * de parámetros 
 */
function enviarPDF($destinatario, $asunto, $cuerpo, $contenido_adjunto)
{
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer();
    $mail -> CharSet = 'UTF-8';

    $mail -> IsSMTP();
    $mail -> Host = 'smtp.office365.com'; // smtp.gmail.com     
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587; // 465 // 25                               
    $mail -> SMTPAuth = true;
    $mail -> Username = 'RazerAmbienteWeb2@outlook.com';               
    $mail -> Password = 'fidelitas1';  
    
    $mail -> SetFrom('RazerAmbienteWeb2@outlook.com', "Razer Team");
    $mail -> Subject = $asunto;
    $mail -> MsgHTML($cuerpo);   
    $mail -> AddAddress($destinatario, 'UsuarioRazer');

    // Agregar el archivo PDF como un adjunto
    $mail -> addStringAttachment($contenido_adjunto, 'factura.pdf', 'base64', 'application/pdf');

    $mail -> send();
}

/**
 * Esta función permite que en la página se carguen los testimonios
 * de las personas. Estos están almacenados en la base de datos, lo que
 * significa que pueden ser actualizados desde allí. **
 */
function MostrarTestimonios(){
    $res = ConsultarTestimoniosModel();

    if($res -> num_rows > 0){
        while($fila = mysqli_fetch_array($res)){
            echo'
                <div class="testimonial-item">
                    <img src="'.$fila["Ruta"].'" alt="Client Testimonoal" />
                    <div class="testimonial-text">
                        '.$fila["Testimonio"].'
                        <h3>'.$fila["Nombre"].'</h3>
                        <span>'.$fila["Nombre_TipoCliente"].'</span>
                    </div>
                </div>  
            ';
        }
    }
}

?>