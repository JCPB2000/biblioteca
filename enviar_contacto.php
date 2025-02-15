<?php
include 'includes/conexion.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        echo "<script>alert('Mensaje enviado correctamente.'); window.location.href='contacto.php';</script>";
    } else {
        echo "<script>alert('Error al enviar el mensaje.'); window.location.href='contacto.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: contacto.php");
    exit();
}
?>
