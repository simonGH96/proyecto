<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    
    // Verifica que los campos no estén vacíos
    if (empty($nombre) || empty($codigo) || empty($correo) || empty($password) ) {
        echo "Por favor, completa todos los campos.";
    } else {
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

        // Verificar si el nombre de usuario ya existe en la base de datos
        $check_query = "SELECT * FROM Docente WHERE codigo = '$codigo'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $insert_query = "INSERT INTO Docente (codigo, password, nombre, correo) VALUES ('$codigo', '$password', '$nombre', '$correo')";

            if ($conn->query($insert_query) === TRUE) {
                echo "Registro exitoso. Ahora puedes <a href='login.html'>iniciar sesión</a>.";
            } else {
                echo "Error al registrar el usuario: " . $conn->error;
            }
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    }
}
?>

