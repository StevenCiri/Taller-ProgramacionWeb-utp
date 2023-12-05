<?php
$user = "root";
$pass = "4eZt@wR7yXu#2iS";
$host = "localhost";
$datab = "sqlweb";

// Conectar al servidor de base de datos
$connection = mysqli_connect($host, $user, $pass);

// Verificar la conexión
if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

// Seleccionar la base de datos
$db = mysqli_select_db($connection, $datab);

// Verificar la selección de la base de datos
if (!$db) {
    die("No se ha podido encontrar la Tabla: " . mysqli_error($connection));
}
?>
