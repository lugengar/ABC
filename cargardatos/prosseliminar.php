<?php
if(isset($_POST['tabla']) && isset($_SESSION['id_usuario'])){

include "../codigophp/conexionbs.php";

$tabla = $_POST['tabla'] ?? '';

if ($tabla === "carrera") {

$id = $_POST['id_carrera'] ?? '';

    $sql = "DELETE FROM carrera WHERE id_carrera = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Carrera eliminada exitosamente.";
    } else {
        echo "Error al eliminar la carrera.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "contacto") {
$id = $_POST['id_contacto'] ?? '';

    $sql = "DELETE FROM contacto WHERE id_contacto = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Contacto eliminado exitosamente.";
    } else {
        echo "Error al eliminar el contacto.";
    }
    mysqli_stmt_close($stmt);

}elseif ($tabla === "imagenes") {
    $id = $_POST['id_imagen'] ?? '';

    $sql = "DELETE FROM imagenes WHERE id_imagen = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Imagen eliminada exitosamente.";
    } else {
        echo "Error al eliminar la imagen.";
    }
    mysqli_stmt_close($stmt);

} elseif ($tabla === "establecimiento") {
    $id = $_POST['id_establecimiento'] ?? '';
    
    $sql = "DELETE FROM establecimiento WHERE id_establecimiento = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Establecimiento eliminado exitosamente.";
    } else {
        echo "Error al eliminar el establecimiento.";
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
}
?>
