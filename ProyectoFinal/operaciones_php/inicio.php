<?php
require_once "claseUsuario.php";
require_once "consultas.php";
session_start();
$usuario = new Usuario(0,0,0);
$consulta = new Consultas();

if(isset($_SESSION['usuario'])){
    $usuario=unserialize($_SESSION['usuario']);    
} 
 else 
{
    header("location:../ingresar.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>P&aacute;gina principal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <a href="cerrarSesion.php">Cerrar sesi&oacute;n</a>
    <h1>Nombre usuario: <?php echo $usuario->getNombre(); ?> </h1>
    <h2>ID: <?php echo $usuario->getId(); ?></h2>
    Clasificaci&oacute;n
    <select name="clasificacion" id="clasificacion" required>
    <option value="" selected disabled>Selecciona una opci&oacute;n</option>

        <?php 
        
         $clasificaciones=$consulta->verClasificacion();
            foreach($clasificaciones as $clasificacion):
         ?>
        <option value="<?php echo $clasificacion['idClasificacion']; ?>"><?php echo $clasificacion['nombreClasificacion']; ?></option>
        <?php 
            endforeach;
        ?>
    </select>
    Idioma
    <select name="idioma" id="idioma" required>
    <option value="" selected disabled>Selecciona una opci&oacute;n</option>

        <?php 
        
         $idiomas=$consulta->verIdiomas();
            foreach($idiomas as $idioma):
         ?>
        <option value="<?php echo $idioma['idIdioma']; ?>"><?php echo $idioma['nombreIdioma']; ?></option>
        <?php 
            endforeach;
        ?>
    </select>
</body>

</html>