<?php
require_once "claseUsuario.php";
require_once "consultas.php";

$usuario = new Usuario(0, 0, 0);
$consulta = new Consultas();
$search = $_POST['busqueda'];
?>

<!DOCTYPE html>
<html lang="es">

<body>

    <?php
    if (!empty($search)) {
        echo "<h2>Resultados de $search</h2>";
        $categoria = $consulta->getCategoria();
        foreach ($categoria as $ca) {
            echo "<h1 style='color:white;'>Categoria" . " " . $ca['nombreCategoria'] . "</h1><br><br>";

            $busqueda = $consulta->busqueda($search);
            foreach ($busqueda as $valor) :
                if ($ca['idCategoria'] == $valor['Categoria_idCategoria']) {
    ?>
                    <div class="imgg"><img src="./imagenes/<?php echo $valor['foto']; ?> " width="300" height="300" />
                        <div class="texxto">
                            <p><?php echo $valor['nombre']; ?></p>
                            <p><?php echo $valor['descripcion']; ?></p>
                        </div>
                    </div>
    <?php
                }
            endforeach;
        }
    }
    ?>
</body>

</html>