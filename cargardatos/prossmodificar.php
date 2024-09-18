<?php
session_start();

if((isset($_POST['tabla']) || isset($_GET['tabla'])) && isset($_SESSION['id_usuario'])){

include "../codigophp/conexionbs.php";
include "../codigophp/coordenadas.php";

$tabla = '';

if(isset($_POST['tabla'])){
    $tabla = $_POST['tabla'] ?? '';
}else{
    $tabla = $_GET['tabla'] ?? '';
}
switch ($tabla) {
    case "habilitado":
        $id_establecimiento = $_GET['id_establecimiento'] ?? '';
        $habilitado = $_GET['habilitado'] ?? '1';
        $booleano = "0";
        if($habilitado == "0"){
            $booleano = "1";
        }
        $sql = "UPDATE establecimiento SET habilitado = ? WHERE id_establecimiento = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $booleano, $id_establecimiento);
        break;
    case "carrera":
        $id_carrera = $_POST['id_carrera'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $titulo = $_POST['titulo'] ?? '';
        $tipo_carrera = $_POST['tipo_carrera'] ?? '';

        $sql = "UPDATE carrera SET nombre = ?, descripcion = ?, titulo = ?, tipo_carrera = ? WHERE id_carrera = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $descripcion, $titulo, $tipo_carrera, $id_carrera);
        break;

    case "distrito":
        $id_distrito = $_POST['id_distrito'] ?? '';
        $nombre = $_POST['nombre'] ?? '';

        $sql = "UPDATE distrito SET nombre = ? WHERE id_distrito = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $nombre, $id_distrito);
        break;

    case "contacto":
        $id_contacto = $_POST['id_contacto'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $tipo = $_POST['tipo'] ?? '';
        $contacto = $_POST['contacto'] ?? '';
        $fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

        $sql = "UPDATE contacto SET descripcion = ?, tipo = ?, contacto = ?, fk_establecimiento = ? WHERE id_contacto = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $descripcion, $tipo, $contacto, $fk_establecimiento, $id_contacto);
        break;

    case "imagenes":
        $id_imagen = $_POST['id_imagen'] ?? '';
$fk_establecimiento = $_POST['fk_establecimiento'] ?? '';

// Consulta para obtener la URL de la imagen actual antes de actualizar
$sql_select = "SELECT url FROM imagenes WHERE id_imagen = ?";
$stmt_select = mysqli_prepare($conn, $sql_select);
mysqli_stmt_bind_param($stmt_select, "i", $id_imagen);
mysqli_stmt_execute($stmt_select);
mysqli_stmt_bind_result($stmt_select, $imagen_actual);
mysqli_stmt_fetch($stmt_select);
mysqli_stmt_close($stmt_select);

// Comprobar si se ha subido una nueva imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen_file = $_FILES['imagen'];
    $imagen_name = basename($imagen_file['name']);
    $upload_dir = ($fk_establecimiento == 0) ? '../imagenes/otros/' : '../imagenes/universidades/';
    $upload_file = $upload_dir . $imagen_name;

    // Eliminar la imagen anterior si existe
    if (!empty($imagen_actual)) {
        $ruta_imagen_actual = $upload_dir . $imagen_actual;
        if (file_exists($ruta_imagen_actual)) {
            unlink($ruta_imagen_actual); // Elimina la imagen anterior
        }
    }

    // Mover la nueva imagen a la ubicación de destino
    if (move_uploaded_file($imagen_file['tmp_name'], $upload_file)) {
        // Preparar la consulta para actualizar la información de la imagen
        $sql = "UPDATE imagenes SET url = ?, fk_establecimiento = ? WHERE id_imagen = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sii", $imagen_name, $fk_establecimiento, $id_imagen);
    } else {
        echo "Error al subir la imagen.";
        exit;
    }
} else {
    echo "Error en el archivo de imagen: " . $_FILES['imagen']['error'];
    exit;
}



        break;
        case "recursos":
            $id_recurso = (int)$_POST['id_recurso']; // ID del recurso que se va a actualizar
            $fk_carrera = (int)$_POST['fk_carrera'];
            $fk_establecimiento = (int)$_POST['fk_establecimiento'];
            $tipo_recurso = htmlspecialchars($_POST['tipo_recurso']);
        
            // Consulta para obtener el nombre del PDF actual antes de actualizar
            $sql_select = "SELECT pdf FROM recursos WHERE id_recurso = ?";
            $stmt_select = mysqli_prepare($conn, $sql_select);
            mysqli_stmt_bind_param($stmt_select, "i", $id_recurso);
            mysqli_stmt_execute($stmt_select);
            mysqli_stmt_bind_result($stmt_select, $pdf_actual);
            mysqli_stmt_fetch($stmt_select);
            mysqli_stmt_close($stmt_select);
        
            // Eliminar el PDF actual si se va a cargar uno nuevo
            if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK) {
                $pdf = $_FILES['pdf']['name'];
                $ruta_destino = "../pdf/" . basename($pdf);
                
                $tipo_archivo = strtolower(pathinfo($ruta_destino, PATHINFO_EXTENSION));
                if ($tipo_archivo != "pdf") {
                    die("Solo se permiten archivos PDF.");
                }
        
                // Eliminar el archivo PDF anterior si existe
                if (!empty($pdf_actual)) {
                    $ruta_pdf_actual = "../pdf/" . $pdf_actual;
                    if (file_exists($ruta_pdf_actual)) {
                        unlink($ruta_pdf_actual); // Elimina el archivo anterior
                    }
                }
        
                // Mover el nuevo archivo PDF a la ubicación de destino
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $ruta_destino)) {
                    // Preparar la consulta para actualizar la información del recurso
                    $sql = "UPDATE recursos SET pdf = ?, fk_carrera = ?, fk_establecimiento = ?, tipo_recurso = ? WHERE id_recurso = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sisis", $pdf, $fk_carrera, $fk_establecimiento, $tipo_recurso, $id_recurso);
                } else {
                    die("Error al subir el archivo.");
                }
            } else {
                // Si no se carga un nuevo PDF, solo se actualizan los demás campos
                $sql = "UPDATE recursos SET fk_carrera = ?, fk_establecimiento = ?, tipo_recurso = ? WHERE id_recurso = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "iisi", $fk_carrera, $fk_establecimiento, $tipo_recurso, $id_recurso);
            }
        

            break;
        
    case "establecimiento":
        $id_establecimiento = $_POST['id_establecimiento'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $ubicacion = $_POST['ubicacion'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $tipo_establecimiento = $_POST['tipo_establecimiento'] ?? '';
        $servicios = $_POST['servicios'] ?? '';
        $fk_distrito = $_POST['fk_distrito'] ?? '';
        $habilitado = $_POST['habilitado'] ?? '1';

        $coordenadas = obtenercoordenadas($ubicacion);
        $json_coordenadas = $coordenadas ? json_encode($coordenadas) : '{}';

        $sql = "UPDATE establecimiento SET nombre = ?, ubicacion = ?, descripcion = ?, tipo_establecimiento = ?, servicios = ?, fk_distrito = ?, coordenadas = ?, habilitado = ? WHERE id_establecimiento = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssisii", $nombre, $ubicacion, $descripcion, $tipo_establecimiento, $servicios, $fk_distrito, $json_coordenadas, $habilitado, $id_establecimiento);
        break;

        case "carrusel":
            $id_establecimiento = $_POST['id_establecimiento'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
    
            $sql = "UPDATE establecimiento SET nombre = ?, descripcion = ? WHERE id_establecimiento = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $nombre, $descripcion, $id_establecimiento);
            break;
    
    default:
        echo "Tabla no válida.";
        exit;
}

if (mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo ucfirst($tabla) . " modificado exitosamente.";
    } else {
        echo "Error al modificar " . $tabla . ".";
    }
} else {
    echo "Error en la ejecución de la consulta.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
}
?>
