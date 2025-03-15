<?php
session_start();
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    unset($_SESSION['login']); // Eliminar el mensaje después de mostrarlo
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
    <?php if (isset($login)) : ?>
        <script>
            Swal.fire({
                position: "center",
                icon: '<?= $login['tipo'] ?>',
                title: '<?= $login['texto'] ?>',
                showConfirmButton: false,
                timer: 2000,
                backdrop: false
            });
        </script>
    <?php endif; ?>
    <div class="Contenedor">
        <div class="login">
            <h1 class="Titulo">Iniciar sesion</h1>
            <form action="../../controllers/AuthController.php" method="POST">
                <label>
                    <span class="datos">Usuario</span><br>
                    <input type="text" name="usuario" placeholder="Ingrese su Usuario"><br>
                </label>
                <label>
                    <span class="datos">Contraseña</span><br>
                    <input type="text" name="contrasena" placeholder="Ingrese su Contraseña"><br>
                </label>
                <button type="submit">Inciar sesion</button>
            </form>
            <span class="registro">No te has registrado? <a href="../../views/registro/registro.php">registrate</a></span>
        </div>
        
    </div>
    
</body>
</html>