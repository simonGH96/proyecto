<?php

// Establece la conexión a la base de datos 
$servername = "localhost"; // Dirección del servidor de la base de datos 
$username_db = "root"; // Tu nombre de usuario de la base de datos
$password_db = ""; // Tu contraseña de la base de datos
$database = "proyecto_consejerias"; // Nombre de la base de datos

$conn = new mysqli($servername, $username_db, $password_db, $database);
// Verifica la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$nombre = $_POST["nombre"];
$codigo = $_POST["codigo"];
$es_cabeza_familia = $_POST["es_cabeza_familia"];
$composicion_familiar = $_POST["composicion_familiar"];
$lugar_procedencia = $_POST["lugar_procedencia"];
$personas_con_quien_vive = $_POST["personas_con_quien_vive"];
$actividades_trabajo = $_POST["actividades_trabajo"];
$actividades_interes = $_POST["actividades_interes"];
$solicitudes_retiro_reintegro = $_POST["solicitudes_retiro_reintegro"];
$adaptacion_universidad = $_POST["adaptacion_universidad"];
$intereses_academicos = $_POST["intereses_academicos"];
$grupos_vincula = $_POST["grupos_vincula"];
$movilidad_estudiantil = $_POST["movilidad_estudiantil"];
$prueba_academica = $_POST["prueba_academica"];
$recomendaciones_consejero = $_POST["recomendaciones_consejero"];

// Prepara una consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO estudiante (nombre, codigo, cabeza, familia, procedencia, personas_vive, trabajo, interes, solicitudes, adaptacion, intereses_aca, grupos, movilidad, prueba_aca, recomendaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepara la sentencia SQL
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Asocia los parámetros con los valores del formulario
    $stmt->bind_param("sssssssssssssss", $nombre, $codigo, $es_cabeza_familia, $composicion_familiar, $lugar_procedencia, $personas_con_quien_vive, $actividades_trabajo, $actividades_interes, $solicitudes_retiro_reintegro, $adaptacion_universidad, $intereses_academicos, $grupos_vincula, $movilidad_estudiantil, $prueba_academica, $recomendaciones_consejero);

    // Ejecuta la consulta SQL para insertar el registro en la base de datos
    if ($stmt->execute()) {
        echo '<script>alert("Estudiante creado exitosamente.");</script>';
    echo '<script>window.location.href = "../Views/estudiantes.php";</script>'; 
    } else {
        echo "Error al agregar el estudiante: " . $stmt->error;
    }

    // Cierra la sentencia SQL
    $stmt->close();
} else {
    echo "Error en la preparación de la sentencia SQL: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();

?>