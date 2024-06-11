<?php
require_once '../Config/Config.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["estudiante_id"])) {
  
    // Obtener el ID del estudiante a eliminar desde la URL
    $estudiante_id = $_GET["estudiante_id"];

    // Asegurarse de que $estudiante_id sea un número válido (puedes agregar más validaciones si es necesario)
    if (!is_numeric($estudiante_id)) {
        die("ID de estudiante no válido.");
    }

    // Consulta SQL para eliminar el estudiante por su ID
    $sql = "DELETE FROM estudiante WHERE codigo = $estudiante_id";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Estudiante eliminado con éxito.");</script>';
        echo '<script>window.location.href = "../Views/estudiantes.php";</script>';
    } else {
        echo "Error al eliminar el estudiante: " . mysqli_error($conn);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>

