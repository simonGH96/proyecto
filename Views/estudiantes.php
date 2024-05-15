<?php
require_once '../Views/header.php';
require_once '../Models/funciones.php';
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
}*/
?>
<div class="row justify-content-center" id="card-content-page">
    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3>Gestión de Estudiantes</h3>
            </div>
            <div class="card-body row justify-content-center" id="card-body-page">

                <div class="col-11">
                    <form id="formConceptualTools" name="formConceptualTools">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <a href="../Models/add_student.php" id="agregar_estudiante" class="btn btn-warning">Agregar estudiante</a>
                                <br></br>
                            </div>
                    </form>
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-centered table-bordered mb-0" id="conceptualToolsTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Establecer la conexión a la base de datos
                                        $conexion = mysqli_connect("localhost", "root", "", "proyecto_consejerias");

                                        if (!$conexion) {
                                            die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
                                        }

                                        // Consulta SQL para obtener los datos del estudiante
                                        $sql = "SELECT codigo, nombre FROM estudiante ";
                                        $resultado = mysqli_query($conexion, $sql);

                                        if (mysqli_num_rows($resultado) > 0) {
                                            while ($fila = mysqli_fetch_assoc($resultado)) {
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

                                        // Cerrar la conexión a la base de datos
                                        mysqli_close($conexion);
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
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