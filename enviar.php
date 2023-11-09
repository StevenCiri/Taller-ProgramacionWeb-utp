<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Configuración de conexión a MySQL (usando tu archivo de conexión.php)
include 'linkcata/conexion.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP para el envío de correo
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                               
    $mail->Username   = 'utpastry123@gmail.com';                     
    $mail->Password   = 'lawrxhogwixydptu';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                    

    // Captura de datos del formulario
    $nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
    $asunto = mysqli_real_escape_string($connection, $_POST['asunto']);
    $correo = mysqli_real_escape_string($connection, $_POST['correo']);
    $mensaje = mysqli_real_escape_string($connection, $_POST['mensaje']);

    // Guardar los datos en MySQL
    $query = "INSERT INTO formulario_contacto (nombre, asunto, correo, mensaje) VALUES ('$nombre', '$asunto', '$correo', '$mensaje')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        // Manejo de error al guardar en MySQL
        die("Error al guardar en MySQL: " . mysqli_error($connection));
    }

    // Configuración del envío de correo
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('utpastry123@gmail.com', 'UTPastry');

    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;

    // Envío del correo
    $mail->send();

    // Mensaje de éxito
    echo 'El formulario ha sido enviado y los datos guardados en MySQL correctamente.';
} catch (Exception $e) {
    // Manejo de errores en el envío de correo
    echo "Ha ocurrido un error: {$mail->ErrorInfo}";
}

// Cerrar la conexión a MySQL
mysqli_close($connection);
?>
