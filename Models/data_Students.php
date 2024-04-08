<?php
require_once('../Config/Config.php');

// Consulta para obtener los datos
$sql = "SELECT nombre FROM estudiante";
$result = $conn->query($sql);

// Arreglos para almacenar los datos
$nombres = array();
$values = array();

// Obtener datos de la consulta
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($nombres, $row["nombre"]);
       /* array_push($values, intval($row["valor"])); */
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión a la base de datos
$conn->close();
?>