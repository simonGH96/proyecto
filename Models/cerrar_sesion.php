<?php
// Logout process
session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session
header("Location: ../Views/index.php");
exit();
