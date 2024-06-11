<?php
require '../Views/header.php';
require '../Models/editar_plan_de_trabajo.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Subir Documentos</title>
    <link rel="stylesheet" type="text/css" href="../estilo_agregar_estudiante.css">
</head>

<body>
    <div class="row justify-content-center" id="card-content-page">
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3>Editar plan de trabajo</h3>
                </div>
                <div class="card-body row justify-content-center" id="card-body-page">
                    <tbody>
                        <form action="Editar_plan_de_trabajo.php?codigo=<?php echo $estudiante_codigo; ?>&id_plan=<?php echo $id_plan; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="plan_de_trabajo">Ingresar Plan de Trabajo:</label>
                                <textarea id="plan_de_trabajo" name="plan_de_trabajo" rows="6" cols="100">
                                <?php
$estudiante_codigo = '';

if (isset($_GET['codigo']) && isset($_GET['asignatura'])  ) {
    $estudiante_codigo = $_GET['codigo'];
    $asignatura =$_GET['asignatura'];
}

// Consulta SQL para obtener la información deseada
$sql = "SELECT planes.escribir_plan, planes.documento
        FROM planes 
        INNER JOIN estudiante ON planes.estudiante_FK = estudiante.codigo
        WHERE planes.id_planes = $id_plan";


// Ejecutar la consulta
$resultado = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if ($resultado) {
    // Obtener el resultado como un arreglo asociativo
    $planes = mysqli_fetch_assoc($resultado);

    // Imprimir el valor de escribir_plan
    echo $planes['escribir_plan'];
    

    // Liberar el resultado de la consulta
    mysqli_free_result($resultado);
} else {
    // Manejar el caso de que la consulta falle
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}

?>

                                </textarea>
                            </div>
                            
                            <?php
// Realizar la consulta para obtener las asignaturas
$sql_asignaturas = "SELECT asignatura FROM asignatura_planes";
$result_asignaturas = $conn->query($sql_asignaturas);




// Realizar la consulta para obtener los estudiantes
$sql_estudiantes = "SELECT codigo FROM estudiante";
$result_estudiantes = $conn->query($sql_estudiantes);

// Comprobar si se encontraron filas para asignaturas
if ($result_asignaturas->num_rows > 0) {
    // Crear la etiqueta select para asignaturas
    echo '<label for="asignatura">Asignatura:</label>';
    echo '<select id="asignatura" name="asignatura">';
    echo '<option value="' . $asignatura . '">'.$asignatura .'</option>';
    // Mostrar opciones en un bucle while
    while($row = $result_asignaturas->fetch_assoc()) {
        echo '<option value="' . $row["asignatura"] . '">' . $row["asignatura"] . '</option>';
    }
    
    echo '</select>';
} else {
    echo "No se encontraron resultados en la tabla de asignaturas.";
}

// Comprobar si se encontraron filas para estudiantes
if ($result_estudiantes->num_rows > 0) {
    // Crear la etiqueta select para estudiantes
    echo '<label for="estudiante">Estudiante:</label>';
    echo '<select id="estudiante" name="estudiante" required>';
    echo '<option value="' . $estudiante_codigo . '">'.$estudiante_codigo .'</option>';
    
    // Mostrar opciones en un bucle while
    while($row = $result_estudiantes->fetch_assoc()) {
        echo '<option value="' . $row["codigo"] . '">' . $row["codigo"] . '</option>';
    }
    
    echo '</select>';
} else {
    echo "No se encontraron resultados en la tabla de estudiantes.";
}


?>


                            <div class="form-group">
                                <label for="documento">Subir Documento:</label>
                                <input type="file" id="documento" name="documento" class="btn" value="<?php echo $planes['documento']; ?>">
                            </div>
                            <div>
                            <label for="plan_de_trabajo">Seguimiento: </label>
                                <textarea id="Seguimiento" name="Seguimiento" rows="6" cols="100"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-warning" type="submit" value="Subir Documento">
                            </div>
                        </form>
                    </tbody>

                </div>
            </div>
            <a href="../Models/planes_de_trabajo.php" class="btn btn-warning">Volver</a>
        </div>

</body>

</html>