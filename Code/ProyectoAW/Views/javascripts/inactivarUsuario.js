/**
 * Esta función se encarga de inactivar un registro de un usuario.
 * Para ello obtiene el valor que se encuentra en consecutivoUsuario,
 * y se envía a usuarioController solo cuando se presiona el botón 
 * btnInactivar, por medio del parámetro Consecutivo.
 * 
 * @author        Brandon Ruiz Miranda
 * @version       1.1
 */
function confirmarInactivacion() {

  var consecutivo = document.getElementById("consecutivoUsuario").value; 
  $.ajax({
    type: "POST",
    url: "../Controllers/usuariosController.php",
    data: {
      btnInactivar: true, 
      Consecutivo: consecutivo
    },
    dataType: "json",
    success: function(data) {
      alert(data.mensaje);
      window.location.reload();
    }
  });
}




  
  