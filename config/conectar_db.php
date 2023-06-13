<?php
    define ("USER_DB","luispe");
    define ("PASSWORD","1234");
    try {
        $dsn = "mysql:host=localhost;dbname=conrecuga";
        $con = new PDO($dsn, USER_DB, PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->exec("SET lc_time_names='es_ES'");
    } catch (PDOException $e){
        echo "Error de conexión con la base de datos ".$e->getMessage();
    }
?>