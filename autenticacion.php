<?php
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
