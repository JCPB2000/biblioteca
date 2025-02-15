<header>    
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php if (isset($_SESSION["usuario"])): ?>
                <li><a href="registrar.php">Registrar Libro</a></li>
                <li><a href="listar.php">Listado de Libros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
