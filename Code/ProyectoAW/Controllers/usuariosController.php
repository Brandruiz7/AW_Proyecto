<?php
/**
 * Explicación general del controlador:
 * 
 * usuariosController.php es un controlador de las funciones de los usuarios que están 
 * registrados en la página. En él encontrará las funcionalidades como:
 * *
 * *    - Consultar todos los usuarios que hay en la tienda.
 * *    - Consultar las características de un usuario en específico.
 * *    - Consultar los tipos de usuarios que ofrece el administrador.
 * *    - Consultar el estado de los usuarios para ver si están activos o inactivos.
 * *    - CRUD de usuarios de la tienda.
 * *    - Funciones que permiten enviar correos a los clientes.
 * *
 * Se utiliza include_once para mandar a llamar a las funciones del modelo correspondiente
 * y la idea es que pueda ser utilizado solo si el usuario ha iniciado sesión.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.8
 */
include_once '../Models/usuariosModel.php';

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles son
 * los usuarios que están registrados. Si la solicitud devuelve más de cero filas significa
 * que encontró coincidencias y es por ello que se almacenan en la variable $fila y se procesan
 * los datos según sus nombres en la base de datos. Además dependiendo si es usuario es 
 * Administrador / Cliente o el producto se encuentre activo o inactivo, puede ver un enlace
 * de actualizar o eliminar. 
 * 
 * En el caso de que presione el botón de actualizar se activa una función que envía el 
 * consecutivo a la página actualizarUsuario.php, se recibe por medio de un script y se asigna.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.5
 */
function consultarUsuarios(){

    $res = ConsultarUsuariosModel();

    if($res -> num_rows > 0){
        while($fila = mysqli_fetch_array($res)){
            echo    "<tr>";
            echo    "<td>" . $fila["CorreoElectronico"].    "</td>";
            echo    "<td>" . $fila["Cedula"] .              "</td>";
            echo    "<td>" . $fila["Nombre"] .              "</td>";
            echo    "<td>" . $fila["NombreTipoUsuario"].    "</td>";
            echo    "<td>" . $fila["Estado"].               "</td>";
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

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles 
 * son los datos del usuario que tiene el consecutivo que ha sido enviado por parámetro.
 * 
 * @return array                @res                    Devuelve los datos según el consecutivo 
 *                                                      del usuario
 * 
 * @author                      Brandon Ruiz Miranda
 * @version                     1.1
 */
function ConsultarUsuario($consecutivo){
    $res = ConsultarUsuarioModel($consecutivo);
    return mysqli_fetch_array($res);
}

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles 
 * son los tipos de usuario. Si la solicitud devuelve más de cero filas significa que 
 * encontró coincidencias y es por ello que se almacenan en la variable $fila y se procesan
 * los datos según sus nombre en la base de datos.
 * 
 * Además, en el option se le agrega en value el consecutivo del tipo de usuario y se le
 * muestra al usuario el nombre del tipo. De esta manera cuando se envía una solicitud el
 * valor que se obtiene es el consecutivo del producto. Se le agrega un selected para que
 * cuando se abra el desplegable seleccione de una vez el dato que coincide con el registrado.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposUsuario($tipoUsuario){
    $respuesta = ConsultarTiposUsuarioModel();

    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            if($tipoUsuario == $fila["TipoUsuario"]){
            echo "<option selected value=" . $fila["TipoUsuario"] . ">" . $fila["NombreTipoUsuario"] . "</option>";
            }else{
            echo "<option value=" . $fila["TipoUsuario"] . ">" . $fila["NombreTipoUsuario"] . "</option>";                
            }
        }
    }
}

/**
 * Esta función se encarga de mandar una solicitud a la base de datos para conocer cuáles 
 * son los tipos de estado usuario. Si la solicitud devuelve más de cero filas significa que 
 * encontró coincidencias y es por ello que se almacenan en la variable $fila y se procesan
 * los datos según sus nombre en la base de datos.
 * 
 * Además, en el option se le agrega en value el consecutivo del tipo de usuario y se le
 * muestra al usuario el nombre del tipo. De esta manera cuando se envía una solicitud el
 * valor que se obtiene es el consecutivo del producto. Se le agrega un selected para que
 * cuando se abra el desplegable seleccione de una vez el dato que coincide con el registrado.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function ConsultarTiposEstadoUsuario($tipoUsuario){
    $respuesta = ConsultarTiposEstadoUsuarioModel();

    if($respuesta -> num_rows > 0){
        while($fila = mysqli_fetch_array($respuesta)){
            if($tipoUsuario == $fila["TipoEstado"]){
            echo "<option selected value=" . $fila["TipoEstado"] . ">" . $fila["NombreTipoEstado"] . "</option>";
            }else{
            echo "<option value=" . $fila["TipoEstado"] . ">" . $fila["NombreTipoEstado"] . "</option>";                
            }
        }
    }
}

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para poder actualizar
 * los datos del usuario. Por medio del método POST, se recolecta la información de los inputs
 * correspondientes y se almacenan en variables locales.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST["btnActualizar"])){
    $contrasenna    =   $_POST["contrasenna"];
    $cedula         =   $_POST["Identificacion"];
    $nombre         =   $_POST["Nombre"];
    $Estado         = $_POST["Estado"];
    $perfil         =   $_POST["Perfil"];
    $consecutivo    =   $_POST["Consecutivo"];

    $respuesta = ActualizarUsuarioModel($contrasenna,$cedula,$nombre,$Estado, $perfil,$consecutivo);
    
    if($respuesta == true){
        header("Location: ../Views/mantenimientoUsuario.php");
    }
}

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para poder actualizar
 * los datos del Estado. Por medio del método POST, se recolecta la información de los inputs
 * correspondientes y se almacenan en variables locales.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
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
 * Este if - isset se encarga de mandar una solicitud a la base de datos para inactivar 
 * lógicamente un registro de la base de datos cuando se presiona el botón de 
 * inactivar producto.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
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
 * Este if - isset se encarga de mandar una solicitud a la base de datos para inactivar 
 * lógicamente un registro de la base de datos cuando se presiona el botón de 
 * inactivar producto.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
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
 * Este if - isset se encarga de mandar una solicitud a la base de datos para poder registrar
 * los datos del usuario. Por medio del método POST, se recolecta la información de los inputs
 * correspondientes y se almacenan en variables locales.
 * 
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST['btnRegistrar'])){

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
 * Este if - isset se encarga de mandar una solicitud a la base de datos para poder consultar
 * el correo del usuario. Por medio del método POST, se recolecta la información de los inputs
 * correspondientes y se almacenan en variables locales.
 * 
 * Después genera un cuerpo de correo 
 * 
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST["btnRecuperar"])){
    $correoElectronico  =   $_POST["correoElectronico"];
    $res                =   ConsultarCorreoModel($correoElectronico);

    if($res -> num_rows > 0){
        $datosUsuario = mysqli_fetch_array($res);

        $cuerpo = '<html><body>';
        $cuerpo .= '<p>Se ha solicitado la recuperación de la contraseña</p>';
        $cuerpo .= "Su contraseña actual es: " . $datosUsuario["Contrasenna"];
        $cuerpo .= '<p>Gracias por confiar en nosotros</p>';
        $cuerpo .= '<p>Si no recuerda haber realizado esta solicitud, por favor ponerse en contacto con servicio al cliente en cuanto pueda.</p>';
        $cuerpo .= '<p>No responder el correo, este mensaje fue generado automáticamente por el sistema.</p>';
        $cuerpo .= '</body></html>';


        enviarCorreo($correoElectronico, 'Recuperar Contraseña',$cuerpo);
        header("Location: ../Views/login.php");
    }
}

/**
 * Este if - isset se encarga de mandar una solicitud a la base de datos para poder notificar
 * a la empresa que se ha enviado un correo de parte del usuario. Para ello se coloca el 
 * correo de la empresa y se recuperan los datos por medio del método POST y se le envía un
 * cuerpo de mensaje con un encabezado por medio de una función.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
if(isset($_POST['btnNotificar'])){

    $nombre              =  $_POST["nameC"];
    $correoElectronico   =  $_POST["correoC"];
    $mensaje             =  $_POST["message"];
    $correoOficial       =  "RazerAmbienteWeb2@outlook.com";

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
 * Función que se encarga de enviar correo a la empresa o cuando el cliente necesita recuperar
 * la contraseña utilizando la librería de PHPMailer. Hay una función adicional en el caso de 
 * que en un futuro se quiera agregar adjuntos para enviar al cliente.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function enviarCorreo($destinatario, $asunto, $cuerpo){
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
 * Función que se encarga de enviar correo al cliente con la factura que ha sido generada
 * la contraseña utilizando la librería de PHPMailer. También agregar el contenido del adjunto. 
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
 */
function enviarPDF($destinatario, $asunto, $cuerpo, $contenido_adjunto){
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

    $mail -> addStringAttachment($contenido_adjunto, 'factura.pdf', 'base64', 'application/pdf');

    $mail -> send();
}

/**
 * Esta función se encarga de mostrar los testimonios de los usuarios. Si obtiene 
 * coincidencias se agregan a la variable $fila y se procesa el array según los nombres
 * en la base de datos.
 * 
 * @author              Brandon Ruiz Miranda
 * @version             1.1
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