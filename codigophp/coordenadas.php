<?php
function obtenercoordenadas($address) {
    $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($address) . "&format=json&limit=1";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3");

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error en la petición: ' . curl_error($ch);
        curl_close($ch);
        return null;
    }

    curl_close($ch);

    $data = json_decode($response, true);

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

function actualizarcoordenadas(){
    include "./conexionbs.php"; 

    $stmt = $conn->prepare("SELECT e.nombre AS establecimiento_nombre, e.ubicacion, e.id_establecimiento, d.nombre AS distrito_nombre 
                            FROM establecimiento e
                            INNER JOIN distrito d ON e.fk_distrito = d.id_distrito");

    if ($stmt->execute()) {
        $result2 = $stmt->get_result(); 
    } else {
        echo "Error en la consulta: " . $stmt->error;
        return;
    }

    foreach($result2 as $row4) {
        $address = $row4["ubicacion"] . ', ' . $row4["distrito_nombre"] . ', Buenos Aires';

        $coordinates = obtenercoordenadas($address);

        if ($coordinates) {
            $json_coordinates = json_encode($coordinates);

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

    $stmt->close();
    $conn->close();
}


?>
