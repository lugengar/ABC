<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abc";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$tabla = $_POST['tabla'];

// Función para comprobar duplicados
function checkDuplicate($conn, $table, $column, $value) {
    $query = "SELECT COUNT(*) as count FROM $table WHERE $column = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}

$executeStmt = true;

if ($tabla === "carrera") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $titulo = $_POST['titulo'];

    if (!checkDuplicate($conn, 'carrera', 'nombre', $nombre)) {
        $stmt = $conn->prepare("INSERT INTO carrera (nombre, descripcion, titulo) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $descripcion, $titulo);
        if ($stmt->execute()) {
            echo "Carrera cargada correctamente.";
        } else {
            echo "Error al cargar la carrera: " . $stmt->error;
        }
    } else {
        echo "Entrada duplicada para carrera con nombre: " . htmlspecialchars($nombre);
        $executeStmt = false;
    }

} elseif ($tabla === "contacto") {
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $contacto = $_POST['contacto'];

    if (empty($contacto)) {
        echo "El campo contacto no puede estar vacío.";
        $executeStmt = false;
    } else {
        if (!checkDuplicate($conn, 'contacto', 'contacto', $contacto)) {
            $fk_establecimiento = $_POST['fk_establecimiento'];
            $stmt = $conn->prepare("INSERT INTO contacto (descripcion, tipo, contacto, fk_establecimiento) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $descripcion, $tipo, $contacto, $fk_establecimiento);
            if ($stmt->execute()) {
                echo "Contacto cargado correctamente.";
            } else {
                echo "Error al cargar el contacto: " . $stmt->error;
            }
        } else {
            echo "Entrada duplicada para contacto con contacto: " . htmlspecialchars($contacto);
            $executeStmt = false;
        }
    }

} elseif ($tabla === "distrito") {
    $nombre = $_POST['nombre'];

    if (!checkDuplicate($conn, 'distrito', 'nombre', $nombre)) {
        $stmt = $conn->prepare("INSERT INTO distrito (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        if ($stmt->execute()) {
            echo "Distrito cargado correctamente.";
        } else {
            echo "Error al cargar el distrito: " . $stmt->error;
        }
    } else {
        echo "Entrada duplicada para distrito con nombre: " . htmlspecialchars($nombre);
        $executeStmt = false;
    }

} elseif ($tabla === "establecimiento") {
    $nombre = $_POST['nombre'];
    $fk_distrito = $_POST['fk_distrito'];

    if (!checkDuplicate($conn, 'establecimiento', 'nombre', $nombre)) {
        $stmt = $conn->prepare("INSERT INTO establecimiento (nombre, fk_distrito) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $fk_distrito);
        if ($stmt->execute()) {
            echo "Establecimiento cargado correctamente.";
        } else {
            echo "Error al cargar el establecimiento: " . $stmt->error;
        }
    } else {
        echo "Entrada duplicada para establecimiento con nombre: " . htmlspecialchars($nombre);
        $executeStmt = false;
    }

}  elseif ($tabla === "imagenes") {
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_file = $_FILES['imagen'];
        $upload_dir = '../imagenes/universidades/'; // Directorio donde se guardarán las imágenes
        $imagen_name = basename($imagen_file['name']);
        $upload_file = $upload_dir . $imagen_name;

        if (move_uploaded_file($imagen_file['tmp_name'], $upload_file)) {
            $fk_establecimiento = $_POST['fk_establecimiento'];
            $url = $imagen_name; // Asignar el nombre de la imagen a la variable $url

            if (!checkDuplicate($conn, 'imagenes', 'url', $url)) {
                $stmt = $conn->prepare("INSERT INTO imagenes (url, fk_establecimiento) VALUES (?, ?)");
                $stmt->bind_param("si", $url, $fk_establecimiento);
                if ($stmt->execute()) {
                    echo "Imagen cargada correctamente.";
                } else {
                    echo "Error al cargar la imagen: " . $stmt->error;
                }
            } else {
                echo "Entrada duplicada para imagen con nombre: " . htmlspecialchars($url);
                $executeStmt = false;
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error en el archivo de imagen: " . $_FILES['imagen']['error'];
    }
} elseif ($tabla === "planestudio") {
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        $pdf_file = $_FILES['pdf'];
        $upload_dir = '../pdf/';
        $pdf_name = basename($pdf_file['name']);
        $upload_file = $upload_dir . $pdf_name;

        if (move_uploaded_file($pdf_file['tmp_name'], $upload_file)) {
            $fk_carrera = $_POST['fk_carrera'];
            $fk_establecimiento = $_POST['fk_establecimiento'];

            if (!checkDuplicate($conn, 'planestudio', 'fk_establecimiento', $fk_establecimiento)) {
                $stmt = $conn->prepare("INSERT INTO planestudio (pdf, fk_carrera, fk_establecimiento) VALUES (?, ?, ?)");
                $stmt->bind_param("sii", $pdf_name, $fk_carrera, $fk_establecimiento);
                if ($stmt->execute()) {
                    echo "Plan de estudio cargado correctamente.";
                } else {
                    echo "Error al cargar el plan de estudio: " . $stmt->error;
                }
            } else {
                echo "Entrada duplicada para plan de estudio con fk_establecimiento: " . htmlspecialchars($fk_establecimiento);
                $executeStmt = false;
            }
        } else {
            echo "Error al subir el archivo PDF.";
        }
    } else {
        echo "Error en el archivo PDF: " . $_FILES['pdf']['error'];
    }
}

// Cerrar conexión
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();

// Redirección automática después de 2 segundos
if ($executeStmt) {
    echo "<script>
        setTimeout(function() {
            window.location.href = 'inicio.php'; // Cambia 'inicio.php' por la URL de tu menú
        }, 2000);
    </script>";
}
?>