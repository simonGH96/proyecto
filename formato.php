<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Subida de Documentos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Formulario de Subida de Documentos</h1>
    </header>
    
    <main>
        <form action="procesar_formulario.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="plan_de_trabajo">Ingresar Plan de Trabajo:</label>
                <textarea id="plan_de_trabajo" name="plan_de_trabajo" rows="4" cols="50" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="asignatura">Asignatura:</label>
                <input type="text" id="asignatura" name="asignatura" required>
            </div>
            
            <div class="form-group">
                <label for="estudiante">Estudiante:</label>
                <select id="estudiante" name="estudiante" required>
                    <option value="estudiante1">Estudiante 1</option>
                    <option value="estudiante2">Estudiante 2</option>
                    <option value="estudiante3">Estudiante 3</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="documento">Subir Documento:</label>
                <input type="file" id="documento" name="documento" required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Subir Documento">
            </div>
        </form>
        <a href="home.php">
        <button id="home-button">Volver al Inicio</button></a>
    </main>

    <footer>
        <p>Pie de Página - © 2023 Formulario de Subida de Documentos</p>
    </footer>
</body>
</html>
