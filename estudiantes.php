<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestión de Estudiantes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Gestión de Estudiantes</h1>
    </header>
    
    <main>
        <a href="home.php">
        <button id="home-button">Volver al Inicio</button></a>
        <a href="agregar_estudiante.html">
        <button id="agregar_estudiante">Agregar Estudiante</button>
        </a>
        <table class="student-table">
            <thead>
                <tr>
                    <th>Codigo</th>
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
                        echo '<a href="editar_estudiante.php?codigo=' . $fila["codigo"] . '"><button class="edit-button">Editar</button></a>';
                        echo '<form method="POST" action="eliminar_estudiante.php">';
                        echo '<input type="hidden" name="estudiante_id" value="' . $fila["codigo"] . '">';
                        echo '<button class="delete-button" type="submit">Eliminar</button>';
                        echo '</form>';
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
        <a href="home.php">
        <button id="home-button">Volver al Inicio</button></a>
    </main>

    <footer>
        <p>Pie de Página - © 2023 Gestión de Estudiantes</p>
    </footer>
</body>
</html>
