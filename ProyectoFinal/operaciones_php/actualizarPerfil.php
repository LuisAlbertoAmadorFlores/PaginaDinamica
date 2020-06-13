<?php
require_once "claseUsuario.php";
require_once "consultas.php";
session_start();
$usuario = new Usuario(0,0,0);
$consulta = new Consultas();

    $usuario=unserialize($_SESSION['usuario']);
    //echo $usuario->getId();    

$perfil=$_POST['perfil'];
$nombre=$_POST['nombre'];
$idioma=$_POST['idioma'];
$clasificacion=$_POST['clasificacion'];

$consulta->actualizarPerfil($nombre,$idioma,$clasificacion,"foto.jpg",$usuario->getId(),$perfil);
?>