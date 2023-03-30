
function habilitarCampos(){

    let correo = document.getElementById("correoElectronico").value;
    let clave = document.getElementById("contrasenna").value;

    if(correo.trim() != "" && clave.trim() != ""){
      document.getElementById("btnIniciarSesion").disabled = false;
    }else{
      document.getElementById("btnIniciarSesion").disabled = true;
    }
    
  }