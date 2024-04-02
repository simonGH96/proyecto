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
                        <form action="Editar_plan_de_trabajo.php?codigo=<?php echo $estudiante_codigo; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="plan_de_trabajo">Ingresar Plan de Trabajo:</label>
                                <textarea id="plan_de_trabajo" name="plan_de_trabajo" rows="6" cols="100" required>
                                <?php echo $planes['escribir_plan']; ?>
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="asignatura">Asignatura:</label>
                                <input type="text" id="asignatura" name="asignatura" value="<?php echo $planes['asignatura']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="estudiante">Estudiante:</label>
                                <select id="estudiante" name="estudiante"  required>
                                 <option><?php echo $planes['codigo_FK']; ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="documento">Subir Documento:</label>
                                <input type="file" id="documento" name="documento" class="btn">
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