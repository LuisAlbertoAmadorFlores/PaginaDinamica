<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Amador Flores, Perez San Martin" />
    <link rel="icon" type="image/jpg" href="./icono/solo.png" />
    <link rel="stylesheet" type="text/css" href="./style/ingresar.css" />
    <title>YILDIZI / Ingresar</title>
</head>

<body>
    <div class="contenedor">
        <div class="barra">
            <div class="logo">
                <img src="./icono/logo.png" alt="logotipo YILDIZI" />
                <h2>YILDIZI</h2>
            </div>
            <div class="menu">
                <a href="registrar.php">Crear Cuenta</a>
            </div>
        </div>

        <form id="formularioLogin" method="POST" class="formulario">
            <h1>Bienvenido</h1>
            <h3>Ingrese los datos requeridos</h3>
            <div class="entrada">
                <input id="correo" type="email" placeholder="Correo" name="correo">
            </div>
            <div class="entrada">
                <input id="clave" type="password" placeholder="Contraseña" name="clave">
            </div>
            <div id="errorInput" class="entrada" style="display: none">

            </div>
            <div id="exitomsg" class="entrada" style="display: none">

            </div>
            
            <div id="error" class="entrada" style="display: none">

            </div>

            <div id="mensaje" class="formulario">

            </div>

            <button type="submit">Entrar</button>
        </form>
    </div>
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Funciones js -->
    <script type="text/javascript" src="js/comprobarLogin.js"></script>

    <script type="text/javascript" src="js/formulario.js"></script>
    <!--Funciones js -->
</body>

</html>