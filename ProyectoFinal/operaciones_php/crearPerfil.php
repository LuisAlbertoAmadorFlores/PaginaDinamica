<?php
require_once "claseUsuario.php";
require_once "consultas.php";
session_start();
$usuario = new Usuario(0, 0, 0);
$consulta = new Consultas();
if(isset($_SESSION['usuario'])){
    $usuario=unserialize($_SESSION['usuario']);    
} 
$nombre=$_POST['nombre'];
$idioma=$_POST['idioma'];
$clasificacion=$_POST['clasificacion'];
$foto='user.png';

$consulta->registrarPerfil($nombre,$clasificacion,$idioma,$usuario->getId(),$foto);
?>