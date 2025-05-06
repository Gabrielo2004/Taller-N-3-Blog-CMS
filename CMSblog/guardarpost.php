<?php
require_once "conexion.php";

$titulo = $_POST['titulo'] ?? '';
$contenido = $_POST['contenido'] ?? '';
$nombreImagen = null;

// Validar campos
if (!empty(trim($titulo)) && !empty(trim($contenido))) {
    // Procesar imagen si se subió
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = "uploads/";
        $nombreImagen = time() . "_" . basename($_FILES["imagen"]["name"]);
        $rutaDestino = $directorio . $nombreImagen;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino);
    }

    // Insertar en base de datos
    $query = "INSERT INTO posts (titulo, contenido, imagen) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $titulo, $contenido, $nombreImagen);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: index.php");
exit();
?>
