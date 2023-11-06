<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                               
    $mail->Username   = 'utpastry123@gmail.com';                     
    $mail->Password   = 'lawrxhogwixydptu';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                    

    $mail->setFrom($_POST['correo'], $_POST['nombre']);
    $mail->addAddress('utpastry123@gmail.com', 'UTPastry');

    $mail->isHTML(true);                                 
    $mail->Subject = $_POST['asunto'];
    $mail->Body    = $_POST['mensaje'];
   
    $mail->send();
    echo 'El correo ha sido enviado correctamente :)';
} catch (Exception $e) {
    echo "Ha ocurrido un error al enviar el correo :( {$mail->ErrorInfo}";
}

?>

