<?php
include "../codigophp/conexionbs.php";
include "../codigophp/coordenadas.php";

$accion = $_POST['accion'] ?? '';
$tabla = $_POST['tabla'] ?? '';

if ($tabla === "carrera") {
    if ($accion === "agregar") {
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $titulo = $_POST['titulo'] ?? '';
        $tipo_carrera = $_POST['tipo_carrera'] ?? '';

        $sql = "INSERT INTO carrera (nombre, descripcion, titulo, tipo_carrera) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $nombre, $descripcion, $titulo, $tipo_carrera);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Carrera agregada exitosamente.";
        } else {
            echo "Error al agregar la carrera.";
        }
        mysqli_stmt_close($stmt);
    } else if ($accion === "eliminar") {
        $id_carrera = $_POST['id_carrera'] ?? '';

        if (empty($id_carrera)) {
            die("No se seleccionó una carrera para eliminar.");
        }

        $sql_planestudio = "DELETE FROM planestudio WHERE fk_carrera = ?";
        $stmt_planestudio = mysqli_prepare($conn, $sql_planestudio);
        mysqli_stmt_bind_param($stmt_planestudio, "i", $id_carrera);
        mysqli_stmt_execute($stmt_planestudio);
        mysqli_stmt_close($stmt_planestudio);

        $sql = "DELETE FROM carrera WHERE id_carrera = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_carrera);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Carrera eliminada exitosamente.";
        } else {
            echo "Error al eliminar la carrera.";
        }
        mysqli_stmt_close($stmt);
    }
} else if ($tabla === "contacto") {
    if ($accion === "agregar") {
        $descripcion = $_POST['descripcion'] ?? '';
        $tipo = $_POST['tipo'] ?? '';
        $contacto = $_POST['contacto'] ?? '';
        $fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

        $sql = "INSERT INTO contacto (descripcion, tipo, contacto, fk_establecimiento) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $descripcion, $tipo, $contacto, $fk_establecimiento);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Contacto agregado exitosamente.";
        } else {
            echo "Error al agregar el contacto.";
        }
        mysqli_stmt_close($stmt);
    } else if ($accion === "eliminar") {
        $id_contacto = $_POST['id_contacto'] ?? '';

        if (empty($id_contacto)) {
            die("No se seleccionó un contacto para eliminar.");
        }

        $sql = "DELETE FROM contacto WHERE id_contacto = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_contacto);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Contacto eliminado exitosamente.";
        } else {
            echo "Error al eliminar el contacto.";
        }
        mysqli_stmt_close($stmt);
    }
} else if ($tabla === "establecimiento") {
    if ($accion === "agregar") {
        $nombre = $_POST['nombre'] ?? '';
        $ubicacion = $_POST['ubicacion'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $tipo_establecimiento = $_POST['tipo_establecimiento'] ?? '';
        $servicios = $_POST['servicios'] ?? '';
        $fk_distrito = $_POST['fk_distrito'] ?? '';


        $coordenadas = obtenercoordenadas($ubicacion);
        $json_coordenadas = $coordenadas ? json_encode($coordenadas) : '{}'; 

        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_ext = pathinfo($imagen, PATHINFO_EXTENSION);

        if ($imagen_ext !== 'jpg') {
            die("El archivo de imagen debe ser de tipo JPG.");
        }

        $imagen_nombre = uniqid() . ".jpg";
        $upload_dir = '../imagenes/universidades/';
        $upload_file = $upload_dir . $imagen_nombre;

        if (move_uploaded_file($imagen_tmp, $upload_file)) {
            $sql = "INSERT INTO establecimiento (nombre, ubicacion, descripcion, tipo_establecimiento, servicios, fk_distrito, coordenadas) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssis", $nombre, $ubicacion, $descripcion, $tipo_establecimiento, $servicios, $fk_distrito, $json_coordenadas);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $id_establecimiento = mysqli_insert_id($conn);

                $sql_imagen = "INSERT INTO imagenes (url, fk_establecimiento) VALUES (?, ?)";
                $stmt_imagen = mysqli_prepare($conn, $sql_imagen);
                mysqli_stmt_bind_param($stmt_imagen, "si", $imagen_nombre, $id_establecimiento);
                mysqli_stmt_execute($stmt_imagen);

                if (mysqli_stmt_affected_rows($stmt_imagen) > 0) {
                    echo "Establecimiento e imagen agregados exitosamente.";
                } else {
                    echo "Error al agregar la imagen.";
                }
                mysqli_stmt_close($stmt_imagen);
            } else {
                echo "Error al agregar el establecimiento.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error al cargar la imagen.";
        }
    } else if ($accion === "eliminar") {
        $id_establecimiento = $_POST['id_establecimiento'] ?? '';

        if (empty($id_establecimiento)) {
            die("No se seleccionó un establecimiento para eliminar.");
        }

        $sql_planestudio = "DELETE FROM planestudio WHERE fk_establecimiento = ?";
        $stmt_planestudio = mysqli_prepare($conn, $sql_planestudio);
        mysqli_stmt_bind_param($stmt_planestudio, "i", $id_establecimiento);
        mysqli_stmt_execute($stmt_planestudio);
        mysqli_stmt_close($stmt_planestudio);

        $sql_contacto = "DELETE FROM contacto WHERE fk_establecimiento = ?";
        $stmt_contacto = mysqli_prepare($conn, $sql_contacto);
        mysqli_stmt_bind_param($stmt_contacto, "i", $id_establecimiento);
        mysqli_stmt_execute($stmt_contacto);
        mysqli_stmt_close($stmt_contacto);

        $sql_imagen = "DELETE FROM imagenes WHERE fk_establecimiento = ?";
        $stmt_imagen = mysqli_prepare($conn, $sql_imagen);
        mysqli_stmt_bind_param($stmt_imagen, "i", $id_establecimiento);
        mysqli_stmt_execute($stmt_imagen);
        mysqli_stmt_close($stmt_imagen);

        $sql = "DELETE FROM establecimiento WHERE id_establecimiento = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_establecimiento);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Establecimiento y registros relacionados eliminados exitosamente.";
        } else {
            echo "Error al eliminar el establecimiento.";
        }
        mysqli_stmt_close($stmt);
    }
} else if ($tabla === "planestudio") {
    if ($accion === "agregar") {
        $pdf = $_FILES['pdf']['name'];
        $pdf_tmp = $_FILES['pdf']['tmp_name'];
        $fk_carrera = $_POST['fk_carrera'] ?? '';
        $fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

        $pdf_nombre = uniqid() . ".pdf";
        $upload_dir = "../pdf/";

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $upload_file = $upload_dir . $pdf_nombre;

        if (move_uploaded_file($pdf_tmp, $upload_file)) {
            $sql = "INSERT INTO planestudio (pdf, fk_carrera, fk_establecimiento) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sii", $pdf_nombre, $fk_carrera, $fk_establecimiento);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Plan de estudio agregado exitosamente.";
            } else {
                echo "Error al agregar el plan de estudio.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error al cargar el archivo PDF.";
        }
    } else if ($accion === "eliminar") {
        $upload_dir = "../pdf/";
        $id_planestudio = $_POST['id_planestudio'] ?? '';

        if (empty($id_planestudio)) {
            die("No se seleccionó un plan de estudio para eliminar.");
        }

        $sql = "SELECT pdf FROM planestudio WHERE fk_carrera = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_planestudio);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $pdf_nombre);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($pdf_nombre) {
            $pdf_path = $upload_dir . $pdf_nombre;
            if (file_exists($pdf_path)) {
                unlink($pdf_path);
            }
        }

        $sql = "DELETE FROM planestudio WHERE fk_carrera = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_planestudio);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Plan de estudio eliminado exitosamente.";
        } else {
            echo "Error al eliminar el plan de estudio.";
        }
        mysqli_stmt_close($stmt);
    }
} else {
    echo "Acción o tabla no válida.";
}

mysqli_close($conn);
?>
