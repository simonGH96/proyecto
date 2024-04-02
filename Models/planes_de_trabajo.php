<?php
require '../Views/header.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <title>Planes de trabajo</title>

</head>

<body>
    <div class="row justify-content-center" id="card-content-page">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3>Planes de trabajo</h3>
                </div>
                <div class="card-body row justify-content-center" id="card-body-page">
                    <div class="col-11">
                        <form id="formConceptualTools" name="formConceptualTools">
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                </div>
                        </form>
                        <div class="tile">
                            <div class="tile-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-bordered mb-0"
                                        id="conceptualToolsTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Asignatura</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
        // Conectar a la base de datos (debes proporcionar tus credenciales)
        $servername = "localhost"; // Dirección del servidor de la base de datos (puede variar)
        $username_db = "root"; // Tu nombre de usuario de la base de datos
        $password_db = ""; // Tu contraseña de la base de datos
        $database = "proyecto_consejerias"; // Nombre de la base de datos


        $conn = new mysqli($servername, $username_db, $password_db, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
        // Consulta para obtener los planes de trabajo
        $sql = "SELECT codigo_fk, asignatura FROM planes";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["codigo_fk"] . "</td>";
                echo "<td>" . $row["asignatura"] . "</td>";
                echo "<td>";
                echo '<a class="btn" href="../Views/Editar_plan_de_trabajo.php?codigo=' . $row["codigo_fk"] . '">Editar</a>';
                echo '<a href="../Models/eliminar_plan.php?codigo=' . $row["codigo_fk"] . '" class="btn">Eliminar</a>';
                echo "</td>";
                echo "</tr>";   
        }
    } else {
        echo "No hay planes de trabajo disponibles.";
    }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <a href="formato.php" class="btn btn-warning">Nuevo plan de trabajo</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>