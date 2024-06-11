<?php
require_once '../Config/Config.php';

// Initialize variables
$id_asignatura = '';
$asignatura = '';

// Check if id_asignatura is passed via GET request
if (isset($_GET['id_asignatura'])) {
    $id_asignatura = $_GET['id_asignatura'];
    
    // SQL query to fetch the subject based on id_asignatura
    $sql = "SELECT * FROM asignatura_planes WHERE id_asignatura = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_asignatura);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $asignatura_data = $resultado->fetch_assoc();
            $asignatura = $asignatura_data['asignatura'];
        } else {
            echo "Asignatura no encontrada.";
            exit();
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la sentencia SQL: " . $conn->error;
        exit();
    }
}
// Handle the POST request to update the subject
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_subject = $_POST["subject"];
    
    // Update query
    $sql_update = "UPDATE asignatura_planes SET asignatura = ? WHERE id_asignatura = ?";
    $stmt_update = $conn->prepare($sql_update);

    if ($stmt_update) {
        $stmt_update->bind_param("is", $id_asignatura, $new_subject);
        if ($stmt_update->execute()) {
            echo '<script>alert("Se editó la asignatura con exito con exito.");</script>';
            header("Location: ../Models/add_subject.php");
            
        } else {
            echo "Error al actualizar la asignatura: " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        echo "Error en la preparación de la sentencia SQL de actualización: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
