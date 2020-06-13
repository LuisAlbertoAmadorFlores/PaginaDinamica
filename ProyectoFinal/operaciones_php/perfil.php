<?php
require_once "consultas.php";
$consulta = new Consultas();
$consulta->perfilDefault($consulta->getEndUser()) ;
header('location:../principal.php');
?>