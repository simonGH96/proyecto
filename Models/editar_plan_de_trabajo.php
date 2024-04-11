<?php
require_once('../Config/Config.php');

$estudiante_codigo = '';
$id_plan='';

if (isset($_GET['codigo']) && isset($_GET['id_plan'])) {
    $estudiante_codigo = $_GET['codigo'];
    $id_plan = $_GET['id_plan'];

    // Consulta SQL para obtener la información del estudiante según el código
    $sql = "SELECT * FROM estudiante WHERE codigo = ?";

    // Preparar la sentencia SQL
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $estudiante_codigo); // "ss" indica dos parámetros de tipo string
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $estudiante = $resultado->fetch_assoc();
            // Aquí puedes hacer algo con los datos del estudiante
        } else {
            echo "Estudiante no encontrado.";
            exit();
        }        

        $stmt->close();
    } else {
        echo "Error en la preparación de la sentencia SQL: " . $conn->error;
    }
} else {
    echo "Código de estudiante o ID de plan no proporcionados.";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_plan = $_POST["plan_de_trabajo"];
    $asignatura = $_POST["asignatura"];

    // Obtener el id_ciudad correspondiente a la asignatura ingresada
$id_asignatura = null;
$stmt_asignatura = $conn->prepare("SELECT id_asignatura FROM asignatura_planes WHERE asignatura = ?");
$stmt_asignatura->bind_param("s", $asignatura);
$stmt_asignatura->execute();
$result_asignatura = $stmt_asignatura->get_result();
if ($result_asignatura->num_rows > 0) {
    $row = $result_asignatura->fetch_assoc();
    $id_asignatura = $row["id_asignatura"];
}
$stmt_asignatura->close();

    // Consulta de actualización
    $sql_update = "UPDATE planes SET escribir_plan = ?,asignatura_FK = ? WHERE id_planes = ?";

    $stmt_update = $conn->prepare($sql_update);

    if ($stmt_update) {
        $stmt_update->bind_param("sss", $nuevo_plan,$id_asignatura, $id_plan);

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

?>

