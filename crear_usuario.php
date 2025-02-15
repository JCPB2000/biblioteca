<?php
include 'includes/conexion.php';

$username = "admin";  // Usuario
$password = "admin123";  // Contraseña en texto plano

// Encripta la contraseña con password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Verifica si el usuario ya existe
$sql = "SELECT id FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "El usuario '$username' ya existe en la base de datos.";
} else {
    // Inserta el usuario con la contraseña encriptada
    $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Usuario creado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
