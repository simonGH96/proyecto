<?php
require_once  '../Views/header.php';
require_once '../Config/Config.php'
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gestión</title>

</head>

<body>
    <div class="row justify-content-center" id="card-content-page">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3>Gestión de ciudades</h3>
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
                            <nav class="navbar-light ">
                                    <div class="container-fluid">
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Buscar ..."
                                                aria-label="Search">
                                            <button class="btn btn-secondary" type="submit">Buscar</button>
                                        </form>
                                    </div>
                                </nav></br></br>
                                
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-bordered mb-0"
                                        id="conceptualToolsTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Ciudad</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
// Consulta para obtener los planes de trabajo con el nombre de la asignatura
$sql = "SELECT *
        FROM ciudad_estudiante";
        

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ciudad"] . "</td>"; // Mostrar el nombre de la asignatura
        echo "<td>";
        echo '<a class="btn" href="../Views/Editar_plan_de_trabajo.php?codigo=' . $row["id_ciudad"] . '">Editar</a>';
        echo '<a href="../Models/eliminar_plan.php?codigo=' . $row["id_ciudad"] . '" class="btn">Eliminar</a>';
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
                    <a href="../Models/formato.php" class="btn btn-warning">Nueva ciudad</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>