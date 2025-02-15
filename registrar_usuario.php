<?php
include 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    if ($password !== $confirm_password) {
        $error = "Las contraseñas no coinciden.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT id FROM usuarios WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "El usuario '$username' ya existe.";
        } else {
            $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                echo "<script>
                    alert('Usuario registrado correctamente.');
                    window.location.href = 'login.php';
                </script>";
            } else {
                $error = "Error al registrar el usuario.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Usuario</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post">
            <label>Usuario:</label>
            <input type="text" name="username" required><br>
            <label>Contraseña:</label>
            <input type="password" name="password" required><br>
            <label>Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" required><br>
            <div class="button-group">
                <button type="submit">Registrar</button>
                <button type="button" onclick="window.location.href='login.php'">Regresar</button>
            </div>
        </form>
    </div>
</body>
</html>
