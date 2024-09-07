<?php
// Función para obtener las coordenadas de una dirección usando Nominatim
function getCoordinates($address) {
    // URL para hacer la petición a Nominatim
    $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($address) . "&format=json&limit=1";

    // Inicializar cURL
    $ch = curl_init();

    // Configurar cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3");

    // Ejecutar la petición
    $response = curl_exec($ch);

    // Comprobar si hubo errores
    if (curl_errno($ch)) {
        echo 'Error en la petición: ' . curl_error($ch);
        curl_close($ch);
        return null;
    }

    // Cerrar la conexión cURL
    curl_close($ch);

    // Convertir la respuesta a un array
    $data = json_decode($response, true);

    // Comprobar si hay resultados
    if (!empty($data)) {
        $lat = $data[0]['lat'];
        $lon = $data[0]['lon'];
        return [
            'x' => $lat,
            'y' => $lon
        ];
    } else {
        return null;
    }
}

// Función para obtener los establecimientos y actualizar sus coordenadas en la base de datos
function mapa(){
    include "./codigophp/conexionbs.php"; // Incluye tu archivo de conexión a la base de datos

    // Ajustamos la consulta para obtener el establecimiento y el distrito
    $stmt = $conn->prepare("SELECT e.nombre AS establecimiento_nombre, e.ubicacion, e.id_establecimiento, d.nombre AS distrito_nombre 
                            FROM establecimiento e
                            INNER JOIN distrito d ON e.fk_distrito = d.id_distrito");

    if ($stmt->execute()) {
        $result2 = $stmt->get_result(); // Obtenemos el resultado
    } else {
        echo "Error en la consulta: " . $stmt->error;
        return;
    }

    // Procesamos cada fila de la consulta
    foreach($result2 as $row4) {
        // Formateamos la dirección para la búsqueda de coordenadas
        $address = $row4["ubicacion"] . ', ' . $row4["distrito_nombre"] . ', Buenos Aires';

        // Obtenemos las coordenadas a partir de la dirección
        $coordinates = getCoordinates($address);

        if ($coordinates) {
            // Convertimos las coordenadas a formato JSON
            $json_coordinates = json_encode($coordinates);

            // Actualizamos la base de datos con las coordenadas en formato JSON
            $updateStmt = $conn->prepare("UPDATE establecimiento SET coordenadas = ? WHERE id_establecimiento = ?");
            $updateStmt->bind_param("si", $json_coordinates, $row4["id_establecimiento"]);
            $updateStmt->execute();
            $updateStmt->close();

            echo "Establecimiento: " . $row4["establecimiento_nombre"] . "<br>";
            echo "Coordenadas guardadas: " . $json_coordinates . "<br><br>";
        } else {
            echo "No se encontraron coordenadas para el establecimiento: " . $row4["establecimiento_nombre"] . "<br>";
        }
    }

    // Cerramos la conexión y el statement
    $stmt->close();
    $conn->close();
}

// Llamada a la función mapa
mapa();
?>
