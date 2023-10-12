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
        <button id="home-button">Volver al Inicio</button>
        <button id="add-student-button">Agregar Estudiante</button>

        <table class="student-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Estudiante 1</td>
                    <td>20</td>
                    <td>
                        <button class="edit-button">Editar</button>
                        <button class="delete-button">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Estudiante 2</td>
                    <td>22</td>
                    <td>
                        <button class="edit-button">Editar</button>
                        <button class="delete-button">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button id="home-button">Volver al Inicio</button>
    </main>

    <footer>
        <p>Pie de Página - © 2023 Gestión de Estudiantes</p>
    </footer>

    <!-- Script JavaScript para manejar la interacción de los botones -->
    <script>
        document.getElementById('add-student-button').addEventListener('click', function () {
            // Aquí puedes mostrar un formulario para agregar un estudiante
        });

        let editButtons = document.querySelectorAll('.edit-button');
        for (let i = 0; i < editButtons.length; i++) {
            editButtons[i].addEventListener('click', function () {
                // Aquí puedes mostrar un formulario para editar el estudiante correspondiente
            });
        }

        let deleteButtons = document.querySelectorAll('.delete-button');
        for (let i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].addEventListener('click', function () {
                // Aquí puedes eliminar el estudiante correspondiente de la base de datos y recargar la página
            });
        }

        document.getElementById('home-button').addEventListener('click', function () {
            window.location.href = 'home.php'; // Reemplaza 'home.php' con la URL de tu página de inicio
        });
    </script>
</body>
</html>
