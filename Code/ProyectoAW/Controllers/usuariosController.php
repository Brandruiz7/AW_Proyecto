<?php

include_once '../Models/usuariosModel.php';

function consultarUsuarios(){

    //Los datos recibidos se pasan al modelo y luego van a la base de datos
    $res = consultarUsuariosModel();

    if($res -> num_rows > 0){
        // Se extrae los datos y se guarda en el array según las posiciones
        while($fila = mysqli_fetch_array($res)){
            echo    "<tr>";
            echo    "<td>" . $fila["CorreoElectronico"].    "</td>";
            echo    "<td>" . $fila["Cedula"] .              "</td>";
            echo    "<td>" . $fila["Nombre"] .              "</td>";
            echo    "<td>" . $fila["Apellidos"] .              "</td>";
            echo    "<td>" . $fila["NombreTipoUsuario"].    "</td>";
            echo    "<td>" . $fila["Estado"].               "</td>";

            // ?q=" . $fila["ConsecutivoUsuario"] . " es para buscar el usuario con el consecutivo sin cargar la página
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

if(isset($_POST["btnInactivar"])){
    if(isset($_POST["Consecutivo"])){
        $res = actualizarDatosModel($_POST["Consecutivo"]);
        if($res){
            echo "El usuario se desactivó";
        }
        else{
            echo "Hubo un error desactivando el usuario";
        }
    }
}


if(isset($_POST["buscarCedula"])){

    $res = buscarUsuarioModel($_POST["cedula"]);

    if($res -> num_rows > 0){
        echo "La cédula ya se encuentra registrada";
    }
    else{
        echo "OK";
    }
}


if(isset($_POST['btnRegistrar'])){
    $nombre             =   $_POST['nombre'];
    $apellidos          =   $_POST['apellidos'];
    $cedula             =   $_POST['cedula'];
    $correoElectronico  =   $_POST['correoElectronico'];
    $telefono           =   $_POST['telefono'];
    $contrasenna        =   $_POST["contrasenna"];


    $res = registrarModel($nombre,$apellidos, $cedula, $correoElectronico, $telefono, $contrasenna);

    if($res == true){
        header("Location: ../Views/login.php");
    }
}

if(isset($_POST['btnNotificar'])){
    $nombre=$_POST["nameC"];
    $correoElectronico=$_POST["correoC"];
    $mensaje=$_POST["message"];
    $correoOficial = "pruebaPAW@outlook.com";

    $cuerpo = "El cliente: ". $nombre. ", con el correo: ".$correoElectronico. ", te ha escrito el siguiente mensaje: "
    .$mensaje;
    enviarCorreo($correoOficial, 'Mensaje de cliente',$cuerpo);
    header("Location: ../Views/principal.php");
}

if(isset($_POST["btnRecuperar"]))
{
    $correoElectronico = $_POST["correoElectronico"];
    $res = BuscarUsuariosModel($correoElectronico);

    if($res -> num_rows > 0){
        $datosUsuario = mysqli_fetch_array($res);
        $cuerpo = "Su contraseña actual es: " . $datosUsuario["Contrasenna"];

        enviarCorreo($correoElectronico, 'Recuperar Contraseña',$cuerpo);
        header("Location: ../Views/login.php");
    }
}

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
    $mail -> Username = 'pruebaPAW@outlook.com';               
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
    
    $mail -> SetFrom('pruebaPAW@outlook.com', "Mate Team");
    $mail -> Subject = $asunto;
    $mail -> MsgHTML($cuerpo);   
    $mail -> AddAddress($destinatario, 'UsuarioMate');

    $mail -> send();
}

?>
