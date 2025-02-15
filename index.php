<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <!-- Menú de Navegación -->
    <nav>
        <ul class="nav-menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="registrar.php">Registrar Libro</a></li>
            <li><a href="listar.php">Listado de Libros</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- Banner de Bienvenida -->
    <div class="welcome-banner">
        ¡Bienvenido a la Biblioteca Virtual!
    </div>

    <!-- Sección de Tarjetas -->
    <div class="cards-container">
        <div class="card">
            <img src="https://media.istockphoto.com/id/1411701868/es/foto/magic-book-with-glitter-libro-abierto-con-luces-que-brillan-en-el-fondo-oscuro.jpg?s=612x612&w=0&k=20&c=SHpdYT20NIlRE1-y5Jj7ETWtj6zU9k2IwviLFJ2oRsA=" alt="Nuevos Libros">
            <h3>Nuevos Libros</h3>
            <p>Descubre los últimos títulos añadidos a nuestra biblioteca.</p>
            <a href="listar.php">Ver más</a>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/179/179871.png" alt="Contacto">
            <h3>Contacto</h3>
            <p>¿Tienes alguna duda? Contáctanos para más información.</p>
            <a href="contacto.php">Contáctanos</a>
        </div>
    </div>
</body>
</html>
