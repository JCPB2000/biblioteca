<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
include 'includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Libros</title>
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
        <h2>Listado de Libros</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM libros";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['titulo']) . "</td>
                        <td>" . htmlspecialchars($row['autor']) . "</td>
                        <td>" . htmlspecialchars($row['precio']) . "</td>
                        <td>" . htmlspecialchars($row['cantidad']) . "</td>
                        <td>
                            <a href='editar.php?id=" . htmlspecialchars($row['id']) . "'>Editar</a> | 
                            <a href='eliminar.php?id=" . htmlspecialchars($row['id']) . "' onclick='return confirm(\"¿Seguro que deseas eliminar este libro?\");'>Eliminar</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
