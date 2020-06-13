<?php
require_once "operaciones_php/claseUsuario.php";
require_once "operaciones_php/consultas.php";

$usuario = new Usuario(0, 0, 0);
$consulta = new Consultas();

?>

<!DOCTYPE html>
<html lang="es">

<body>

    <?php
    $ID = $_GET['contenido'];
    if ($ID == 0) {

    ?>
        <h2>El mejor contenido</h2>

        <h3 id="contenidos">Listado Completo</h3>
        <div class="programas">
            <?php
            $contenidos = $consulta->verTodoContenido();
            foreach ($contenidos as $contenido) :
            ?>

                <div class="imgg"><img src="./imagenes/<?php echo $contenido['foto']; ?>" width="300" height="300" />
                    <div class="texxto">
                        <p><?php echo $contenido['nombre']; ?></p>
                    </div>
                </div>

            <?php
            endforeach;
            ?>
        </div>
    <?php
    } else {

    ?>

        <?php
        if ($ID == 1) {


        ?>
            <h2>El cine en tu casa</h2>

            <h3 id="contenidos">Listado Pel&iacute;culas</h3>
            

        <?php
        }
        ?>
        <?php
        if ($ID == 2) {


        ?>
            <h2>Disfruta de producciones entretenidas</h2>
            <h3 id="contenidos">Listado Programas</h3>

        <?php
        }
        ?>


        
        <div class="programas">


            <?php
            $contenidos = $consulta->verContenido($ID);
            foreach ($contenidos as $contenido) :
            ?>
                <div class="imgg"><img src="./imagenes/<?php echo $contenido['foto']; ?> " width="300" height="300" />
                    <div class="texxto">
                        <p><?php echo $contenido['nombre']; ?></p>
                    </div>
                </div>

        <?php
            endforeach;
        }
        ?>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.nuevos').click({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
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