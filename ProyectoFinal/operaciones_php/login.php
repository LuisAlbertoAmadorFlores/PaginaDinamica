<?php
require_once "claseUsuario.php";
require_once "consultas.php";
$usuario = new Usuario(0,0,0);
$consulta = new Consultas();
$usuario->setEmail($_POST['correo']);
$usuario->setPassword($_POST['clave']);
$hash=md5($usuario->getEmail().$usuario->getPassword());
$consulta->iniciarSesion($usuario->getEmail(),$usuario->getPassword(),$hash);
?>