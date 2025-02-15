<?php
session_start();
if (!isset($_SESSION["usuario"])){ 
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Libro</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="registrar.php">Registrar Libro</a></li>
            <li><a href="listar.php">Listado de Libros</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Registrar Libro</h2>
        <form action="procesar_registro.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br>

            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required><br>

            <label for="precio">Precio:</label>
            <input type="number" step="0.01" id="precio" name="precio" required><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required><br>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
