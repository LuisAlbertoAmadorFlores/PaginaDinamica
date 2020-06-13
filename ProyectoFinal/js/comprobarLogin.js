$(document).ready(function() {  
    $('#registro').click(function(){
    if ($("#correo").val().indexOf('@', 0) == -1 || $("#correo").val().indexOf('.', 0) == -1 ) {
        $("#emailvalid").html("Ingrese un correo electrónico válido");
        $("#emailno").hide();
        $("#emailok").hide();
        $("#emailvalid").show();
        return false;
    }
    });
});
function comprobarCorreo() {
    
    jQuery.ajax({
        url: "./operaciones_php/comprobar.php",
        data: 'correo=' + $("#correo").val(),
        type: "POST",

        success: function (resultado) {
            
            if (resultado == 1) {

                $("#emailno").html("Correo electrónico en uso");
                $("#emailvalid").hide();
                $("#emailok").hide();
                $("#emailno").show();
                $('#registro').attr("disabled", true);
                $('#sp').attr("title", "Revise sus datos para poder continuar");

            } else if (resultado == 0) {

                $("#emailok").html("Correo electrónico disponible");
                $("#emailvalid").hide();
                $("#emailno").hide();
                $("#emailok").show();
                $('#registro').attr("disabled", false);
                $('#sp').removeAttr("title");
            }

        },

    });

}
