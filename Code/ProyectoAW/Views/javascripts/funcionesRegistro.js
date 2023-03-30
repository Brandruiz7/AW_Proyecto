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
