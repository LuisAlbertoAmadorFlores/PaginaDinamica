<?php
require_once "claseUsuario.php";
require_once "consultas.php";
session_start();
$usuario = new Usuario(0,0,0);
$consulta = new Consultas();

if(isset($_SESSION['usuario'])){
    $usuario=unserialize($_SESSION['usuario']);    
} 
$usuario->setNombre($_POST['valor']);
$search = $_POST['valor'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Amador Flores, Perez San Martin" />
        <link rel="icon" type="image/jpg" href="../icono/solo.png" />
        <title>YILDIZI / Perfil</title>
    </head>
    <body>
        <h1>Edita tu Perfil</h1>
        
                <img src="imagenes/foto1.png" with="400" height="400"/>
        
                <form  method="POST" >
                    <h3>Llene los campos</h3>
                    <div class="entrada">
                    <?php 
                        $perfil=$consulta->verPerfilEditar($usuario->getId(),$_POST['valor']);                       
                        ?>
                        <select id="actual" required>
                        <option value="<?php echo $search ?>"></option>
                        </select>
                        <label >Nombre:</label><label>(Actual: <?php echo $search = $_POST['valor']; ?>) </label>
                        
                        <input type="text" placeholder="" id="name" required="required">
                    
                   
                        <label>Idioma:</label><label>(Actual: <?php echo $perfil['nombreIdioma']; ?>)</label>
                        <select class="opcion" name="idioma" id="lenguaje" required>
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
                    
                        <label>Clasificacion:</label><label>(Actual: <?php echo $perfil['nombreClasificacion']; ?>)</label>
                        <select class="opcion" name="clasificacion" id="tipo" required>
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
                    
                        <button id="actualizar">Actualizar</button>
                        <button id="reset" type="reset">Borrar</button>
                    
                </form>
        <script type="text/javascript" src="//code.jquery.com/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="./js/perfil.js"></script>

        <script>
        $("#reset").on("click", function () {
            $('.opcion option').prop('selected', function() {
            return this.defaultSelected;
            });
        });
        </script>
    </body>
</html>