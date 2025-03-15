<?php
require '../models/usuarioModel.php';

class RegisterController{
    public function registrar(){
        //Verifica si el metodo que recive es post.
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Acceso no permitido.");
        }
        //Verifica que de donde se envia exista(osea tenga ese nombre);
        if (!isset($_POST['usuario']) || !isset($_POST['contrasena'])) {
            die("Error: Faltan datos del formulario.");
        }
         //Crea el objeto y ejecuta el metodo que se nesecita.
        $registro = new Usuario();
        $resultado = $registro->registroUsuario($_POST['usuario'],$_POST['contrasena']);
        //Verifica el resultado de vuelto y hace algo dependiendo de el.
        if($resultado==true){
            echo"<script>alert('Usuario registrado con exito'); window.location.href = '../views/index/index.php';</script>";
            exit();
        }else{
            echo"<script>alert('$resultado'); window.location.href = '../views/registro/registro.php';</script>";
        }
    }

}
// Se crea la instancia del objeto que hara el Registro.
$instancia = new RegisterController();
$instancia->registrar();//Se llama al metodo del objeto que hara el registro sino se hace esto no se ejecutara nada.