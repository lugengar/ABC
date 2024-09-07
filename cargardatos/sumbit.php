<?php
include "../codigophp/conexionbs.php";


$id_carrera = $_POST['id_carrera'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$titulo = $_POST['titulo'];


$stmt = $conn->prepare("SELECT COUNT(*) FROM carrera WHERE id_carrera = ?");
$stmt->bind_param("i", $id_carrera);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo "La carrera con el ID especificado ya existe.";
    $conn->close();
    exit();
}


$stmt = $conn->prepare("SELECT COUNT(*) FROM carrera WHERE nombre = ?");
$stmt->bind_param("s", $nombre);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo "La carrera con el nombre especificado ya existe.";
    $conn->close();
    exit();
}


$stmt = $conn->prepare("INSERT INTO carrera (id_carrera, nombre, descripcion, titulo) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $id_carrera, $nombre, $descripcion, $titulo);

if ($stmt->execute() === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
