<?php
require_once  '../Views/header.php';
require_once '../Config/Config.php';
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
                    <h3>Gestión de asignaturas</h3>
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
                                <nav class="navbar-light">
                                    <div class="container-fluid">
                                        <form class="d-flex mb-3" method="GET" action="">
                                            <input class="form-control me-2" type="search" name="search"
                                                placeholder="Buscar por nombre..." aria-label="Search">
                                            <button class="btn btn-secondary" type="submit">Buscar</button>
                                        </form>
                                    </div>
                                </nav></br></br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-bordered mb-0"
                                        id="conceptualToolsTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Asignatura</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

                                            // Consulta para obtener los planes de trabajo con el nombre de la asignatura
                                            $sql = "SELECT *
                                                    FROM asignatura_planes";

                                            if ($search) {
                                                $sql .= " WHERE asignatura_planes.asignatura LIKE '%$search%'";
                                            }

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["asignatura"] . "</td>"; // Mostrar el nombre de la asignatura
                                                    echo "<td>";
                                                    echo '<a data-bs-toggle="modal" data-bs-target="#Edit_modal" class="btn" href="../Models/update_subject.php?id_asignatura=' . $row["id_asignatura"] . '">Editar</a>';
                                                    echo '<a href="../Models/eliminar_plan.php?codigo=' . $row["id_asignatura"] . '" class="btn">Eliminar</a>';
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
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar asignatura
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar asignatura</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="insert_subject.php">
                                        <div class="form-group">
                                            <label for="wordInput">Nombre de la asignatura</label>
                                            <input type="text" class="form-control" name="subject" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-warning">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--         -->
                    <!-- Edit modal -->
                    <div class="modal fade" id="Edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar asignatura</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="update_subject.php">
                                    <input type="hidden" name="id_asignatura" value="<?php echo $row["id_asignatura"] ;?>">    
                                    <div class="form-group">
                                            <label for="wordInput">Nombre de la asignatura</label>
                                            <input type="text" class="form-control" name="subject" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-warning">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--         -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>