/**
 * Esta función se encarga de validar si el correo tiene coincidencias
 * en la base de datos por medio de un Ajax. Para ello, se recupera 
 * el dato que está almacenado en el campo correoElectronico, y se envía a 
 * usuarioController a un if - isset llamado buscarUsuario.
 * 
 * Si recibe un OK significa que hay coincidencia y se inactiva el 
 * botón btnRegistrar, caso contrario se activa.
 */
function validarCorreo(){

  let Correo = $("#correoElectronico").val();

  $.ajax({
    type    : 'POST',
    url     : '../Controllers/usuariosController.php',
    data: {
      'buscarUsuario':'buscarUsuario',
      'correo' : Correo 
    },
    success: function(res){
      if(res.trim() != "OK"){
        alert(res);
        $("#btnRegistrar").prop("disabled", true);
      }
      else{
        $("#btnRegistrar").prop("disabled", false); 
      }
    }
  });
}