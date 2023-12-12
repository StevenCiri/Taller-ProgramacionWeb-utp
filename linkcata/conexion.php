<?php
$host = "roundhouse.proxy.rlwy.net";
$port = 23065; // Reemplaza esto con el puerto correcto de tu base de datos en la nube
$user = "root";
$pass = "162FfbhC6-Ga1eHGG5g66bGhHH4-bC5c";
$datab = "railway";

// Conectar al servidor de base de datos con el puerto especificado
$connection = mysqli_connect($host, $user, $pass, $datab, $port);

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
