<?php
include 'includes/conexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID no válido.");
}

$id = intval($_GET['id']);
$sql = "DELETE FROM libros WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
        alert('Libro eliminado correctamente.');
        window.location.href = 'listar.php';
    </script>";
} else {
    echo "Error al eliminar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
