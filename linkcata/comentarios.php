<?php
include("conexion.php");

$nombre = "";
$comentario = "";
$puntuacion = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $comentario = $_POST["comentario"];
    $puntuacion = $_POST["puntuacion"];

    $instruccion_SQL = "INSERT INTO comentarios (nombre, comentario, puntuacion) VALUES ('$nombre', '$comentario', $puntuacion)";
    $resultado = mysqli_query($connection, $instruccion_SQL);

    if (!$resultado) {
        die("No se ha podido realizar la inserción de comentarios: " . mysqli_error($connection));
    }
}

$consulta = "SELECT * FROM comentarios";
$result = mysqli_query($connection, $consulta);

if (!$result) {
    die("No se ha podido realizar la consulta: " . mysqli_error($connection));
}

?>