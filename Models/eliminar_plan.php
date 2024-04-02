<?php
require_once('../Config/Config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["codigo"])) {
  
    $estudiante_codigo = $_GET['codigo'];
   
    if (!is_numeric($estudiante_codigo)) {
        die("ID de estudiante no válido.");
    }

    // Consulta SQL para eliminar el estudiante por su ID
    $sql = "DELETE FROM planes WHERE codigo_FK = $estudiante_codigo";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
                 if (confirm("¿Está seguro de eliminar el estudiante?")) {
                     document.forms["eliminarForm"].submit();
                 } else {
                     window.location.href = "../Models/planes_de_trabajo.php";
                 }
             </script>';
        echo '<script>alert("Estudiante eliminado con éxito.");</script>';
        echo '<script>window.location.href = "../Models/planes_de_trabajo.php";</script>';
    } else {
        echo "Error al eliminar el estudiante: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>