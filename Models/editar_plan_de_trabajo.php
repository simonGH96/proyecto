<?php
require_once('../Config/Config.php');

$estudiante_codigo = '';

if (isset($_GET['codigo']) ) {
    $estudiante_codigo = $_GET['codigo'];

    // Consulta SQL para obtener la información del estudiante según el código
    $sql = "SELECT * FROM planes WHERE codigo_FK = ?";


    // Preparar la sentencia SQL
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $estudiante_codigo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $planes = $resultado->fetch_assoc();
        } else {
            echo "Estudiante no encontrado.";
            exit();
        }        

        $stmt->close();
    } else {
        echo "Error en la preparación de la sentencia SQL: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_plan = $_POST["plan_de_trabajo"];
    $nueva_asignatura = $_POST["asignatura"];

    // Consulta de actualización
    $sql_update = "UPDATE planes SET escribir_plan = ?,asignatura = ? WHERE codigo_FK = ?";

    $stmt_update = $conn->prepare($sql_update);

    if ($stmt_update) {
        $stmt_update->bind_param("sss", $nuevo_plan,$nueva_asignatura, $estudiante_codigo);

        if ($stmt_update->execute()) {
            echo '<script>window.location.href = "../Models/planes_de_trabajo.php";</script>';
        } else {
            echo "Error al actualizar el estudiante: " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        echo "Error en la preparación de la sentencia SQL de actualización: " . $conn->error;
    }
}
$conn->close();
?>

