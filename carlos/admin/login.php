<?php
session_start();

// Definir las credenciales del administrador
$admin_username = "CarlosRR0919"; // Cambia esto por el nombre de usuario deseado
$admin_password = "MaxwellR@mirez"; // Cambia esto por la contraseña deseada

// Verificar si se han enviado las credenciales
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Comprobar las credenciales
    if ($username === $admin_username && $password === $admin_password) {
        // Iniciar sesión
        $_SESSION['admin_logged_in'] = true;
        header('Location: upload.php'); // Redirigir al formulario de subida
        exit();
    } else {
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>