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
    // (Manejar la lógica de la tabla carrera)
} elseif ($tabla === "contacto") {
    // (Manejar la lógica de la tabla contacto)
} elseif ($tabla === "distrito") {
    // (Manejar la lógica de la tabla distrito)
} elseif ($tabla === "establecimiento") {
    // (Manejar la lógica de la tabla establecimiento)
} elseif ($tabla === "imagenes") {
    // (Manejar la lógica de la tabla imagenes)
} elseif ($tabla === "planestudio") {
    // Manejar la subida del archivo PDF
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        $pdf_file = $_FILES['pdf'];
        $upload_dir = '../pdf/';
        $pdf_name = basename($pdf_file['name']);
        $upload_file = $upload_dir . $pdf_name;

        // Mover el archivo subido a la carpeta designada
        if (move_uploaded_file($pdf_file['tmp_name'], $upload_file)) {
            // Archivo subido correctamente, guardar la información en la base de datos
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
                echo "Entrada duplicada para plan de estudio con fk_establecimiento: $fk_establecimiento";
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
?>