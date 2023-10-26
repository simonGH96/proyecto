<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Registro</title>
</head>
<body>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    
    // Verifica que los campos no estén vacíos
    if (empty($nombre) || empty($codigo) || empty($correo) || empty($password) ) {
        echo "Por favor, completa todos los campos.";
    } else {
        $servername = "localhost"; // Dirección del servidor de la base de datos (puede variar)
        $username_db = "root"; // Tu nombre de usuario de la base de datos
        $password_db = ""; // Tu contraseña de la base de datos
        $database = "proyecto_consejerias"; // Nombre de la base de datos
        // Establecer la conexión
        $conn = new mysqli($servername, $username_db, $password_db, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        // Verificar si el nombre de usuario ya existe en la base de datos
        $check_query = "SELECT * FROM Docente WHERE codigo = '$codigo'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $insert_query = "INSERT INTO Docente (codigo, password, nombre, correo) VALUES ('$codigo', '$password', '$nombre', '$correo')";

            if ($conn->query($insert_query) === TRUE) {
                echo "Registro exitoso. Ahora puedes <a href='../login.php'>iniciar sesión</a>.";
            } else {
                echo "Error al registrar el usuario: " . $conn->error;
            }
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    }
}
?>


<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
            <div class="row g-0">
                <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                    <h4 class="mt-1 mb-5 pb-1">Registro</h4>
                    </div>
                <form action="registro.php" method="POST">
                     <div class="form-outline mb-4">
                        <input type="text" id="nombre" name="nombre"  class="form-control" placeholder="Nombre" required />
                        <br>            
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="codigo" name="codigo"  class="form-control" placeholder="Cédula o código" required />
                        <br>            
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="correo" name="correo"  class="form-control" placeholder="Correo electrónico" required />
                        <br>            
                    </div>
                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password"  class="form-control" placeholder="password" required />
                        <br>            
                    </div>   

            <div class="text-center pt-1 mb-5 pb-1">
                            <button class="btn btn-block gradient-custom-2 mb-3" type="submit" id="ButtonLogin">Registrarse</button>
                        </div>
                        
        </form>
                 </div>
            </div>
            </nav>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        const baseUrl = "#";
    </script>
  
    </section>
</body>
</html>
