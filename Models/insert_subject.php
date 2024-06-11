<?php
require_once '../Config/Config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["subject"])) {
        $subject = $_POST["subject"];
        $id_ciudad = null; // Assign null to a variable

        $sql = "INSERT INTO asignatura_planes (id_asignatura, asignatura) VALUES (?, ?)";
        
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameters (using 'i' for integer and 's' for string)
            $stmt->bind_param("is", $id_ciudad, $subject);

            // Execute the SQL query to insert the record into the database
            if ($stmt->execute()) {
                echo '<script>alert("Asignatura agregada exitosamente.");</script>';
                echo '<script>window.location.href = "../Models/add_subject.php";</script>'; 
            } else {
                echo "Error al agregar la asignatura: " . $stmt->error;
            }

            // Close the SQL statement
            $stmt->close();
        } else {
            echo "Error en la preparación de la sentencia SQL: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "El campo 'subject' no está definido.";
    }
}
?>
