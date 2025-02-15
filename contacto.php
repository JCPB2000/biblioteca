<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="registrar.php">Registrar Libro</a></li>
                <li><a href="listar.php">Listado de Libros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Contacto</h2>
        <form action="enviar_contacto.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>

