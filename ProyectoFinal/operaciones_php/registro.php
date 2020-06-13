<?php
require_once "claseUsuario.php";
require_once "consultas.php";
$usuario = new Usuario(0,0,0);
$consulta = new Consultas();
$usuario->setNombre($_POST['nombre']);
$usuario->setEmail($_POST['correo']);
$usuario->setPassword($_POST['clave']);
   if($consulta->comprobarCorreo($usuario->getEmail())){
     echo 2;
   }
   else
    {
    $hash=md5($usuario->getEmail().$usuario->getPassword());
    $estado=1;
    $consulta->registrarUsuario($usuario->getNombre(),$usuario->getEmail(),$usuario->getPassword(),$hash,$estado);
    }

?>