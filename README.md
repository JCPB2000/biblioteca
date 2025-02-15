# Biblioteca Virtual

La Biblioteca Virtual es una plataforma diseñada para facilitar la administración de libros y mejorar la experiencia de los usuarios en la consulta y gestión de recursos bibliográficos. A través de este sistema, los usuarios pueden registrar, listar, editar y eliminar libros de manera eficiente, además de enviar mensajes de contacto para consultas o soporte.

El sistema incorpora autenticación de usuarios mediante sesiones, garantizando un acceso seguro y personalizado. Además, se implementó encriptación de contraseñas con password_hash(), reforzando la seguridad de los datos almacenados.

El diseño de la interfaz es intuitivo y adaptable, utilizando HTML, CSS y PHP para asegurar una experiencia fluida en distintos dispositivos. Asimismo, la base de datos en MySQL permite el almacenamiento y gestión eficiente de los registros, asegurando integridad y consistencia en la información.

Gracias a la estructura modular del código, el sistema puede ser fácilmente escalable e integrado con nuevas funcionalidades en el futuro, convirtiéndolo en una herramienta versátil para la gestión bibliográfica en entornos académicos o personales.

![Proyecto](https://github.com/JCPB2000/biblioteca/blob/main/Image%201.jpeg)

## Características del Proyecto

✔ **Gestión de Libros:** Se procedió a realizar la funcionalidad para registrar, editar, eliminar y listar libros.  
✔ **Sistema de Autenticación:** Se implementó el registro e inicio de sesión de usuarios con encriptación de contraseñas.  
✔ **Gestión de Usuarios:** Se verificó que solo usuarios autenticados puedan acceder a la gestión de libros.  
✔ **Contacto:** Se procedió a crear un formulario para enviar mensajes y almacenarlos en la base de datos.  
✔ **Diseño Responsivo:** Se aplicaron estilos con **HTML y CSS** para mejorar la interfaz.  


##  Instalación y Configuración

### Requisitos Previos
Antes de comenzar, se debe tener instalado lo siguiente:

- XAMPP para ejecutar un servidor local.
- Navegador Web (Chrome, Firefox, Edge, etc.).
- Editor de código (Visual Studio Code).
  
## Estructura del Proyecto
```
📂 biblioteca/
│── 📂 includes/           # Se procedió a almacenar archivos de conexión y menú
│   ├── conexion.php       # Conexión a la base de datos
│   ├── menu.php           # Menú de navegación
│── 📂 styles/             # Se procedió a definir los estilos en CSS
│   ├── styles.css         # Estilos principales
│── contacto.php           # Se procedió a crear la página de contacto
│── crear_usuario.php      # Se procedió a desarrollar el registro de usuarios
│── editar.php             # Página para editar libros
│── eliminar.php           # Script para eliminar libros
│── enviar_contacto.php    # Se implementó el procesamiento de mensajes
│── index.php              # Página principal de la biblioteca
│── listar.php             # Se procedió a listar libros desde la base de datos
│── login.php              # Página de inicio de sesión
│── logout.php             # Se implementó el cierre de sesión
│── procesar_registro.php  # Se agregó el procesamiento del registro
│── registrar_usuario.php  # Página para registrar un nuevo usuario
│── registrar.php          # Página para registrar libros
│── README.md              # Documentación del proyecto

```
## Cómo Usar el Sistema
 Registro de Usuarios
1. Ir a http://localhost/biblioteca/crear_usuario.php.
2. Completar el formulario y hacer clic en Registrar.
3. Se procederá a redirigir al usuario a la página de inicio de sesión.

## Inicio de Sesión
1. Acceder a http://localhost/biblioteca/login.php.
2. Ingresar usuario y contraseña.
3. Se verificará si las credenciales son correctas para acceder al sistema.
   
## Gestión de Libros
* Se puede agregar un nuevo libro en http://localhost/biblioteca/registrar.php.
* Listar libros en http://localhost/biblioteca/listar.php.
* Editar libros en http://localhost/biblioteca/editar.php.
* Eliminar libros en http://localhost/biblioteca/eliminar.php.

## Formulario de Contacto
Acceder a http://localhost/biblioteca/contacto.php.
Completar el formulario y enviarlo.
Se procederá a almacenar los mensajes en la base de datos.

## Cerrar Sesión
* Hacer clic en Cerrar Sesión o ir a http://localhost/biblioteca/logout.php.

## Seguridad Implementada
* Se procedió a implementar autenticación con sesiones en PHP.
* Las contraseñas se encriptan con password_hash().
* Protección contra inyecciones SQL mediante mysqli_prepare().
* Se sanitizan entradas con htmlspecialchars().
* Confirmaciones en eliminaciones para evitar borrados accidentales.

## Código Relevante para el Proyecto.
Manejo de Sesiones y Seguridad (login.php)
```
<?php
session_start();
include 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["usuario"] = $user["username"];
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post">
            <label>Usuario:</label>
            <input type="text" name="username" required><br>
            <label>Contraseña:</label>
            <input type="password" name="password" required><br>
            <button type="submit">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <a href="registrar_usuario.php">Regístrate aquí</a></p>
    </div>
</body>
</html>
```

## Equipo de Desarrollo
Este proyecto fue desarrollado como parte de una actividad académica. Los integrantes del equipo son:

* Julio Cesar Paguay Bonilla
* Tiffani Nathalia Torres Díaz
* Yampuezan Burbano Verónica Janeth

## FIN
