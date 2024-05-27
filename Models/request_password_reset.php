<?php
require_once '../Config/Config.php'; 

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email from the POST request
    $email = $_POST['email'];

    // Generate a unique token
    $token = bin2hex(random_bytes(50));

    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM docente WHERE correo = ?");
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }
    
    // Bind the email parameter
    $stmt->bind_param("s", $email);
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    // Close the statement
    $stmt->close();

    if ($user) {
        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
        
        // Bind the parameters
        $stmt->bind_param("ss", $email, $token);
        
        // Execute the statement
        $stmt->execute();
        
        // Close the statement
        $stmt->close();

        // Send the email
        $resetLink = "http://tu-sitio.com/reset_password.php?token=$token";
        $subject = "Restablecimiento de contraseña";
        $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: $resetLink";
        $headers = "From: no-reply@tu-sitio.com";

        mail($email, $subject, $message, $headers);
        echo "Se ha enviado un enlace de recuperación a tu correo electrónico.";
    } else {
        $message = "El correo electrónico no está registrado.";
        $redirectUrl = "../Views/resetPassword.php";

        echo "<script type='text/javascript'>
                alert('$message');
                window.location.href = '$redirectUrl';
              </script>";
    }
}
?>
