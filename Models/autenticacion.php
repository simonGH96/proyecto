<?php

$servername = "localhost"; // Dirección del servidor de la base de datos (puede variar)
$username_db = "root"; // Tu nombre de usuario de la base de datos
$password_db = ""; // Tu contraseña de la base de datos
$database = "proyecto_consejerias"; // Nombre de la base de datos

// Establecer la conexión
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consultar la base de datos para verificar las credenciales
    $query = "SELECT * FROM Docente WHERE correo = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Autenticación exitosa
        // Redirige al usuario a la página de inicio o el panel de control
        header("Location: ../Views/index.php"); // Reemplaza con la URL correcta
        exit();
    } else {
        // Autenticación fallida, muestra un mensaje de error
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

?>
