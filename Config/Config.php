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
