<?php
require_once "claseUsuario.php";
require_once "consultas.php";

$usuario = new Usuario(0, 0, 0);
$consulta = new Consultas();
$search = $_POST['valor'];
$numero = 1;
$numero2 = 2;
?>

<!DOCTYPE html>
<html lang="es">

<body>

    <?php
    if ($search == "Kids") {

        echo "<h2>Programas Infantiles</h2>";
        $programas = $consulta->verProgramaskids($numero2, $numero2);
        $peliculas = $consulta->verPeliculaskids($numero, $numero2);
        foreach ($programas as $valor) :

    ?>
            <div class="imgg"><img src="./imagenes/<?php echo $valor['foto']; ?> " width="300" height="300" />
                <div class="texxto">
                    <p><?php echo $valor['nombre']; ?></p>
                </div>
            </div>
        <?php
        endforeach;
        echo "<h2>Peliculas Infantiles</h2>";
        foreach ($peliculas as $peli) {
            echo '<div class="imgg"><img src="./imagenes/' . $peli['foto'] . ' " width="300" height="300" />
                <div class="texxto">
                    <p>' . $peli['nombre'] . '</p>
                </div>
            </div>';
        }
    } elseif ($search == "Familiar") {
        echo "<h2>Programas en  Familia</h2>";
        $perfil = $consulta->verContenidoFamilia($numero2);
        $peliculas = $consulta->verPeliculasFamilia($numero);
        foreach ($perfil as $valor) :
        ?>
            <div class="imgg"><img src="./imagenes/<?php echo $valor['foto']; ?> " width="300" height="300" />
                <div class="texxto">
                    <p><?php echo $valor['nombre']; ?></p>
                </div>
            </div>
        <?php
        endforeach;
        echo "<h2>Peliculas en Familia</h2>";
        foreach ($peliculas as $peli) {
            echo '<div class="imgg"><img src="./imagenes/' . $peli['foto'] . ' " width="300" height="300" />
                <div class="texxto">
                    <p>' . $peli['nombre'] . '</p>
                </div>
            </div>';
        }
    } 
    elseif (($search!="Kids" and $search!="Familiar")&& $search!="nuevo") {
        echo "<h2>Programas </h2>";
        $perfil = $consulta->verContenidoAleatorio($numero2);
        $peliculas = $consulta->verPeliculasAleatorio($numero);
        foreach ($perfil as $valor) :
        ?>
            <div class="imgg"><img src="./imagenes/<?php echo $valor['foto']; ?> " width="300" height="300" />
                <div class="texxto">
                    <p><?php echo $valor['nombre']; ?></p>
                </div>
            </div>
    <?php
        endforeach;
        echo "<h2>Peliculas </h2>";
        foreach ($peliculas as $peli) {
            echo '<div class="imgg"><img src="./imagenes/' . $peli['foto'] . ' " width="300" height="300" />
                <div class="texxto">
                    <p>' . $peli['nombre'] . '</p>
                </div>
            </div>';
        }
    }
    elseif ($search = "nuevo") {
        header('location:nuevoperfil.php');
    } 
    ?>
</body>

</html>