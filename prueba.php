<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión de prueba</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post" action="procesar_login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>

    <p>O inicia sesión con tu cuenta de Google:</p>
    <a href="auth_google.php">Iniciar sesión con Google</a>
</body>
</html>
