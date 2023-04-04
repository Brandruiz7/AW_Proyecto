function confirmarInactivacion() {
  //Se obtiene el valor de Usuarios.php que está en el modal con Jquery
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




  
  