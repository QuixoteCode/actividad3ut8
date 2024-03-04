<?php

    //Datos de la conexión
    $servidor = "localhost";
    $usuario = "root";
    $contrasenia = "";

    $con = new mysqli($servidor, $usuario, $contrasenia);
    
    if ($con->connect_error) {
        die("La conexión número 1 (la de la creacción de la base) ha fallado, dando este código de error: " . $con->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS clientela";
    if ($con->query($sql) === TRUE) {
        echo "Base de datos creada con éxito";
    } else {
        echo "Error creando la base de datos: " . $con->error;
    }


    //Cerramos la conexión
    $con->close();

    //Volvemos a conectarnos con la nueva base
    $con = new mysqli($servidor, $usuario, $contrasenia, "clientela");


    if ($con->connect_error) {
        die("La conexión número 2 (la de la creacción de la tabla) ha fallado, dando este código de error: " . $con->connect_error);
    }




    /*Damos un nuevo valor a la variable sql para nuestro nuevo propósito
        Nótese que no le damos "NOT NULL" a telefono pues, por defecto, las claves primarias no pueden ser nulas*/
    $sql = "CREATE TABLE IF NOT EXISTS clientes (
        telefono VARCHAR(15) PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        direccion VARCHAR(100) NOT NULL,
        ciudad VARCHAR(25) NOT NULL,
        provincia VARCHAR(20) NOT NULL,
        codPostal VARCHAR(10) NOT NULL
    )";

?>