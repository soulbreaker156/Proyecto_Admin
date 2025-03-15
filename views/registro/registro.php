<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']); // Eliminar el mensaje después de mostrarlo
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/Css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Proyecto Administracion de tecnologias</title>
</head>
<body>
<?php if (isset($mensaje)) : ?>
        <script>
            Swal.fire({
                position: "top-end",
                icon: '<?= $mensaje['tipo'] ?>',
                title: '<?= $mensaje['texto'] ?>',
                showConfirmButton: false,
                timer: 2000,
                backdrop: false
            });
        </script>
    <?php endif; ?>
    <div class="Contenedor">
        <div class="login">
            <h1 class="Titulo">Registrate</h1>
            <form action="../../controllers/RegisterController.php" method="POST">
                <label>
                    <span class="datos">Usuario</span><br>
                    <input type="text"name='usuario' placeholder="Ingrese su Usuario"><br>
                </label>
                <label>
                    <span class="datos">Contraseña</span><br>
                    <input type="text" name ='contrasena' placeholder="Ingrese su Contraseña"><br>
                </label>
                <button type="submit">Registrarse</button>
            </form>
            <span class="registro">Ya tienes cuenta <a href="../../views/login/login.php">Inicia Sesion</a></span>
        </div>
    </div>
    
</body>
</html>