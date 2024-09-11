<?php
// OBTIENE EL PLAN DE ESTUDIOS DE LA CARRERA
$result = null;
include "./codigophp/conexionbs.php";

// Validar y limpiar el parámetro de búsqueda
if (isset($_GET['carrera']) && isset($_GET['universidad'])) {
    global $admin;
    $busqueda = filter_var($_GET['carrera'], FILTER_SANITIZE_SPECIAL_CHARS);
    $universidad = filter_var($_GET['universidad'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Preparar la consulta usando una consulta preparada
    $stmt = $conn->prepare("SELECT * FROM planestudio WHERE fk_carrera = ? AND fk_establecimiento = ?");
    
    $stmt->bind_param("ss", $busqueda, $universidad);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        //echo "<p class='error'>No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda) . "</p>";
    } else {
        $establecimientos = null;
        $sqll = "";
        // Usar una consulta preparada para obtener otros establecimientos
        $stmt2 = $conn->prepare("SELECT fk_establecimiento FROM planestudio WHERE fk_carrera = ?");
        $stmt2->bind_param("s", $busqueda);
        $stmt2->execute();
        $otros = $stmt2->get_result();

        if ($otros->num_rows > 1) {
            $ids = [];
            while ($otro = $otros->fetch_assoc()) {
                $ids[] = $otro["fk_establecimiento"];
            }

            $in_query = implode(',', array_fill(0, count($ids), '?'));
            $stmt3 = $conn->prepare("SELECT DISTINCT * FROM establecimiento WHERE id_establecimiento  IN ($in_query) AND id_establecimiento != $universidad AND id_establecimiento != 0 ".$admin);
            $stmt3->bind_param(str_repeat('s', count($ids)), ...$ids);
            $stmt3->execute();
            $establecimientos = $stmt3->get_result();
            
        $stmt3->close();

        }

        // Usar una consulta preparada para obtener los detalles de la carrera
        $stmt4 = $conn->prepare("SELECT * FROM carrera WHERE id_carrera = ?");
        $stmt4->bind_param("s", $busqueda);
        $stmt4->execute();
        $titulo = $stmt4->get_result();
        $row2 = $titulo->fetch_assoc();

        // Llamada a la función para mostrar la información
        info_carrera($row2["titulo"], $row2["descripcion"], $result, $row2["id_carrera"], $establecimientos);

        // Cerrar los statement adicionales
        $stmt2->close();
        $stmt4->close();
    }

    // Cerrar el statement y la conexión
    $stmt->close();
    $conn->close();
}
?>
