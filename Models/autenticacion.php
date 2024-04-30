<?php

require '../Config/Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consultar la base de datos para verificar las credenciales
    $query = "SELECT * FROM Docente WHERE correo = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Autenticación exitosa
        // Redirige al usuario a la página de inicio o el panel de control
        header("Location: ../Views/index.php"); 
        exit();
    } else {
        // Autenticación fallida, muestra un mensaje de error
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

?>
