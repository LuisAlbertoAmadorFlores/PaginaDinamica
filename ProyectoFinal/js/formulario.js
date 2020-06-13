//Formulario Login
$("#formularioLogin").on("submit", function (e) {
    var correo = $("#correo").val();
    var password = $("#clave").val();

    if ($("#correo").val() == "") {
        $("#errorInput").html("Ingrese su correo");
        $("#error").hide();
        $("#errorInput").show();
    }
    else if ($("#clave").val() == "") {
        $("#errorInput").html("Ingrese su contraseña");
        $("#error").hide();
        $("#errorInput").show();
    }

    else {
        jQuery.ajax({
            type: "POST",
            url: "./operaciones_php/login.php",
            data: { "correo": correo, "clave": password },
            success: function (resultado) {

                if (resultado == 1) {
                    $("#exitomsg").html("Inicio de sesión exitoso, espere por favor...");
                    $("#error").hide();
                    $("#errorInput").hide();
                    $("#exitomsg").show();
                    $("#exito").show();

                    setTimeout(function () {
                        window.location.replace("principal.php");
                    }, 4000);

                }
                else if(resultado == 0){
                    $("#error").html("Usuario o Contraseña incorrectos");
                    $("#exito").hide();
                    $("#errorInput").hide();
                    $("#error").show();

                }
            }

        });
    }
    e.preventDefault();
});

///Formulario Registro
$("#formularioRegistro").on("submit", function (e) {
var user_name = $("#nombre").val();
var email = $("#correo").val();
var password = $("#clave").val();

if ($("#nombre").val() == "") {
    $("#errorInput").html("Ingrese un nombre de usuario");
    $("#error").hide();
    $("#errorInput").show();
}
else if ($("#correo").val() == "") {
    $("#errorInput").html("Ingrese un correo");
    $("#error").hide();
    $("#errorInput").show();
}

else if ($("#clave").val() == "") {
    $("#errorInput").html("Ingrese una contraseña");
    $("#error").hide();
    $("#errorInput").show();
}


else {
    jQuery.ajax({
        type: "POST",
        url: "./operaciones_php/registro.php",
        data: { "nombre": user_name,"correo": email ,"clave": password },
        success: function (resultado) {

            if (resultado == 1) {
                
                $("#exitomsg").html("Registro exitoso,a continuación ingrese sus credenciales, espere por favor...");
                $("#error").hide();
                $("#errorInput").hide();
                $("#exitomsg").show();
                //$("#exito").show();

                setTimeout(function () {
                    window.location.replace("./operaciones_php/perfil.php");
                }, 4000);

            }
            else if(resultado == 2){      
                $("#error").html("Este correo ya está registrado, intente de nuevo con otro");
                $("#exitomsg").hide();
                $("#errorInput").hide();
                $("#error").show();
            }
        }

    });
}
e.preventDefault();
});

