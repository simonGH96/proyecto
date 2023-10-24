<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#009688">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
    
    <title>Iniciar Sesión</title>
    </head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
            <div class="row g-0">
                <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                    <img src="../Assets/images/uploads/logo_ud_sin_texto.png"
                        style="width: 50px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Iniciar sesión</h4>
                    </div>

                    <form action="autenticacion.php" method="POST">
            <div class="form-group">
                <label for="username">correo</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
                </form>

                </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="px-3 py-4 p-md-5 mx-md-4">
                <h3 class="mb-4">Sistema de Consejerias</h3>
                    <p class="small mb-0">Mediante este sistema los docentes del proyecto curricular de Tecnología en 
                        Sistematización de Datos e Ingeniería en Telemática 
                        podrán adicionar, actualizar y/o eliminar los resultados de las sesiones de consejerias academicas,
                         así como la respectiva asignación a cada una de ellas</p>
                        <center>
                        <img src="/Assets/images/logo_ud.png" alt="Logo" style="width:200px height: 200px;">
                        </center>
                    </div>
                </div>
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
   <div>
         
         <a href="Registro.html">Registrarse</a>
    </div>
    </section>


    
   
    
</body>
</html>
