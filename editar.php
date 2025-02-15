<?php
include 'includes/conexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID no válido.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM libros WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$libro = $result->fetch_assoc();

if (!$libro) {
    die("Libro no encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    $autor = trim($_POST["autor"]);
    $precio = floatval($_POST["precio"]);
    $cantidad = intval($_POST["cantidad"]);

    $sql = "UPDATE libros SET titulo=?, autor=?, precio=?, cantidad=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $titulo, $autor, $precio, $cantidad, $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Libro actualizado correctamente.');
            window.location.href = 'listar.php';
        </script>";
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h2>Editar Libro</h2>
    <form method="post">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($libro['titulo']); ?>" required><br>

        <label>Autor:</label>
        <input type="text" name="autor" value="<?php echo htmlspecialchars($libro['autor']); ?>" required><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?php echo $libro['precio']; ?>" required><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $libro['cantidad']; ?>" required><br>

        <button type="submit">Actualizar Libro</button>
    </form>
</body>
</html>
