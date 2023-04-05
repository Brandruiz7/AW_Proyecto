/**
 * Esta función se encarga de validar si la cédula tiene coincidencias
 * en la base de datos por medio de un Ajax. Para ello, se recupera 
 * el dato que está almacenado en el campo cedula, y se envía a 
 * usuarioController a un if - isset llamado buscarCedula.
 * 
 * Si recibe un OK significa que hay coincidencia y se inactiva el 
 * botón btnRegistrar, caso contrario se activa.
 */
function validarCedula(){

    let Cedula = $("#cedula").val();
  
    $.ajax({
      type    : 'POST',
      url     : '../Controllers/usuariosController.php',
      data: {
        'buscarCedula':'buscarCedula',
        'cedula' : Cedula 
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
