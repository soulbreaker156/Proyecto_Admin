<?php
require 'conexion.php';
if (!isset($conn)) {
    die("Error: No se pudo conectar a la base de datos.");
}
session_start();

if (!isset($_POST['user']) || !isset($_POST['pass'])) {
    die("Error: Faltan datos del formulario.");
}


$username = trim($_POST['user']);
$password = trim($_POST['pass']);

if (empty($username) || empty($password)) {
    die("Error: Usuario y contraseña no pueden estar vacíos.");
}

$query = "INSERT INTO usuarios (usuario, contrasena) VALUES ($1, $2)";
pg_prepare($conn, "insert_user", $query);
$result = pg_execute($conn, "insert_user", [$username, $password]);

if ($result) {
    echo "Usuario registrado con éxito.";
    header('Location: index.php');
    exit();
} else {
    die("Error al registrar usuario: " . pg_last_error($conn));
}
?>