<?php
require_once '../Views/header.php';
require_once '../Models/funciones.php';

// Uncomment this block if session and role check is needed
/*
if (isset($_SESSION['user'])) {
    $currentUser = (object) $_SESSION['user']; // Cast the array to an object
} else {
    // Handle the case where there is no user logged in
    die('Debe estar logueado para ver este contenido.');
}

// Uso de chequeo de rol
if (!checkRole($currentUser, '2')) {
    die('Access denied');
}
*/

$results_per_page = 5; // Number of results per page

// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "proyecto_consejerias");

if (!$conexion) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

// Obtener el valor de búsqueda si existe
$search = isset($_GET['search']) ? mysqli_real_escape_string($conexion, $_GET['search']) : '';

// Determine the SQL query based on search
$sql = "SELECT COUNT(*) as total FROM estudiante";
if ($search) {
    $sql .= " WHERE codigo LIKE '%$search%' OR nombre LIKE '%$search%'";
}

// Get total number of results
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($result);
$total_results = $row['total'];
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

// Fetch the relevant results for the current page
$sql = "SELECT codigo, nombre FROM estudiante";
if ($search) {
    $sql .= " WHERE codigo LIKE '%$search%' OR nombre LIKE '%$search%'";
}
$sql .= " LIMIT $start_from, $results_per_page";

$result = mysqli_query($conexion, $sql);
?>

<div class="row justify-content-center" id="card-content-page">
    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3>Gestión de Estudiantes</h3>
            </div>
            <div class="card-body row justify-content-center" id="card-body-page">
                <div class="col-11">
                    <form class="d-flex mb-3" method="GET" action="">
                        <input class="form-control me-2" type="search" name="search"
                            placeholder="Buscar por código o nombre..." aria-label="Search" value="<?php echo htmlspecialchars($search); ?>">
                        <button class="btn btn-secondary" type="submit">Buscar</button>
                    </form>
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-centered table-bordered mb-0"
                                    id="conceptualToolsTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($fila = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $fila["codigo"] . "</td>";
                                                echo "<td>" . $fila["nombre"] . "</td>";
                                                echo "<td>";
                                                echo '<a class="btn" href="../Models/editar_estudiante.php?codigo=' . $fila["codigo"] . '">Editar</a>';
                                                echo '<a href="../Models/eliminar_estudiante.php?estudiante_id=' . $fila["codigo"] . '" class="btn">Eliminar</a>';
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'>No se encontraron estudiantes</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
                        
                    </div></br></br>
                    <a href="../Models/add_student.php" class="btn btn-warning">Agregar estudiante</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <?php
    require '../Models/Footer.php';
    ?>
</footer>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
