<?php
//Funcion que crea la conexion.
function conectar(){
        $conn = pg_connect("host=localhost dbname=login user=postgres password=admin");
            if (!$conn) {
                die("Error al conectar a la base de datos.");
            }
        return $conn;
    }
?>
