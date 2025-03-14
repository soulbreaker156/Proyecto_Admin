<?php
session_start();
$miusername=$_SESSION['nombre_de_usuario'];
echo "<h1>Bienvenido $miusername</h1>";
?>