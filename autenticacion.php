<?php

/*$servername = "localhost"; // Dirección del servidor de la base de datos (puede variar)
$username_db = "tu_usuario_de_bd"; // Tu nombre de usuario de la base de datos
$password_db = "tu_contraseña_de_bd"; // Tu contraseña de la base de datos
$database = "nombre_de_tu_base_de_datos"; // Nombre de la base de datos

// Establecer la conexión
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifica las credenciales (esto es solo un ejemplo, deberías usar una base de datos y encriptar contraseñas en una aplicación real)
    $valid_username = "simon"; // Reemplaza con tu nombre de usuario válido
    $valid_password = "login"; // Reemplaza con tu contraseña válida

    if ($username === $valid_username && $password === $valid_password) {
        // Autenticación exitosa, redirige a la página de bienvenida o el panel de control
        header("Location: home.php"); // Reemplaza con la URL correcta
        exit();
    } else {
        // Autenticación fallida, muestra un mensaje de error
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}
?>
