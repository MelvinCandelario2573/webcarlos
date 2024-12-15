<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivos</title>
</head>
<body>
    <h1>Subir Imágenes o Videos</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="fileToUpload">Selecciona un archivo:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <button type="submit">Subir Archivo</button>
    </form>
    <a href="index.html">Volver a la Página Principal</a>

    <?php
    // Manejar la subida de archivos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $target_dir = "assets/images/"; // Cambia a "assets/videos/" si es un video
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
        // Verificar si el archivo es una imagen o un video
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif', 'mp4'])) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "El archivo ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " ha sido subido.";
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.";
            }
        } else {
            echo "Solo se permiten archivos de imagen o video.";
        }
    }
    ?>
</body>
</html>