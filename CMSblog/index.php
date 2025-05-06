<?php require_once "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dark Souls Posts</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Dark Souls Posts</h1>
    </header>

    <main>
        <!-- Formulario Nuevo Post -->
        <section id="formulario-post">
            <h2>Crear nueva publicación</h2>
            <form id="postForm" method="POST" action="guardarpost.php" enctype="multipart/form-data">
                <input type="text" name="titulo" id="titulo" placeholder="Título del post" required>
                <textarea name="contenido" id="contenido" placeholder="Contenido del post" required></textarea>
                <input type="file" name="imagen" accept="image/*">
                <button type="submit">Publicar</button>
                <p id="mensaje"></p>
            </form>
        </section>

        <!-- Lista de Posts -->
        <section id="posts">
            <?php
            $query = "SELECT * FROM posts ORDER BY fecha DESC";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<article class='post'>";
                if (!empty($row['imagen'])) {
                    echo "<img src='uploads/" . htmlspecialchars($row['imagen']) . "' alt='Imagen del post'>";
                }
                echo "<h3>" . htmlspecialchars($row['titulo']) . "</h3>";
                echo "<p>" . nl2br(htmlspecialchars($row['contenido'])) . "</p>";
                echo "<small>Publicado el: " . $row['fecha'] . "</small>";
                echo "</article>";
            }
            ?>
        </section>
    </main>

    <!-- Footer -->
    <footer>
  <div class="social-links">
    <a href="https://github.com/Gabrielo2004" target="_blank">GitHub</a> |
    <a href="https://www.instagram.com/gabrielo_rb/" target="_blank">Instagram</a> |
    <a href="https://www.youtube.com/watch?v=Itc-vlXgqQI" target="_blank">YouTube</a>
  </div>
  <p> @ Dark Souls Posts | Todos los derechos reservados</p>
</footer>


    <script src="assets/js/scripts.js"></script>
</body>
</html>
