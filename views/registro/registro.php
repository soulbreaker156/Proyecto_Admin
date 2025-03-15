<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Proyecto Administracion de tecnologias</title>
</head>
<body>
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
            <span class="registro">Ya tienes cuenta <a href="../../views/index/index.php">Inicia Sesion</a></span>
        </div>
    </div>
    
</body>
</html>