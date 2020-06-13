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
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Amador Flores, Perez San Martin" />
        <link rel="icon" type="image/jpg" href="./icono/solo.png" />
        
        <title>YILDIZI / Perfil</title>
    </head>
    <body>
        <h1>Crea tu Perfil</h1>
                <img src="./imagenes/foto1.png" with="400" height="400"/>
            
                <form method="POST" id="dato">
                    <h3>Llene los campos</h3>
                    <?php                        
                        ?>
                        <label>Nombre:</label>
                        
                        <input type="text" placeholder="" id="nombre" required="required">

                        <label>Idioma:</label>
                        <select class="opcion" name="idioma" id="idioma" required>
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
                    
                        <label>Clasificacion:</label>
                        <select class="opcion" name="clasificacion" id="clasificacion" required>
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
                    
                        <button type="submit">Crear Perfil</button>
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