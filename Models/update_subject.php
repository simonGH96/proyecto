<?php
require_once '../Config/Config.php';

$id_asignatura = '';

if (isset($_GET['id_asignatura']) ) {
    $id_asignatura = $_GET['id_asignatura'];

    // Consulta SQL para obtener la información del estudiante según el código
    $sql = "SELECT * FROM asignatura_planes WHERE id_asignatura = ?";

    // Preparar la sentencia SQL
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $id_asignatura);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $estudiante = $resultado->fetch_assoc();
        } else {
            echo "Asignatura no encontrado.";
            exit();
        }        

        $stmt->close();
    } else {
        echo "Error en la preparación de la sentencia SQL: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_asignatura = $_POST["id_asignatura"];
    
    // Obtener el id_ciudad correspondiente a la ciudad ingresada
    $id_asignatura = null;
    $stmt_asignatura= $conn->prepare("SELECT id_asignatura FROM asignatura_planes WHERE id_asignatura = ?");
    $stmt_asignatura->bind_param("s", $ciudad);
    $stmt_asignatura->execute();
    $result_asignatura = $stmt_asignatura->get_result();
    if ($result_asignatura->num_rows > 0) {
        $row = $result_asignatura->fetch_assoc();
        $id_asignatura = $row["id_asignatura"];
    }
    $stmt_ciudad->close();
    // Consulta de actualización
    $sql_update = "UPDATE asignatura_planes SET id_asignatura = ?, asignatura = ? WHERE id_asignatura = ?";

    $stmt_update = $conn->prepare($sql_update);

}       
// Cerrar la conexión
$conn->close();
?>

