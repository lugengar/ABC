<?php

//ESTE ARCHIVO SE ENCARGA DE CONSTRUIR EL DISEÑO RECIBIENDO LOS DATOS DE LA BDD

//DIRECCIONES DE DONDE TOMAR LAS IMAGENES Y PDF
//$direccionimagen = "https://lugengar.github.io/ABC/imagenes/universidades/";
//$direccionpdf = "https://lugengar.github.io/ABC/pdf/";
//$direccionimagen = "https://lugengar.github.io/ABCDinamico/imagenes/universidades/";
//$direccionpdf = "https://lugengar.github.io/ABCDinamico/pdf/";
$direccionimagen = "./imagenes/universidades/";
$direccionimagen2 = "./imagenes/otros/";
$direccionpdf = "./pdf/";

function universidad($id,$nombre ,$descripcion, $imagenes,$carreras,$habilitado){ //CREA EL CUADRO DE UNIVERSIDAD
    global $direccionimagen;
    echo '<div class="universidad">';
        if($habilitado == "1"){
            echo '<div class="imagenesuni" style="position:relative;">';
            echo '<div class="privado"></div> ';
        }else{
            echo '<div class="imagenesuni">';
        }
    if($imagenes->num_rows > 0){
        foreach($imagenes as $key => $imagen) {
            echo '<div class="imagenuni activo" style="background-image: url('.$direccionimagen."".$imagen["url"].');"></div>';
        }
        if($imagenes->num_rows > 1){
            echo '<div class="circulos">';
            foreach($imagenes as $key => $imagen) {
                if($key == 0){
                    echo '<span class="circulo2 activo"></span>';
                }else{
                    echo '<span class="circulo2"></span>';
                }
            }
            echo'</div></div><div class="barrauni"></div>';
        }else{
            echo '</div> <div class="barrauni"></div>';
        }
    }else{

        echo'<h1 class=" imagenuni activo errorimg"></h1>';
        echo '</div> <div class="barrauni"></div>';

    }
    echo('
        <h1 class="nombreuni">'.$nombre.'</h1>
        ');//<p class="descripcionuni">'.$descripcion.'</p>
    if($carreras != null){
        echo('<p class="descripcionuni" >');

        foreach($carreras as $key => $carrera) {
            echo '- <a href="./universidad.php?universidad='.$id.'&carrera='.$carrera["id_carrera"].'#carreraelegida2">'.$carrera["nombre"].'</a><br>';
        }
        echo '</p>';
    }else{
        echo('<p class="descripcionuni" style="height:0vh;padding-top:0;"></p><a href="./universidad.php?universidad='.$id.'" class="botonuni">SABER MAS..</a>');
    }
        echo'</div>';
}
function crearmapa($coordenadas,$ubicacion, $zoom = 15) {
    if($coordenadas != null){
        $url = "https://www.google.com/maps?q=".$coordenadas["x"].",".$coordenadas["y"]."&z=$zoom&output=embed";
    }else{
        $url = "https://www.google.com/maps?q=$ubicacion&z=$zoom&output=embed";

    }
    return $url;
 
}


function nombre_url($url){ //OBTIENE EL NOMBRE DE UNA RED SOCIAL A TRAVEZ DE SU URL
    $parsed_url = parse_url($url);

    $path = trim($parsed_url['path'], '/');

    $account_name = basename($path);
    return $account_name;
}
function generarTextoRedesSociales($contactos) { //CREA UN TEXTO COOHERENTE DONDE SE MUESTRAN TODAS LAS REDES SOCIALES DE LA UNIVERSIDAD
    global $haycorreo;

    $texto = "Contamos con ";

    $nombresRedes = [
        "youtube" => "un canal de YouTube: ",
        "instagram" => "Instagram: ",
        "whatsapp" => "Whatsapp: ",
        "tiktok" => "TikTok: ",
        "facebook" => "Facebook: ",
        "twitter" => "Twitter: ",
        "correo" => "correo electrónico: ",
        "telefono" => "numero de teléfono: ",
    ];

    $redesDisponibles = [];
    foreach ($contactos as $contacto) {
        if (isset($nombresRedes[$contacto["tipo"]])) {
            if($contacto["tipo"] == "correo"){
                $haycorreo = true;
                $redesDisponibles[] = '<span class="label">'.$nombresRedes[$contacto["tipo"]].'</span><a href="mailto:'.$contacto["contacto"].'">' .$contacto["contacto"]. '</a>';

            }else if($contacto["tipo"] == "telefono"){
                $redesDisponibles[] = '<span class="label">'.$nombresRedes[$contacto["tipo"]].'</span><a href="tel:'.arreglar_telefono($contacto["contacto"]).'">' .arreglar_telefono($contacto["contacto"]) . '</a>';
            }else{
                $redesDisponibles[] = '<span class="label">'.$nombresRedes[$contacto["tipo"]].'</span><a href="'.arreglar_url($contacto["contacto"]).'" target="_blank">' .nombre_url($contacto["contacto"]) . '</a>';
            }
        }
    }
    $cantidad = count($redesDisponibles);

    if ($cantidad == 1) {
        $texto .= $redesDisponibles[0] . ".";
    } elseif ($cantidad == 2) {
        $texto .= $redesDisponibles[0] . " y " . $redesDisponibles[1] . ".";
    } elseif ($cantidad > 2) {
        $texto .= implode(", ", array_slice($redesDisponibles, 0, -1)) . " y " . end($redesDisponibles) . ".";
    }

    return $texto;
}
function cortarTexto($texto, $longitud = 70) {
    if (strlen($texto) > $longitud) {
        return substr($texto, 0, $longitud) . '...';
    } else {
        return $texto;
    }
}
function carreraslista($carreras){ // CREA LA LISTA DE CARRERAS Y TECNICATURAS PARA LA BARRA DE BUSQUEDA
    foreach ($carreras as $carrera) {
        if($carrera["nombre"] != ""){
        echo '<option value="'.$carrera["id_carrera"].'">'.cortarTexto($carrera["nombre"]).'</option>';
        }
    }
}
function establecimientolista($establecimientos){ // CREA LA LISTA DE CARRERAS Y TECNICATURAS PARA LA BARRA DE BUSQUEDA
    foreach ($establecimientos as $establecimiento) {
        if($establecimiento["tipo_establecimiento"] != ""){

        echo '<option value="'.$establecimiento["tipo_establecimiento"].'">'.cortarTexto($establecimiento["tipo_establecimiento"]).'</option>';
        }
    }
}
function carreratipolista($carreras){ // CREA LA LISTA DE CARRERAS Y TECNICATURAS PARA LA BARRA DE BUSQUEDA
    foreach ($carreras as $carrera) {
        if($carrera["tipo_carrera"] != ""){

        echo '<option value="'.$carrera["tipo_carrera"].'">'.cortarTexto($carrera["tipo_carrera"]).'</option>';
        }
    }
}

function distritolista($distritos){ // CREA LA LISTA DE LOS DISTRITOS PARA LA BARRA DE BUSQUEDA
    foreach ($distritos as $distrito) {
        if($distrito["nombre"] != ""){

        echo '<option value="'.$distrito["id_distrito"].'">'.cortarTexto($distrito["nombre"]).'</option>';
        }
    }
}
function arreglar_telefono($tel){ // MODIFICA EL NUMERO DE TELEFONO EN CASO DE FALTAR EL +54 O EL 11
    $contidad = strlen($tel);
    if(($tel[0] != "1" && $tel[1] != "1") || ($tel[0] != "0" && $tel[1] != "1")){
        $tel = "11 ".$tel;
    }
    return $tel;
}



function arreglar_url($url){ // MODIFICA LAS URL PARA QUE FUNCIONEN CORRECTAMENTE
    if($url[0] != "h" && $url[1] != "t"){
        $posicionSlash = strpos($url, '/');
        if ($posicionSlash != false) {
            $parteAntesDelSlash = substr($url, 0, $posicionSlash);
            $parteDespuesDelSlash = substr($url, $posicionSlash);
            $url = $parteAntesDelSlash . ".com" . $parteDespuesDelSlash;
        } else {
            $url = $url . ".com";
        }
        $url = "https://www.".$url;
    }
    return $url;
    

}
function arreglarpdf($url){ //MODIFICA EL NOMBRE DEL ARCHIVO PDF EN CASO DE QUE ALGO NO ESTE BIEN
    global $direccionpdf;
    if($url[0] != "h" && $url[1] != "t"){
       $url = $direccionpdf . $url;
    }
    if($url[strlen($url)-1] != "f"){
        $url = $url . ".pdf";
    }
    if($url[strlen($url)-1] == "."){
        $url = $url . "pdf";
    }
    return $url;
}

$haycorreo = false;
function info_universidad($info,$ubicacion,$servicios,$distrito,$nombre,$contactos,$id,$coordenadas){ // MUESTRA TODA LA INFORMACION DE LA UNIVERSIDAD
    global $haycorreo;
    global $secretkey1;
    
    $textocontacto = generarTextoRedesSociales($contactos);
    $todoslosservicios = ['<p class="redsocial2" style="background-image: url(imagenes/iconos/silladeruedas.svg);">Accesibilidad para sillas de ruedas.</p>',
    '<p class="redsocial2" style="background-image: url(imagenes/iconos/calefaccion.svg);">Cuenta con calefacción</p>',
    '<p class="redsocial2" style="background-image: url(imagenes/iconos/wifi.svg);">Cuenta con WIFI</p>',
    '<p class="redsocial2" style="background-image: url(imagenes/iconos/comedor.svg);">Cuenta con comedor</p>'];

        echo (' 
       
    <div class="identificador" id="identificador1" style="top: 100vh;"></div>
        <div class="universidad horizontal" id="info">  
            <div class="imageninfo2" style="background-image: url(imagenes/iconos/informacion.svg);"></div>
            <div class="barrauni3"></div>
            <div class="lista5" style="gap: 0vh;">
            <h1 class="nombreuni">¿PORQUE ELEGIRNOS?</h1>
            <p class="descripcionuni">'.$info.'</p>
            
            <div class="redesociales">');
            if($servicios != "0000"){
                for ($i=0; $i < 3; $i++) { 
                    if($servicios[$i] == "1"){
                        echo $todoslosservicios[$i];
                    }
                }
            }
    echo'</div> </div> </div> ';
        echo ('
        <div class="universidad" id="mapa"> 
            <iframe  class="imageninfo"  src="'.crearmapa($coordenadas,($ubicacion.', '.$distrito)).'" style="border:none;height: 70%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="barrauni"></div>
            <h1 class="nombreuni">UBICACIÓN</h1>
            <p class="descripcionuni">'.$ubicacion.', '.$distrito.'</p>
            </div>
        <div class="universidad horizontal" id="redes"> 
           <div class="imageninfo2" style="background-image: url(imagenes/iconos/correo.svg);"></div>
            <div class="barrauni3"></div>
            <div class="lista5" style="gap: 0vh;">
            <h1 class="nombreuni">CONTACTO Y REDES SOCIALES</h1>');
            $inscripcion = null;
            $correo = null;
            
       
            if($contactos->num_rows > 0){
              
                echo ' <p class="descripcionuni">'.$textocontacto.'</p>';
                echo '<div class="redesociales">';
                foreach($contactos as $key => $contacto) {
                    if($contacto["tipo"] == "correo"){
                        echo '<a class="redsocial2 " style="background-image: url(imagenes/iconos/'.$contacto["tipo"].'.svg);" href="mailto:inscripcion@'.$contacto["contacto"].'" >Enviar correo</a>';
                        $correo = $contacto["contacto"];
                    }else if($contacto["tipo"] == "telefono"){
                        echo '<a class="redsocial2 " style="background-image: url(imagenes/iconos/'.$contacto["tipo"].'.svg);" href="tel:'.($contacto["contacto"]).'" >Llamar por telefono</a>';
                    }else{
                        echo '<a class="redsocial " style="background-image: url(imagenes/iconos/'.$contacto["tipo"].'.svg);" href="'.arreglar_url($contacto["contacto"]).'" target="_blank" ></a>';
                    }
                }
                echo'</div>';
            }else{
                echo '<p class="descripcionuni" >Por el momento no se encuentran contactos disponibles.</p>';
            }
            echo'</div> </div>';
            if($haycorreo == true){// EN CASO DE NO CONTAR CON UN CONTACTO NO MOSTRARA LA INSCRIPCION
                echo ('
                <form class="universidad horizontal" method="post" action="./codigophp/enviarcorreo.php" id="formulariodecontacto" onsubmit="return verificarRecaptcha()">
                    <div class="imageninfo2"style="background-image: url(imagenes/iconos/inscripcion.svg);"></div>
                    <div class="barrauni3"></div>
                        <div class="lista5" style="gap: 0vh;">
                    <h1 class="nombreuni">SOLICITAR MAS INFORMACIÓN</h1>
                    <input type="hidden" id="receptor" name="receptor" value="'.$correo.'" required>
                    <input type="text" id="nombre2" name="nombre" required placeholder="Nombre">
                    <input type="hidden" id="universidad" name="universidad" value="'.$id.'">
                    <input type="mail" id="email" name="email" required placeholder="Correo">
                    <textarea id="message" name="mensaje" required placeholder="Hola. Me gustaría obtener información sobre.."></textarea>
                    <div class="g-recaptcha masarriba" data-sitekey="'.$secretkey1.'"></div>
                    <button  class="botonuni inscribirse" type="submit">Enviar</button>
                    </div>
                </form> 
                <script>
                    function verificarRecaptcha() {
                        var response = grecaptcha.getResponse();
                        if (response.length === 0) {
                            alert("Por favor, completa el reCAPTCHA.");
                            return false;
                        }
                        return true;
                    }
                </script>
                ');
                
            }

    

}
function carrusel($nombre,$tipo,$imagenes,$esinicio){ // CREA EL CARRUSEL DE IMAGENES
    global $direccionimagen;
    global $direccionimagen2;
    $dirreccion = "";
    if($esinicio == true){
        $dirreccion = $direccionimagen2;
    }else{
        $dirreccion = $direccionimagen;
    }
    if($imagenes->num_rows > 0){
        echo '
        <div class="filtro" id="carrusel">
        <div class="contenidotexto">
                <h1 class="texto1">'.$tipo.'</h1>
        </div>
        <div class="contenidotexto">
            <h1 class="texto2">'.$nombre.'</h1>
        </div>';
        if($imagenes->num_rows > 1){
            echo '<div class="circulos">';
            foreach($imagenes as $key => $imagen) {
                if($key == 0){
                    echo '<span class="circulo activo"></span>';
                }else{
                    echo '<span class="circulo"></span>';
                }
            }
            echo'</div>';
        }
        echo'</div>';

        echo '<div class="imagenes">';
        foreach($imagenes as $key => $imagen) {
            if($key == 0){
                echo '<div class="imagen activo" style="background-image: url('.$dirreccion."".$imagen["url"].');"></div>';
            }else{
                echo '<div class="imagen" style="background-image: url('.$dirreccion."".$imagen["url"].');"></div>';
            }
            
        }

        echo'</div>';
    }else{
        echo '<div class="imagenes">';
        echo'<h1 class=" imagen activo errorimg"></h1>';
        echo '</div><div class="filtro">
        <div class="contenidotexto">
                <h1 class="texto1">'.$tipo.'</h1>
        </div>
        <div class="contenidotexto">
            <h1 class="texto2">'.$nombre.'</h1>
        </div>';
        
    }
    if($esinicio){
        echo'<div class="logo_pba_vertical"></div> 
        <a onclick="redirigir('."'".'identificador1'."'".')" class="casita_superior botonsuperior"></a>';
    }else{
    echo'<div class="logo_pba_vertical"></div> 
    <a href="index.php" class="casita_superior botonsuperior"></a>
    <a onclick="redirigir('."'".'identificador1'."'".')" class="informacion_superior botonsuperior"></a>';
    }
}
function carrera($id,$nombre,$descripcion, $id_establecimiento,$titulo){ //CREA EL CUADRO DE LAS CARRERAS
    
    echo ('
        <form class="universidad carrera" method="GET" action="./universidad.php#carreraelegida" style="height: 45vh; overflow-y: hidden;">
            <h1 class="nombreuni" >'.$nombre.'</h1>
            <p class="descripcionuni"style="height: 20vh;">'.$descripcion.'</p>
            <input type="submit" value="SABER MAS.." class="botonuni"></button>
            <input type="hidden" name="universidad" value="'.$id_establecimiento.'" required>
            <input type="hidden" name="carrera" value="'.$id.'" required>
        </form>
    ');
}
if(isset($row)){
    $establecimientoactual = $row;
}else{
    $establecimientoactual = null;

}

function info_carrera($titulo,$descripcion, $pdf, $carrera,$establecimientos){ //MUESTRA EL PLAN DE ESTUDIO Y LA INFO DE LA CARRERA
    
global $establecimientoactual;


global $haycorreo;

    echo('
        <div class="universidad horizontal" id="carreraelegida">  
            <div class="imageninfo2" style="background-image: url(imagenes/iconos/diploma.svg);"></div>
            <div class="barrauni3"></div>
            <div class="lista5" style="gap: 0vh;">
          
            <h1 class="nombreuni">'.$titulo.'</h1>
            <p class="descripcionuni" style="height: max-content;"> '.$descripcion.'</p>
          </div>
        </div>
       ');

       if($establecimientos != null){
            if($establecimientos->num_rows > 0){

                echo '<div class="universidad" id="establecimiento"> 
                <div class="imageninfo"style="background-image: url(imagenes/iconos/ubicacion.svg);"></div>
                <div class="barrauni"></div>
        
                
                <h1 class="nombreuni">TAMBIEN SE CURSA EN</h1><p class="descripcionuni" style="height: 25dvh;">
                Podes estudiar "'.$titulo.'" en los siguientes establecimientos:<br>';
            
                foreach($establecimientos as $key => $establecimiento) {
                    if($establecimientoactual["id_establecimiento"] != $establecimiento["id_establecimiento"]){
                        echo '- <a href="./universidad.php?universidad='.$establecimiento["id_establecimiento"].'&carrera='.$carrera.'#carreraelegida2">'.$establecimiento["nombre"].'</a> <br>';
                    }

                }

                echo'</p>
                            
                    
                    </div>
                ';
            }
       }

       echo '<div class="universidad" id="plan"> 
       <div class="imageninfo"style="background-image: url(imagenes/iconos/recurso.svg);"></div>
       <div class="barrauni"></div>
       <h1 class="nombreuni">RECURSOS</h1>';
       if($pdf != null){ 
            if($pdf->num_rows > 0){
              
                    echo '<p class="descripcionuni"style="height: 10vh;">A continuación, se presenta el material detallado que guía el desarrollo académico y profesional de los estudiantes en nuestra institución.</p>';
                    echo '<div class="redesociales">';
                    foreach($pdf as $key => $pdff) {
                        if($pdff["pdf"] != null){
                            if(file_exists(arreglarpdf($pdff["pdf"]))){
                                if($pdff["tipo_recurso"] == "plan de estudio"){
                                    echo '<button class="botonuni2 pop" id="pdf-containerb">PLAN DE ESTUDIO '.($key +1).'</button>';   
                                }else{
                                    echo '<button class="botonuni2 pop" id="pdf-containerb">DISEÑO CURRICULAR '.($key +1).'</button>';   
                                }
                            }
                        }
                    }
                    echo '</div></div>';
                    foreach($pdf as $key => $pdff) {
                        if($pdff["pdf"] != null){
                            echo '<div id="pdf-container" popover class="pop2">
                            <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
                            <embed class="pdf-viewer" src="'.arreglarpdf($pdff["pdf"]).'" type="application/pdf" />
                        </div>';  
                        }    
                    }
                
                    
              
            }else{
                echo '<p class="descripcionuni">Por el momento puede solicitar el material contactandose con el establecimiento</p>';
                if($haycorreo == true){
                    echo '<a class="botonuni" onclick="redirigircentro('."'".'formulariodecontacto'."'".')">CONTACTARME</a>';
                }
               echo'</div>';
        
               }  
            
       }else{
        echo '<p class="descripcionuni">Por el momento puede solicitar el material contactandose con el establecimiento</p>';
        if($haycorreo == true){
            echo '<a class="botonuni" onclick="redirigircentro('."'".'formulariodecontacto'."'".')">CONTACTARME</a>';
        }
       echo'</div>';

       }

}
?>

