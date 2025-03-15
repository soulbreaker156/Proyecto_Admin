<?php
require '../models/usuarioModel.php';
//Objeto que hace el login
class AuthController {
    public function login(){
        //Para iniciar una sesion.
        session_start();
        //Verifica si el metodo que recive es post.
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Acceso no permitido.");
        }
        //Verifica que de donde se envia exista(osea tenga ese nombre);
        if (!isset($_POST['usuario']) || !isset($_POST['contrasena'])) {
            die("Error: Faltan datos del formulario.");
        }
        //Crea el objeto y ejecuta el metodo que se nesecita.
        $usuario = new Usuario();
        $resultado= $usuario->iniciarSesion($_POST['usuario'],$_POST['contrasena']);
        //Verifica el resultado de vuelto y hace algo dependiendo de el.
        if($resultado === true) {
            header('Location:../views/inicio/inicio.php');
            exit();
        }else{
            echo "<script>alert('$resultado'); window.location.href = '../views/index/index.php';</script>";
        }
    }
}
// Se crea la instancia del objeto que hara el login.
$auth = new AuthController();
$auth->login();//Se llama al metodo del objeto que hara el login sino se hace esto no se ejecutara nada.