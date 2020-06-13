<?php
require_once "claseUsuario.php";
require_once "consultas.php";
$usuario = new Usuario(0,0,0);
$consulta = new Consultas();
$usuario->setEmail($_POST['correo']);
if($consulta->comprobarCorreo($usuario->getEmail())){
    echo 1;
}else{
    echo 0;
}
?>