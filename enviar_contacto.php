<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Placeholder: Process the form data (e.g., send an email or save to a database)
    echo "Gracias, $nombre. Hemos recibido tu mensaje.";
} else {
    header('Location: contacto.php');
    exit;
}
