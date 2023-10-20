<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Planes de Trabajo</title>
</head>
<body>
    <h1>Lista de Planes de Trabajo</h1>

    <ul>
        <?php
        // Conectar a la base de datos (debes proporcionar tus credenciales)
        $servername = "tu_servidor";
        $username = "tu_usuario";
        $password = "tu_contraseña";
        $dbname = "tu_base_de_datos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta para obtener los planes de trabajo
        $sql = "SELECT id, nombre FROM planes_de_trabajo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["nombre"] . " ";
                echo "<a href='editar.php?id=" . $row["id"] . "'>Editar</a> ";
                echo "<a href='eliminar.php?id=" . $row["id"] . "'>Eliminar</a></li>";
            }
        } else {
            echo "No hay planes de trabajo disponibles.";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
    </ul>

    <a href="home.php">Volver</a>
</body>
</html>
