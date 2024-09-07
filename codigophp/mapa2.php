<?php
function mapa(){
    include "./conexionbs.php";
    $stmt = $conn->prepare("SELECT 
    e.nombre AS establecimiento_nombre, 
    e.ubicacion, 
    e.id_establecimiento, 
    d.nombre AS distrito_nombre, 
    e.coordenadas,
    i.url AS primera_imagen
FROM 
    establecimiento e
INNER JOIN 
    distrito d ON e.fk_distrito = d.id_distrito
LEFT JOIN 
    imagenes i ON i.fk_establecimiento = e.id_establecimiento
    AND i.id_imagen = (
        SELECT MIN(id_imagen)
        FROM imagenes
        WHERE fk_establecimiento = e.id_establecimiento
    );
");

    if ($stmt->execute()) {
        $result2 = $stmt->get_result();
    } else {
        echo "Error en la consulta: " . $stmt->error;
        return;
    }

    $lugares = array(); 
    foreach($result2 as $row4) {
        $coordenadas = json_decode($row4["coordenadas"], true); 

        if ($coordenadas) {
            $lugares[] = array(
                'name' => $row4["establecimiento_nombre"],
                'address' => [$coordenadas['x'], $coordenadas['y']], 
                'url' => '/abcdinamico/universidad.php?universidad=' . $row4["id_establecimiento"],
                'imageUrl'=> "https://lugengar.github.io/ABC/imagenes/universidades/".$row4["primera_imagen"],
            );
        }
    }

    echo 'var lugares = ' . json_encode($lugares, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . ';';

    $stmt->close();
    $conn->close();
}
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<link rel="stylesheet" href="../estiloscss/styles.css" />
<style>
#map {
    position: absolute;
    left: 0%;
    top:0%;
    height:100%;
    width: 100%;
}
.controles {
    position: fixed;
    top: 2vh;
    right: 2vh;
    z-index: 1000;
}

.controles button {
    background-size: 3vh;
    background-repeat: no-repeat;
    background-position: center;
    width:  5vh;
    height: 5vh;
    cursor: pointer;
    border: none;
    border-radius: 0.5vh;
   position:absolute;

}
#zoomIn{
    top: 0;
    right: 0;
    background-image: url(../imagenes/otros/signomas.svg);
    background-color: #00aec3;
}
#zoomOut{
    top: 6vh;
    right: 0;
    background-image: url(../imagenes/otros/signomenos.svg);
    background-color: #e81f76;
}
.botonuni {
    font-size: 2vh;
    border: none;
    border-radius: 1vh;
    height: 5vh;
    width: 100%;
    background-color: #e81f76;
    color: white;
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    margin-top: 1vh;
}
</style>

<div class="controles">
    <button id="zoomIn"onclick="zoomIn()"></button>
    <button id="zoomOut" onclick="zoomOut()"></button>
</div>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>

<?php mapa(); ?>

var map = L.map('map', {
    zoomControl: false  ,
    attributionControl: false 
}).setView([-34.6037, -58.3816], 13);

var customIcon = L.icon({
    iconUrl: 'https://lugengar.github.io/ABC/imagenes/otros/puntero.svg',  
    iconSize: [25, 25],  
    iconAnchor: [12, 25],  
    popupAnchor: [0, -25]  
});

L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://carto.com/attributions">CartoDB</a>'
}).addTo(map);

var bounds = L.latLngBounds();

lugares.forEach(function(lugar) {
    if (lugar.address) {
        var marker = L.marker(lugar.address, {icon: customIcon}).addTo(map)
            .bindPopup('<b> <h1>' + lugar.name + '<h1></b><img src="' + lugar.imageUrl + '" alt="Imagen del lugar" style="width:100%;height:auto; border-radius: 1vh;"><button onclick="redirectTo(\''+lugar.url+'\')" class="botonuni">Saber más</button>');
        bounds.extend(lugar.address);
    }
});

function redirectTo(url) {
    window.parent.location.href = url;
}

if (bounds.isValid()) {
    map.fitBounds(bounds);
}

function zoomIn() {
    map.zoomIn();
}

function zoomOut() {
    map.zoomOut();
}
</script>

</body>
</html>
