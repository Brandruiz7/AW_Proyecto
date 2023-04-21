function buscarNombreApi(){
    
    // El numeral es por ser Jquery
    let identificacion = $("#Identificacion").val();

    if(identificacion.trim().length >= 9 ){
    $.ajax({
        type            : 'GET',
        datetype        : 'json',
        url: 'https://api.hacienda.go.cr/fe/ae?identificacion=' + identificacion,
        success: function(res){
            $("#Nombre").val(res.nombre);
        }
      });
    }else{
        $("#Nombre").val("");
    }
}