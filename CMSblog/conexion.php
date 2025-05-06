<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // Cambia si tienes contraseña
$basedatos = "blogsystem";

$conn = mysqli_connect($host, $usuario, $contrasena, $basedatos);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
