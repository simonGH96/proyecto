<?php
require '../Config/Config.php';
// Create
function uploadImage($name, $file) {
    global $mysqli;
    
    // Upload image file
    $targetDir = "../Assets/images/";
    $targetFile = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $targetFile);
    
    // Insert metadata into the database
    $stmt = $mysqli->prepare("INSERT INTO imagenes (id,nombre, path) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $targetFile);
    $stmt->execute();
    $stmt->close();
}

// Read
function getImages() {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM imagenes");
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
    return $images;
}

// Update
function updateImage($id, $name, $file) {
    global $mysqli;
    
    // Upload and replace image file
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $targetFile);
    
    // Update metadata in the database
    $stmt = $mysqli->prepare("UPDATE imagenes SET name = ?, path = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $targetFile, $id);
    $stmt->execute();
    $stmt->close();
}

// Delete
function deleteImage($id) {
    global $mysqli;
    
    // Retrieve image path
    $stmt = $mysqli->prepare("SELECT path FROM imagenes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($path);
    $stmt->fetch();
    $stmt->close();
    
    // Delete image file
    unlink($path);
    
    // Delete metadata from the database
    $stmt = $mysqli->prepare("DELETE FROM imagenes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Usage example
// Upload an image
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    uploadImage($_POST["name"], $_FILES["file"]);
}

// Read images
$images = getImages();
foreach ($images as $image) {
    echo "<img src='" . $image['path'] . "' alt='" . $image['name'] . "'><br>";
}

// Update an image
// Assuming you have an HTML form for updating images
// with inputs for name and file, and a hidden input for image id
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    updateImage($_POST["id"], $_POST["name"], $_FILES["file"]);
}

// Delete an image
// Assuming you have a link or button for deleting images
// with a GET parameter for image id
if (isset($_GET["delete"])) {
    deleteImage($_GET["delete"]);
}

$mysqli->close(); // Close the connection

