<?php
require '../Config/Config.php';


// Función para encriptar la contraseña usando AES
function encryptPassword($password_db, $key)
{
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $inivec = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($password_db, $cipher, $key, 0, $inivec);
    return base64_encode($encrypted . "::" . $inivec);
}

// Función para desencriptar la contraseña usando AES
function decryptPassword($password_db, $key)
{
    list($datos_encriptados, $inivec) = explode('::', base64_decode($password_db), 2);

    return openssl_decrypt($datos_encriptados, 'aes-256-cbc', $key, 0, $inivec);
}

$key = "7e5bcc2c288d4a297f8057aec4eda652da648cbd84977debe2e243b0ac7babcd";

// Verificar si el usuario está intentando iniciar sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $codigo = 2000456001;
    $rol = 'admin';
    // Consultar la base de datos para verificar las credenciales
    $query = "SELECT * FROM Docente WHERE correo = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        if (!preg_match($regex, $username)) {
            echo "The email address is invalid.";
        }
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = [
                'username' => $row['nombre'],
                'rol' => $row['rol']
            ];
            header("Location: ../Views/index.php");
            exit();
        } else {
            echo 'Invalid password.';
        }
    }
}
