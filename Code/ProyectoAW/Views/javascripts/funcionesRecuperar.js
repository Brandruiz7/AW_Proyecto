/**
 * Esta función se encarga de traer el dato del campo correoElectronico
 * y enviarlo por medio de un Ajax para hacer una consulta a la base de
 * datos. Si el dato devuelve un OK significa que no hay coincidencias
 * y el botón btnRecuperar se inactiva, en caso contrario se activa.
 * 
 * @author          Brandon Ruiz Miranda
 * @version         1.1
 */
function ValidarCorreo()
{
    let Correo = $("#correoElectronico").val();

    $.ajax({
        type: 'POST',
        url: '../Controllers/usuariosController.php',
        data: { 
            'BuscarUsuario':'BuscarUsuario',
            'Correo' : Correo
        },
        success: function (res) {
            if(res == "OK")
            {
                alert("El correo ingresado no existe");
                $("#btnRecuperar").prop("disabled",true);
            }
            else
            {
                $("#btnRecuperar").prop("disabled",false);
            }
        }
    });
}