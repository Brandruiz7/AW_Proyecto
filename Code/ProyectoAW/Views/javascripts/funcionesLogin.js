/**
 * Esta función verifica si los campos de login.php están completos.
 * Primero se encarga de traer los datos de correoElectronico y 
 * contrasenna, si están completos habilita el botón btnIniciarSesion.
 */
function habilitarCampos(){

    let correo  = document.getElementById("correoElectronico").value;
    let clave   = document.getElementById("contrasenna").value;

    if(correo.trim() != "" && clave.trim() != ""){
      document.getElementById("btnIniciarSesion").disabled = false;
    }else{
      document.getElementById("btnIniciarSesion").disabled = true;
    }
    
  }