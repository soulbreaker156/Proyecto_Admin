<?php
class CConexion{
    function ConexionBD(){
        $host = "localhost";
        $dbname = "login";
        $username = "postgres";
        $password = "admin";

        try{
            $conn = new PDO ("pgsql:host=$host;dbnname=$dbname",$username,$password);
            echo "Se conecto correctamente a la Base de Datos";
        }
        catch( PDOException $exp){
            echo("No se pudo conectar a la base de datos". $exp->getMessage());
        }
        return $conn;
    }
}