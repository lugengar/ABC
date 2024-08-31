<!DOCTYPE html>
<html lang="en-es">
<head>
<?php
        include "./codigophp/mostrar_universidad.php";
        include "claves.php";
        include "./codigophp/construccion.php";
        $tipo = "nombre";
        if(isset($_GET["tipo"])){
            if(isset($_GET["tipo"])){
                $tipo = $_GET["tipo"];
            }
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloscss/universidad.css">
    <link rel="icon" href="https://abc.gob.ar/core/themes/abc/favicon.ico" type="image/vnd.microsoft.icon">
    <?php 
    echo '<title>'.$row["nombre_universidad"].'</title>';
    echo '<meta name="description" content="Ofertas de Educación Superior Región 6, '.$row["nombre_universidad"].'">';
    ?>
   

</head>
<body>
    
        <div class="overlay" id="overlay"></div>

    <div class="container" id="container">
        <main class="carrusel">
            <?php
                carrusel($row["nombre_universidad"], $row["tipo_establecimiento"], $imagenes);
            ?>
        </main>
        <header class="header" id="header">
            <a href="index.php" class="logo_pba_horizontal " ></a>
            <a href="index.php" class="boton_nose_que_estudiar">Inicio<div class="circulopregunta" style="background-image: url(imagenes/iconos/casa.svg); background-size: 4vh;"></div></a>
        </header>
        <main class="main">
        <div class="informacion lista3" style="padding-top: 5vh;">
            <?php
            //MUESTRA TODA LA INFO DE LA UNIVERSIDAD
            info_universidad($row["descripcion"],$row["ubicacion"],$row["servicios"],$row["nombre_distrito"],$row["nombre_universidad"],$contactos,$row["id_establecimiento"]);
            
            ?>
            <?php
            //MUESTRA LOS PLANES DE ESTUDIO DE LA CARRERA
                require "./codigophp/mostrarplandeestudio.php";
            ?>
            </div>
            <div class="botones" id="botones" style="padding-top:0vh;" >
  
                <button class="boton" onclick="barradebusqueda('carrera')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/sombrero.svg);"></div>
                    <h1>Buscar por nombre de Carrera</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('tecnicatura')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/diploma.svg);"></div>
                    <h1>Buscar por nombre de Tecnicatura</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('nombre')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/nombre.svg);"></div>
                    <h1>Buscar por nombre de manera general</h1>
                </button>
            </div>
            <form class="barradebusqueda <?php if($tipo == "nombre"){echo 'activo';} ?>" id="nombre" method="GET" action="./universidad.php#identificador2">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <input type="text" name="busqueda" placeholder="Nombre de la carrera/tecnicatura" required>
                <?php echo '<input type="hidden" name="universidad" value="'.$row["id_establecimiento"].'" required>';?>
                <input type="hidden" name="tipo" value="nombre" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda <?php if($tipo == "tecnicatura"){echo 'activo';} ?>" id="tecnicatura" method="GET" action="./universidad.php#identificador2">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <?php echo '<input type="hidden" name="universidad" value="'.$row["id_establecimiento"].'" required>';?>
                <input type="hidden" name="tipo" value="tecnicatura" required>
                <input type="text"name="busqueda" placeholder="Nombre de la tecnicatura" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda <?php if($tipo == "carrera"){echo 'activo';} ?>" id="carrera" method="GET" action="./universidad.php#identificador2">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <?php echo '<input type="hidden" name="universidad" value="'.$row["id_establecimiento"].'" required>';?>
                <input type="hidden" name="tipo" value="carrera" required>
                <input type="text" name="busqueda" placeholder="Nombre de la carrera" required>
                <input type="submit" name="" value="Buscar">
            </form>

            <div class="universidades lista" style="position:relative;">
            <div class="identificador" id="identificador2" style="top: -20vh;"></div>

            <?php
            //MUESTRA TODAS LAS CARRERAS DE LA UNIVERSIDAD
                require "./codigophp/mostrarcarreras.php";
            ?>
            <p class='error' style="display:none;" >No se encontraron resultados</p>
            </div>
             <div class="barradebusqueda volverarriba">
                <img src="imagenes/iconos/flecha.svg" alt="">
                <button onclick="redirigir('botones')" >Volver arriba</button>
            </div>
        </main>
       
        <footer class="footer">
            <div class="imagenfooter"></div>
            <div class="logo_pba_vertical2"></div>

            <div class="logodte"></div>
            <div class="textofooter">
                <h1>&copy; 2024 Escuela Secundaria Técnica N1 Vicente Lopez. Todos los derechos reservados.</h1>
            </div>
            <div class="redesociales">
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-youtube_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-instagram_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-twitter_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-facebook_0.svg);"></a>
                <a href="" class="redsocial" style="background-image: url(https://abc.gob.ar/sites/default/files/2021-03/icon-flicr_0.svg);"></a>
            </div>
        </footer>
        
    </div>
</body>
</html>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="codigojs/carrusel.js"></script>
<script src="codigojs/botonesbarra.js"></script>
<script src="codigojs/redirigir.js"></script>
<script src="codigojs/confetti.js"></script>
<script src="codigojs/scroll.js"></script>
<script src="codigojs/ventanas.js"></script>
        