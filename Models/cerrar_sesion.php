<?php
session_destroy();
echo "acaba de cerrar sesón";
header("Location: ../Views/index.php");
