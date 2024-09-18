<?php
if(isset($_POST['tabla']) && isset($_SESSION['id_usuario'])){

include "../codigophp/conexionbs.php";
include "../codigophp/coordenadas.php";

$tabla = $_POST['tabla'] ?? '';

switch ($tabla) {
    case "carrera":
        $nombre = htmlspecialchars($_POST['nombre']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $titulo = htmlspecialchars($_POST['titulo']);
        $tipo_carrera = htmlspecialchars($_POST['tipo_carrera']);

        $sql = "INSERT INTO carrera (nombre, descripcion, titulo, tipo_carrera)
                VALUES ('$nombre', '$descripcion', '$titulo', '$tipo_carrera')";
        break;

    case "contacto":
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $tipo = htmlspecialchars($_POST['tipo']);
        $contacto = htmlspecialchars($_POST['contacto']);
        $fk_establecimiento = (int)$_POST['fk_establecimiento'];

        $sql = "INSERT INTO contacto (descripcion, tipo, contacto, fk_establecimiento)
                VALUES ('$descripcion', '$tipo', '$contacto', $fk_establecimiento)";
        break;

    case "establecimiento":
        $nombre = htmlspecialchars($_POST['nombre']);
        $ubicacion = htmlspecialchars($_POST['ubicacion']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $tipo_establecimiento = htmlspecialchars($_POST['tipo_establecimiento']);
        $servicios = htmlspecialchars($_POST['servicios']);
        $fk_distrito = (int)$_POST['fk_distrito'];
        $habilitado = isset($_POST['habilitado']) ? 1 : 0;


        $coordenadas = obtenerCoordenadas($ubicacion);
        $json_coordenadas = $coordenadas ? json_encode($coordenadas) : '{}';

        $sql = "INSERT INTO establecimiento (nombre, ubicacion, descripcion, tipo_establecimiento, servicios, fk_distrito, habilitado, coordenadas)
                VALUES ('$nombre', '$ubicacion', '$descripcion', '$tipo_establecimiento', '$servicios', $fk_distrito, $habilitado, '$json_coordenadas')";
        break;

    case "recursos":
        $fk_carrera = (int)$_POST['fk_carrera'];
        $fk_establecimiento = (int)$_POST['fk_establecimiento'];
        $tipo_recurso = htmlspecialchars($_POST['tipo_recurso']);
        
        if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK) {
            $pdf = $_FILES['pdf']['name'];
            $ruta_destino = "../pdf/" . basename($pdf);


            $tipo_archivo = strtolower(pathinfo($ruta_destino, PATHINFO_EXTENSION));
            if ($tipo_archivo != "pdf") {
                die("Solo se permiten archivos PDF.");
            }

            if (move_uploaded_file($_FILES['pdf']['tmp_name'], $ruta_destino)) {
                $sql = "INSERT INTO recursos (pdf, fk_carrera, fk_establecimiento, tipo_recurso)
                        VALUES ('$pdf', $fk_carrera, $fk_establecimiento, '$tipo_recurso')";
            } else {
                die("Error al subir el archivo.");
            }
        } else {

            $sql = "INSERT INTO recursos (pdf, fk_carrera, fk_establecimiento, tipo_recurso)
                    VALUES (NULL, $fk_carrera, $fk_establecimiento, '$tipo_recurso')";
        }
        break;

    case "imagenes":
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
            $imagen = $_FILES['imagen']['name'];
            $ruta_destino = "../imagenes/" . basename($imagen);

            $tipo_archivo = strtolower(pathinfo($ruta_destino, PATHINFO_EXTENSION));
            if ($tipo_archivo != "jpg" && $tipo_archivo != "jpeg") {
                die("Solo se permiten archivos JPG.");
            }

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
                $url = $imagen;
                $fk_establecimiento = (int)$_POST['fk_establecimiento'];

                $sql = "INSERT INTO imagenes (url, fk_establecimiento)
                        VALUES ('$url', $fk_establecimiento)";
            } else {
                die("Error al subir la imagen.");
            }
        } else {
            die("Error en la carga de la imagen.");
        }
        break;
    case "distrito":
            $nombre = $_POST['nombre'] ?? '';
    
            $sql = "INSERT INTO distrito (nombre) VALUES ('$nombre')";
            break;
    
    default:
        die("Tabla no válida.");
}

if (mysqli_query($conn, $sql)) {
    echo "Registro agregado con éxito.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
