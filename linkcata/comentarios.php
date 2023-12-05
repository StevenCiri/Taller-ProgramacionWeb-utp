<?php
include("conexion.php");

// Función para obtener el ID de la página del campo oculto
function obtenerIdPagina($connection) {
    if (isset($_POST["id_pagina"])) {
        // Si se envió el formulario, toma el valor del campo oculto
        return mysqli_real_escape_string($connection, $_POST["id_pagina"]);
    } else {
        // Si no se envió el formulario, obtén el nombre del archivo
        $url = $_SERVER['PHP_SELF'];
        $nombreArchivo = pathinfo($url, PATHINFO_FILENAME);
        return $nombreArchivo;
    }
}

$nombre = "";
$comentario = "";
$puntuacion = "";
$id_pagina = obtenerIdPagina($connection); // Pasar $connection como parámetro

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($connection, $_POST["nombre"]);
    $comentario = mysqli_real_escape_string($connection, $_POST["comentario"]);
    $puntuacion = mysqli_real_escape_string($connection, $_POST["puntuacion"]);

    // Obtener la fecha actual
    $fecha_publicacion = date('Y-m-d H:i:s');

    $instruccion_SQL = "INSERT INTO comentarios (nombre, comentario, puntuacion, id_pagina, fecha_publicacion) VALUES ('$nombre', '$comentario', '$puntuacion', '" . obtenerIdPagina($connection) . "', '$fecha_publicacion')";
    $resultado = mysqli_query($connection, $instruccion_SQL);

    if (!$resultado) {
        die("No se ha podido realizar la inserción de comentarios: " . mysqli_error($connection));
    }
}

$consulta = "SELECT * FROM comentarios WHERE id_pagina = '" . obtenerIdPagina($connection) . "'";
$result = mysqli_query($connection, $consulta);

if (!$result) {
    die("No se ha podido realizar la consulta: " . mysqli_error($connection));
}
?>