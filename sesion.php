<?php
require 'conexion.php';
if (!isset($conn)) {
    die("Error: No se pudo conectar a la base de datos.");
}
session_start();
if (!isset($_POST['user']) || !isset($_POST['pass'])) {
    die("Error: Faltan datos del formulario.");
}

$username = $_POST['user'];
$password = $_POST['pass'];

if (empty($username) || empty($password)) {
    die("Error: Usuario y contraseña estan vacios.");
}

$query = "SELECT * FROM usuarios WHERE usuario = $1 AND contrasena = $2";
pg_prepare($conn,"iniciar_sesion",$query);
$result = pg_execute($conn, "iniciar_sesion", [$username, $password]);
$cantidad = pg_num_rows($result);

if($cantidad > 0){
    $_SESSION['nombre_de_usuario']=&$username;
    pg_close($conn);
    header('Location:inicio.php');
    exit();
}else{
    echo 'Datos incorrectos';
}
?>