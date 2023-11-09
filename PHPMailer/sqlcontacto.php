<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = mysqli_real_escape_string($connection, $_POST["nombre"]);
    $asunto = mysqli_real_escape_string($connection, $_POST["asunto"]);
    $correo = mysqli_real_escape_string($connection, $_POST["correo"]);
    $mensaje = mysqli_real_escape_string($connection, $_POST["mensaje"]);

    // Query para insertar los datos en la tabla correspondiente
    $query = "INSERT INTO nombre_de_la_tabla (nombre, asunto, correo, mensaje) VALUES ('$nombre', '$asunto', '$correo', '$mensaje')";

    // Ejecutar la consulta
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "¡Formulario enviado correctamente!";
    } else {
        echo "Error al enviar el formulario: " . mysqli_error($connection);
    }
}

// Cerrar la conexión
mysqli_close($connection);
?>
    