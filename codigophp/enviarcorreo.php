<?php
include "../claves.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = htmlspecialchars(filter_var($_POST['nombre'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = htmlspecialchars(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $recipient = htmlspecialchars(filter_var($_POST['receptor'], FILTER_SANITIZE_EMAIL));
    $message = htmlspecialchars(filter_var($_POST['mensaje'], FILTER_SANITIZE_SPECIAL_CHARS));
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST["g-recaptcha-response"];
    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey1&response=$captcha&remoteip=$ip");
    $atributos = json_decode($respuesta,true);
    if($atributos != null){
        if($atributos["success"]){
            // Configurar los detalles del correo
            $subject = "Nuevo mensaje de $name";
            $body = "Nombre: $name\nCorreo: $email\n\nMensaje:\n$message";
            $headers = "From: $email";

            // Enviar el correo
            
            if (mail($recipient, $subject, $body, $headers)) {
                echo '<script>
                    window.location.href = "../universidad.php?universidad=' . $_POST['universidad'] . '&enviado=true#redes";
                </script>';
            } else {
                echo "Error al enviar el correo.";
            }
        }else {
            echo "falta el captcha";
        }
    }else {
        echo "falta el captcha";
    }
    echo '<script>
window.location.href = "../universidad.php?universidad=' . $_POST['universidad'] . '&enviado=false#redes";
</script>';

}
?>
