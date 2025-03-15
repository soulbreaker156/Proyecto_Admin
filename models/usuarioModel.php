<?php

require '../config/conexion.php';
class Usuario{
   private $conn;

   public function __construct(){
    $this->conn = conectar();
   }
   //Iniciar sesion
   public function iniciarSesion($usuario,$contrasena){
    //Verifica que lo que recive no venga vacios.
    if (empty($usuario) || empty($contrasena)) {
        die("Error: Usuario y contraseña estan vacios.");
    }
    
    $query = "SELECT * FROM usuarios WHERE usuario = $1 AND contrasena = $2";
    pg_prepare($this->conn,"iniciar_sesion",$query);
    $result = pg_execute($this->conn, "iniciar_sesion", [$usuario, $contrasena]);
    $cantidad = pg_num_rows($result);
    
    if($cantidad > 0){
        $_SESSION['nombre_de_usuario']=&$usuario;
        return true;
    }else{
        return 'Datos incorrectos.';
    }
   }
   //Registrar usuario
   public function registroUsuario($usuario,$contrasena){
    //Verifica que lo que recive no venga vacio.
    if (empty($usuario) || empty($contrasena)) {
        die("Error: Campo vacio.");
    }

    $query = "INSERT INTO usuarios(usuario,contrasena)VALUES($1,$2)";
    pg_prepare($this->conn,"registrar_usuario",$query);
    $result=pg_execute($this->conn,"registrar_usuario",[$usuario,$contrasena]);

    if($result){
        return true;
    }else{
        return 'Datos no registrados.';
    }
   }
    //Cerrar conexion
    public function __destruct(){
        pg_close($this->conn);
    }
}
?>