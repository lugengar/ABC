<?php
    include "../codigophp/conexionbs.php";

    // Obtener datos del formulario
    $id_carrera = $_POST['id_carrera'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $titulo = $_POST['titulo'];

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO carrera (id_carrera, nombre, descripcion, titulo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id_carrera, $nombre, $descripcion, $titulo);

    if ($stmt->execute() === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
?>