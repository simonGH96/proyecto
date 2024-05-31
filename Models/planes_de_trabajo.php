<?php
require  '../Views/header.php';
require_once '../Config/Config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <title>Planes de trabajo</title>

</head>
<?php 
$results_per_page = 5; // Number of results per page
?>
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
                        <form class="d-flex mb-3" method="GET" action="">
                            <input class="form-control me-2" type="search" name="search" placeholder="Buscar por código o nombre..." aria-label="Search">
                            <button class="btn btn-secondary" type="submit">Buscar</button></br>
                        </form>
                        <div class="tile">
                            <div class="tile-body">
                                <div class="table-responsive">
                                    </br></br>
                                    <table class="table table-hover table-centered table-bordered mb-0"
                                        id="conceptualToolsTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Asignatura</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Obtener el valor de búsqueda si existe
                                            $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

                                            // Consulta para obtener el total de resultados
                                            $count_sql = "SELECT COUNT(*) AS total
                                                          FROM planes
                                                          INNER JOIN asignatura_planes ON planes.asignatura_FK = asignatura_planes.id_asignatura
                                                          INNER JOIN estudiante ON planes.estudiante_FK = estudiante.codigo";

                                            if ($search) {
                                                $count_sql .= " WHERE estudiante.codigo LIKE '%$search%' OR estudiante.nombre LIKE '%$search%'";
                                            }

                                            $count_result = $conn->query($count_sql);
                                            $total_results = $count_result->fetch_assoc()['total'];
                                            $total_pages = ceil($total_results / $results_per_page);

                                            // Determine the current page
                                            $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                                            if ($current_page > $total_pages) {
                                                $current_page = $total_pages;
                                            }
                                            if ($current_page < 1) {
                                                $current_page = 1;
                                            }
                                            // Determine the SQL LIMIT starting number for the results on the displaying page
                                            $start_from = ($current_page - 1) * $results_per_page;

                                            // Consulta para obtener los planes de trabajo con el nombre de la asignatura
                                            $sql = "SELECT planes.id_planes, asignatura_planes.asignatura, estudiante.codigo, estudiante.nombre
                                                    FROM planes
                                                    INNER JOIN asignatura_planes ON planes.asignatura_FK = asignatura_planes.id_asignatura
                                                    INNER JOIN estudiante ON planes.estudiante_FK = estudiante.codigo";

                                            if ($search) {
                                                $sql .= " WHERE estudiante.codigo LIKE '%$search%' OR estudiante.nombre LIKE '%$search%'";
                                            }

                                            $sql .= " LIMIT $start_from, $results_per_page";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["codigo"] . "</td>";
                                                    echo "<td>" . $row["nombre"] . "</td>";
                                                    echo "<td>" . $row["asignatura"] . "</td>"; // Mostrar el nombre de la asignatura
                                                    echo "<td>";
                                                    echo '<a class="btn" href="../Views/Editar_plan_de_trabajo.php?codigo=' . $row["codigo"] . '&id_plan=' . $row["id_planes"] . '">Editar</a>';
                                                    echo '<a href="../Models/eliminar_plan.php?codigo=' . $row["id_planes"] . '" class="btn">Eliminar</a>';
                                                    echo "</td>";
                                                    echo "</tr>";   
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>No hay planes de trabajo disponibles.</td></tr>";
                                            }

                                            // Cerrar la conexión a la base de datos
                                            $conn->close();
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    <!-- Pagination -->
                    <nav aria-label="..."></br>
                            <ul class="pagination">
                                <?php if ($current_page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?search=<?php echo $search; ?>&page=<?php echo $current_page - 1; ?>">Anterior</a>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item disabled">
                                        <a class="page-link">Anterior</a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <?php if ($i == $current_page): ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="#"><?php echo $i; ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?search=<?php echo $search; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($current_page < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?search=<?php echo $search; ?>&page=<?php echo $current_page + 1; ?>">Siguiente</a>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item disabled">
                                        <a class="page-link">Siguiente</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        
                    </div>
                    <a href="../Models/formato.php" class="btn btn-warning">Nuevo plan de trabajo</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
