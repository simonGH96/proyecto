<?php
class StadisticsModel {
    private $conn;

    public function __construct() {
        // Conectar a la base de datos en el constructor
        $servername = "localhost"; // Dirección del servidor de la base de datos (puede variar)
        $username_db = "root"; // Tu nombre de usuario de la base de datos
        $password_db = ""; // Tu contraseña de la base de datos
        $database = "proyecto_consejerias"; // Nombre de la base de datos

        // Crear una nueva conexión mysqli
        $this->conn = new mysqli($servername, $username_db, $password_db, $database);

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
    }

    public function obtenerCantidadEstudiantes() {
        // Ejecuta una consulta SQL (debes adaptarla a tu esquema de base de datos).
        $query = $this->conn->prepare("SELECT COUNT(*) AS cantidad FROM estudiante");
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();

        // Obtener el número de estudiantes
        $cantidadEstudiantes = $row['cantidad'];

        return $cantidadEstudiantes;
    }
    
    public function obtenerCantidadDocentes() {
        // Ejecuta una consulta SQL (debes adaptarla a tu esquema de base de datos).
        $query = $this->conn->prepare("SELECT COUNT(*) AS cantidad FROM docente");
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();

        // Obtener el número de docentes
        $cantidadDocentes = $row['cantidad'];

        return $cantidadDocentes;
    }
    public function obtenerMaterias() {
        // Ejecuta una consulta SQL (debes adaptarla a tu esquema de base de datos).
        $query = $this->conn->prepare("SELECT COUNT(DISTINCT asignatura) AS cantidad FROM planes");
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();

        // Obtener el número de docentes
        $cantidadMaterias = $row['cantidad'];

        return $cantidadMaterias;
    }



    public function obtenerCantidadPlanes() {
        // Ejecuta una consulta SQL (debes adaptarla a tu esquema de base de datos).
        $query = $this->conn->prepare("SELECT COUNT(*) AS cantidad FROM planes");
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();

        // Obtener el número de docentes
        $cantidadPlanes = $row['cantidad'];

        return $cantidadPlanes;
    }

    public function cerrarConexion() {
        // Puedes agregar un método para cerrar la conexión si es necesario
        $this->conn->close();
    }
}

      
        
?>