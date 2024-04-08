<?php
require '../Config/Config.php';


// Función para encriptar la contraseña usando AES
function encryptPassword($password_db, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen); 
    $encrypted = openssl_encrypt($password_db, $cipher, $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

// Función para desencriptar la contraseña usando AES
function decryptPassword($encrypted, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($encrypted, 0, $ivlen);
    $encrypted = substr($encrypted, $ivlen);
    return openssl_decrypt($encrypted, $cipher, $key, 0, $iv);
}

$key = "7e5bcc2c288d4a297f8057aec4eda652da648cbd84977debe2e243b0ac7babcd";

// Verificar si el usuario está intentando iniciar sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consultar la base de datos para verificar las credenciales
    $query = "SELECT * FROM Docente WHERE correo = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pasCifrado = encryptPassword($row['password'],$key);
        echo "el password es" . $pasCifrado;
        $storedPassword = decryptPassword($row['password'],$key);
        echo "el password descifrado es: " . $storedPassword;
        echo "password" . $row['password'];
        
      /*  if ($password === $storedPassword) {
            // Autenticación exitosa
            // Redirige al usuario a la página de inicio o el panel de control
            header("Location: ../Views/index.php"); 
            exit();
        }*/
    }
    echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
}

?>
