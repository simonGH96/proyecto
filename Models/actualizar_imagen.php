<?php
require '../Config/Config.php';

// Create
function uploadImage($id, $name, $text, $file) {
    global $conn;
    if (!empty($file["name"])) {
    // Upload image file
    $targetDir = "../Assets/images/";
    $targetFile = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $targetFile);
    
    // Update image path in the database
    $stmt = $conn->prepare("UPDATE imagenes SET nombre=?, descripcion=?, path=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $text, $targetFile, $id);
    $stmt->execute();
    $stmt->close();
    }else{
        // Insert metadata into the database
    $stmt = $conn->prepare("UPDATE imagenes SET nombre=?, descripcion=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $text, $id);
    $stmt->execute();
    $stmt->close();

    }
}
function getImagePath(){
    global $conn;
    $result = $conn->query("SELECT path FROM imagenes WHERE id=1");
    $imagePath = $result->fetch_assoc();
    return $imagePath;
}
/*
// Read
function getImages() {
    global $conn;
    $result = $conn->query("SELECT * FROM imagenes");
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
    return $images;
}*/
/*
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

*/
// Usage example
// Upload an image
if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST["update"]) && isset($_FILES["file"])) {
    $imageId = $_POST["id"];
    uploadImage($imageId, $_POST["name"], $_POST["text"], $_FILES["file"]);
}
/*
// Read images
$images = getImages();
foreach ($images as $image) {
    echo "<img src='" . $image['path'] . "' alt='" . $image['name'] . "'><br>";
}*/
/*
// Update an image
// Assuming you have an HTML form for updating images
// with inputs for name and file, and a hidden input for image id
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    updateImage($_POST["id"], $_POST["name"], $_FILES["file"]);
}*/


$conn->close(); // Close the connection
header("Location: ../Views/index.php");

