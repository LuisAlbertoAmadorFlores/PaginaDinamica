<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Amador Flores, Perez San Martin" />
    <link rel="icon" type="image/jpg" href="./icono/solo.png" />
    <link rel="stylesheet" type="text/css" href="./style/registrar.css" />

    <title>YILDIZI / Registrar</title>
</head>

<body>
    <div class="barra">
        <div id="logo">
            <img src="./icono/logo.png" alt="logotipo YILDIZI" width="100" />
        </div>
    </div>
    <div class="contenedor">
        <form id="formularioRegistro" method="POST" class="formulario">
            <h1>Registro</h1>
            <h3>Por favor, llene los campos</h3>
            <div class="entrada">
                <label>Nombre</label>
                <input type="text" placeholder=" " id="nombre" name="nombre">
            </div>
            <div class="entrada">
                <label>Correo</label>
                <input type="email" placeholder=" " id="correo" name="correo" onkeyup="comprobarCorreo()">
            </div>
            <div class="entrada">
                <label>Contraseña</label>
                <input type="password" placeholder=" " id="clave" name="clave">
            </div>

            <div id="errorInput" class="entrada" style="display: none">

            </div>
            <div id="emailvalid" class="entrada" style="display: none">

            </div>
            <div id="emailok" class="entrada" style="display: none">

            </div>


            <div id="emailno" class="entrada" style="display: none">

            </div>
            <span id="sp" tabindex="0" data-toggle="tooltip">

                <button id="registro" type="submit" name='submit' >Registrar</button></span>
        </form>
        <div id="exitomsg" class="entrada" style="display: none">

        </div>
        <div id="error" class="entrada" style="display: none">

        </div>
    </div>
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Funciones js -->
    <script type="text/javascript" src="js/comprobarLogin.js"></script>
    <script type="text/javascript" src="js/formulario.js"></script>
    <!--Funciones js -->
</body>

</html>