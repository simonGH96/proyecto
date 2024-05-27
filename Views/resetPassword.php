<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consejerías UD</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/proyecto/Assets/css/Style.css">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">-->
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
                        <img src="../Assets/images/logo_ud.png"
                            style="max-width: 100%;" alt="logo">
                        <a class="btn text-muted" href="../Views/login.php">Iniciar Sesión</a>
                        </br>
                        <a class="btn text-muted" data-bs-toggle="modal" data-bs-target="#recoveryModal" >Recuperar contraseña</a>
                         <!-- -->
                    <div class="modal fade" id="recoveryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="../Models/request_password_reset.php">
                                        <div class="form-group">
                                            <label for="wordInput">Ingresa correo electrónico</label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-warning">Enviar</button>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    </div>                    
                </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="px-3 py-4 p-md-5 mx-md-4">
                <h3 class="mb-4">Recuperar contraseña</h3>
                    <p class="small mb-0"> Para recuperar contraseña debe escribir su correo electronico de registro a continuación
                        y posteriormente recibirá información en su correo sobre los pasos a seguir para el reestablecimiento exitoso. 
                    </p>
                    </div>
                   
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</html>