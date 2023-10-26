<?php
require '../Views/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Planes de Trabajo</title>
    <link rel="stylesheet" type="text/css" href="planes_de_trabajo.css">

</head>
<body>
    <h1>Lista de Planes de Trabajo</h1>

    <ul>
        <?php
        // Conectar a la base de datos (debes proporcionar tus credenciales)
        $servername = "localhost"; // Dirección del servidor de la base de datos (puede variar)
        $username_db = "root"; // Tu nombre de usuario de la base de datos
        $password_db = ""; // Tu contraseña de la base de datos
        $database = "proyecto_consejerias"; // Nombre de la base de datos


        $conn = new mysqli($servername, $username_db, $password_db, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}


        // Consulta para obtener los planes de trabajo
        $sql = "SELECT codigo_fk, asignatura FROM planes";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["asignatura"] . " ";
                echo "<a href='formato.php?id=" . $row["codigo_fk"] . "'>Editar</a> ";
                echo "<a href='eliminar.php?id=" . $row["codigo_fk"] . "'>Eliminar</a></li>";
        }
    } else {
        echo "No hay planes de trabajo disponibles.";
    }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
    </ul>

    <a href="inicio/home.php">Volver</a>
    <a href="formato.php">Nuevo plan de trabajo</a>
</body>
</html>
