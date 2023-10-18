<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "proyecto_consejerias");

    if (!$conexion) {
        die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
    }

    // Obtener el ID del estudiante a eliminar desde el formulario
    $estudiante_id = $_POST["estudiante_id"];

    // Consulta SQL para eliminar el estudiante por su ID
    $sql = "DELETE FROM estudiante WHERE codigo = $estudiante_id";


    if (mysqli_query($conexion, $sql)) {
        echo '<script>
                 if (confirm("¿Está seguro de eliminar el estudiante?")) {
                     document.forms["eliminarForm"].submit();
                 } else {
                     window.location.href = "estudiantes.php";
                 }
             </script>';
        echo '<script>alert("Estudiante eliminado con éxito.");</script>';
        echo '<script>window.location.href = "estudiantes.php";</script>'; 
    } else {
        echo "Error al eliminar el estudiante: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
