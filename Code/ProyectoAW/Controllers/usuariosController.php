<?php

include_once '../Models/usuariosModel.php';


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
