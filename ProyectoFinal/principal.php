<?php
require_once "operaciones_php/claseUsuario.php";
require_once "operaciones_php/consultas.php";
session_start();
$usuario = new Usuario(0, 0, 0);
$consulta = new Consultas();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header("location:ingresar.php");
}
$id = $usuario->getEmail();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Entretenimiento por streaming" />
    <meta name="keywords" content="Streaming, Entretenimiento, Video, Programas, Peliculas" />
    <meta name="author" content="Amador Flores, Perez San Martin" />
    <link rel="icon" type="image/jpg" href="./icono/solo.png" />
    <link rel="stylesheet" type="text/css" href="./style/principal.css" />
    <link rel="stylesheet" type="text/css" href="./slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css" />
    <title>YILDIZI</title>
</head>

<body>
    <span class="ancla">
        <a href="#inicio"><img src="./icono/image.png" alt="logotipo YILDIZI" width="50" /></a>
    </span>
    <header>
        <div class="contenedor">
            <div id="logo">
                <A name="inicio" id="inicio"><img src="./icono/logo.png" alt="logotipo YILDIZI" width="100" /></A>
            </div>
            <nav>
                <ul>
                    <ul>

                        <li><button value="0">Todos</button></li>
                        <li><button value="1">Peliculas</button></li>
                        <li><button value="2">Programas</button></li>
                        <li><a id="editar"><img src="./icono/user.png" alt="logotipo YILDIZI" width="50" /></a></li>
                        <li>Cuenta:<?php echo $id; ?></li>
                        <li><select id="perfil">
                                <?php
                                $perfil = $consulta->verPerfil($usuario->getId());
                                foreach ($perfil as $clasificacion) :
                                    //echo "</li><li><img src='./icono/'.$clasificacion[foto].' alt='logotipo YILDIZI' width='50' /></li>";
                                ?>
                                    <option value="<?php echo $clasificacion['nombrePerfil']; ?>"><?php echo $clasificacion['nombrePerfil']; ?></option>

                                <?php

                                endforeach;
                                ?>
                                <option value="nuevo">Crear nuevo perfil</option>
                            </select></li>
                        <li><label>Buscar:</label>
                            <input type="text" placeholder="Escribe aqui..." id="buscar"></li>
                        <li><a href="operaciones_php/cerrarSesion.php"><img src="./icono/salir.png" alt="Salir" width="110" /></a></li>

                    </ul>
                </ul>
            </nav>
        </div>
    </header>
    <section>
        <h1 id="destacado">Lo m&aacute;s destacado</h1>
        <div class="nuevos">
            <?php
            $contenidos = $consulta->verTodoContenidoTOP();
            foreach ($contenidos as $contenido) :
            ?>
                <div class="img"><img src="./imagenes/<?php echo $contenido['foto']; ?>" width="300" height="300" />
                    <div class="texxto">
                        <p><?php echo $contenido['nombre']; ?></p>
                    </div>
                </div>

            <?php
            endforeach;

            ?>
        </div>
    </section>

    <section id="cargaexterna">

    </section>

    <section>
        <h2>El cine en tu casa</h2>
        <div class="peliculas">
            <div class="imgg"><img src="./imagenes/angel.jpg" />
                <div class="texxto">
                    <p>Indiana Jones</p>
                </div>
            </div>
            <div class="imgg"><img src="./imagenes/boda.jpg" />
                <div class="texxto">
                    <p>Matrix</p>
                </div>
            </div>
            <div class="imgg"><img src="./imagenes/duende.jpg" />
                <div class="texxto">
                    <p>Star Wars</p>
                </div>
            </div>
            <div class="imgg"><img src="./imagenes/libros.jpg" />
                <div class="texxto">
                    <p>007 Casino Royale</p>
                </div>
            </div>
        </div>
    </section>
    <footer>

    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-3.3.0.js"></script>
    <script type="text/javascript" src="./slick/slick.min.js"></script>
    <script type="text/javascript" src="./js/contenido.js"></script>
    <script type="text/javascript" src="./js/perfil.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.nuevos').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                pauseOnHover: false,
            });

            $('.ancla').click(function() {
                $('body, html').animate({
                    scrollTop: '0px'
                }, 300)
            })
        });
    </script>
</body>

</html>