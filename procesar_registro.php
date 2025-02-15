<?php
include 'includes/conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = isset($_POST["titulo"]) ? trim($_POST["titulo"]) : "";
    $autor = isset($_POST["autor"]) ? trim($_POST["autor"]) : "";
    $precio = isset($_POST["precio"]) ? floatval($_POST["precio"]) : 0;
    $cantidad = isset($_POST["cantidad"]) ? intval($_POST["cantidad"]) : 0;

    if (!empty($titulo) && !empty($autor) && $precio > 0 && $cantidad > 0) {
        $sql = "INSERT INTO libros (titulo, autor, precio, cantidad) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error en la preparación: " . $conn->error);
        }

        $stmt->bind_param("ssdi", $titulo, $autor, $precio, $cantidad);
        if ($stmt->execute()) {
            echo "<script>
                alert('Libro registrado correctamente.');
                window.location.href = 'registrar.php'; // Redirecciona automáticamente
            </script>";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Todos los campos son obligatorios y deben tener valores válidos.');
            window.history.back(); // Vuelve a la página anterior
        </script>";
    }
}
$conn->close();
?>
