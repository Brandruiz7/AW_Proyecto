/**
 * Esta función permite buscar el nombre del usuario por medio de la cédula
 * utilizando el API de hacienda y un AJAX para actualizar el dato en el 
 * campo Nombre sin la necesidad de recargar la página. En caso de no tener 
 * el mínimo de datos o no encontrar coincidencias, se mostrará en blanco. 
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
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