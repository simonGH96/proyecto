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
                                        <form class="d-flex mb-3" method="GET" action="">
                                            <input class="form-control me-2" name="search" type="search" placeholder="Buscar ..."
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
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

$sql = "SELECT *
        FROM ciudad_estudiante";
        
        if ($search) {
            $sql .= " WHERE ciudad LIKE '%$search%'";
        }
        

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
                   <!-- Button trigger modal -->
                   <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar Ciudad </a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar ciudad</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="wordInput">Nombre de la ciudad</label>
                                        <input type="text" class="form-control" id="wordInput" name="wordInput" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-warning">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                     </div>
            </div>
        </div>
    </div>


</body>

</html>