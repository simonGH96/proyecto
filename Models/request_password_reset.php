<?php
require_once '../Config/Config.php';

// Include PHPMailer classes
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50));

    $stmt = $conn->prepare("SELECT * FROM docente WHERE correo = ?");
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user) {
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
        
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
        $stmt->close();

        $resetLink = "https://districonsejerias.000webhostapp.com/Views/login.php";
        $subject = "Restablecimiento de contraseña";
        $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: $resetLink";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'simongonalez96@gmail.com'; // Your Gmail address
            $mail->Password = 'ybgq zxbc hzov sqmv'; // Your Gmail password or app-specific password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('no-reply@tu-sitio.com', 'Your Site Name');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            $message1 = "Se ha enviado un enlace de recuperación a tu correo electrónico.";
            $redirectUrl1 = "../Views/resetPassword.php";
    
            echo "<script type='text/javascript'>
                    alert('$message1');
                    window.location.href = '$redirectUrl1';
                  </script>";
            
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Error de PHPMailer: {$mail->ErrorInfo}";
        }
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
