<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = strip_tags(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = strip_tags(trim($_POST["mensaje"]));

    // Cambia esta dirección de correo por la dirección a la que quieres recibir los mensajes
    $para = "adrigv2020@gmail.com";
    
    $asunto = "Nuevo mensaje de contacto de $nombre";
    
    $contenido_email = "Nombre: $nombre\n";
    $contenido_email .= "Email: $email\n\n";
    $contenido_email .= "Mensaje:\n$mensaje\n";

    $cabeceras = "From: $nombre <$email>";

    if (mail($para, $asunto, $contenido_email, $cabeceras)) {
        echo "Gracias por tu mensaje. Te contactaremos pronto.";
    } else {
        echo "Lo sentimos, hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    echo "Hubo un error al procesar tu solicitud. Por favor, inténtalo de nuevo.";
}
?>
