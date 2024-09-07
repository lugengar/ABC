<?php
function mapa(){
    include "./codigophp/conexionbs.php";

    $stmt = $conn->prepare("SELECT * FROM establecimiento");
    
    $stmt->execute();

    $result2 = $stmt->get_result();
    foreach($result2 as $key => $row4) {
        $coordenadas = json_decode($row4["coordenadas"],true);
        $x = $coordenadas["x"];
        $y = $coordenadas["y"];
        echo '<button class="puntero" onclick="window.parent.location.href=\'universidad.php?universidad='.$row4["id_establecimiento"].'\'" style="left: '.$x.'vh; top: '.$y.'vh;"><span class="nombrepuntero">'.$row4["tipo_establecimiento"].'</span></button>';       
    }
    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Zoom y Scroll</title>
    <link rel="stylesheet" href="estiloscss/styles.css">
</head>
<body>
    <div class="capa">
        <div class="mapa" id="mapa">
        

            <button class="puntero distritomapa" onclick="window.parent.location.href='index.php?busqueda=1&tipo=distrito#identificador2'"  style="left: 920vh; top: 190vh;"><span class="nombrepuntero" id="nombrepuntero"></span>Tigre</button>
            <button class="puntero distritomapa" onclick="window.parent.location.href='index.php?busqueda=5&tipo=distrito#identificador2'" style="left: 895vh; top: 188vh;"><span class="nombrepuntero" id="nombrepuntero"></span>Escobar</button>
            <button class="puntero distritomapa" onclick="window.parent.location.href='index.php?busqueda=31&tipo=distrito#identificador2'" style="left: 923vh; top: 207vh;"><span class="nombrepuntero" id="nombrepuntero"></span>San Fernando</button>
            <button class="puntero distritomapa" onclick="window.parent.location.href='index.php?busqueda=2&tipo=distrito#identificador2'" style="left: 932vh; top: 215vh;"><span class="nombrepuntero" id="nombrepuntero"></span>San Isidro</button>
            <button class="puntero distritomapa" onclick="window.parent.location.href='index.php?busqueda=4&tipo=distrito#identificador2'"  style="left: 935vh; top: 223vh;"><span class="nombrepuntero" id="nombrepuntero"></span>Vicente Lopez</button>
            <button class="puntero distritomapa"  id="destacado" style="left: 920vh; top: 200vh;"><span class="nombrepuntero" id="nombrepuntero"></span></button>
            <?php mapa()?>

        </div>
    </div>
    <div class="controles">
        
        <button id="zoomIn"></button>
        <button id="zoomOut"></button>
    </div>
</body>
</html>

<style>
    #zoomIn{
    background-image: url(imagenes/otros/signomas.svg);
    background-color: #00aec3;
    }
    #zoomOut{
    background-image: url(imagenes/otros/signomenos.svg);
    background-color: #e81f76;
    }
   .opacidad{
    opacity: 50%;
    pointer-events: none;
   }
body, html {
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.capa {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    overflow: auto;
}

.mapa {
    width: 1400vh;
    height: 1400vh;
    background-image: url(imagenes/otros/mapacompleto2.svg);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    background-color: transparent;
    transform: scale(1);
    transform-origin: 0 0;
    transition: transform 0.3s ease-in-out;
    position: relative;
}

.nombrepuntero{
    font-family: "Encode Sans", sans-serif;
    font-weight: 700;
    font-style: normal;
    color:#e81f76;
    position: absolute;
    left: -2.75vh;
    bottom: -4.1vh;
    width: 10vh;
    height: 5vh;
    display: flex;
    pointer-events: none;
    justify-content: center;
    font-size: 0;
}

.puntero {
    position: absolute;
    height: 6vh;
    width: 4vh;
    background-image: url(imagenes/otros/puntero.svg);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center ;
    background-color: transparent;
    border: none;
    transition: transform 0.3s ease-in-out; 
}
/*
.puntero {
    position: absolute;
    height: 6vh;
    width: 4vh;
    background-image: url(imagenes/otros/puntero.svg);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center ;
    background-color: transparent;
    border: none;
    transition: transform 0.3s ease-in-out; 
}*/
.distritomapa .nombrepuntero{
    text-decoration: underline;
}
.distritomapa{
    background-image: none;
    background-color: transparent;
    border: none;
}
#descatado {

    pointer-events: none;
    background-image: none;
    background-color: transparent;
    border: none;
}

/* Estilo de los botones de control */
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

}
</style>

<script>
let scale = 1;
const scaleMin = 0.5;
const scaleMax = 6;
const mapa = document.getElementById('mapa');
const capa = document.querySelector('.capa');  // La capa que contiene el mapa
const punteroDestacado = document.querySelector('#destacado');
// Convertir coordenadas geográficas a coordenadas en vh
function convertirCoordenadas(lat, lng) {
    const vhMax = 1400;  // Tamaño del mapa en vh
    
    // Definir los límites del mapa en coordenadas geográficas
    const LAT_MIN = -34.6;  
    const LAT_MAX = -34.3;
    const LNG_MIN = -58.8;  
    const LNG_MAX = -58.7;

    // Convertir las coordenadas a vh
    const x = ((lng - LNG_MIN) / (LNG_MAX - LNG_MIN)) * vhMax;
    const y = ((LAT_MAX - lat) / (LAT_MAX - LAT_MIN)) * vhMax;

    return { x, y };
}

// Convertir coordenadas geográficas a coordenadas en vh
function convertirCoordenadas(lat, lng) {
    const vhMax = 1400;  // Tamaño del mapa en vh

    // Definir los límites del mapa en coordenadas geográficas
    const LAT_MIN = -34.6;  
    const LAT_MAX = -34.3;
    const LNG_MIN = -58.8;  
    const LNG_MAX = -58.6;

    // Convertir las coordenadas a vh
    const x = ((lng - LNG_MIN) / (LNG_MAX - LNG_MIN)) * vhMax;
    const y = ((LAT_MAX - lat) / (LAT_MAX - LAT_MIN)) * vhMax;

    return { x, y };
}

// Crear un nuevo puntero en el mapa


function actualizarTransform() {
  

    mapa.style.transform = `scale(${scale})`;
    const punteros = document.querySelectorAll('.puntero');
    punteros.forEach(puntero => {
        puntero.style.transform = `scale(${1 / scale})`;
    
        const nombrePuntero = puntero.querySelector(".nombrepuntero");
        if (scale >= 1) {
            nombrePuntero.style.fontSize = "1.5vh";
        } else {
            nombrePuntero.style.fontSize = "0";
        }
    });
    centrarPuntero();

   
}

function centrarPuntero() {
    const rect = punteroDestacado.getBoundingClientRect();
    const mapaRect = mapa.getBoundingClientRect();
    
    const offsetX = (rect.left - mapaRect.left) / scale;
    const offsetY = (rect.top - mapaRect.top) / scale;

    capa.scrollLeft = offsetX - (capa.clientWidth / 2);
    capa.scrollTop = offsetY - (capa.clientHeight / 2);
}

document.getElementById('zoomIn').addEventListener('click', function() {
    if (scale < scaleMax) {
        scale += 0.1;
        actualizarTransform();
    }
});

document.getElementById('zoomOut').addEventListener('click', function() {
    if (scale > scaleMin) {
        scale -= 0.1;
        actualizarTransform();
    }
});

window.addEventListener('load', function() {
    if (punteroDestacado) {
        // Aplicar la transformación inicial
        actualizarTransform();
    }


});
/*
document.getElementById('mapa').addEventListener('click', function(event) {
    // Obtener las coordenadas del click relativo al mapa
    const rect = this.getBoundingClientRect();
    const x = event.clientX - rect.left;
    const y = event.clientY - rect.top;

    // Convertir las coordenadas del clic en vh
    const xVH = ((x / rect.width) * 1400) -2; // 1400vh es el tamaño del mapa en vh
    const yVH = ((y / rect.height) * 1400) -6;

    // Crear el nuevo puntero en la posición clickeada
    const nuevoPuntero = document.createElement('button');
    nuevoPuntero.classList.add('puntero');
    nuevoPuntero.style.left = `${xVH}vh`;
    nuevoPuntero.style.top = `${yVH}vh`;

    // Crear y agregar el texto al puntero
    const textoPuntero = document.createElement('span');
    textoPuntero.classList.add('nombrepuntero');
    textoPuntero.textContent = "Nuevo Puntero"; // Puedes personalizar el texto
    nuevoPuntero.appendChild(textoPuntero);

    // Agregar el nuevo puntero al mapa
    this.appendChild(nuevoPuntero);
});
*/
</script>
