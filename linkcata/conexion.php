<?php
$user = "root";
$pass = "4eZt@wR7yXu#2iS";
$host = "localhost";
$datab = "sqlweb";

$connection = mysqli_connect($host, $user, $pass);

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_error($connection));
}

$db = mysqli_select_db($connection, $datab);

if (!$db) {
    die("No se ha podido encontrar la Tabla: " . mysqli_error($connection));
}
?>