<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloscss/styles.css">
        <?php include "./claves.php";include "./codigophp/verificacion.php"; animaciones();?>
   
   
    <link rel="icon" href="https://abc.gob.ar/core/themes/abc/favicon.ico" type="image/vnd.microsoft.icon">
    <title>Ofertas de Educación Superior Región 6</title>
    <meta name="description" content="Ofertas de Educación Superior Región 6">
</head>
<body>
    <?php

        
        mostrarocultos();
        //INSERTA EN EL CODIGO EL CODIGO PARA MOSTRAR LOS RESULTADOS DE LA BARRA DE BUSQUEDA
        include "./codigophp/buscar_universidades.php";

        //LA BARRA DE BUSQUEDA PREDETERMINADA ES LA DE NOMBRE
        $tipo = "nombre";
        //EVITA QUE PUEDAN INSERTAR OTRO TIPO DE BARRA QUE NO EXISTE
        $haytipo = false;

        //VARIABLES PARA SABER QUE TIPO DE BARRA DEBE MOSTRARSE SEGUN LA BARRA UTILIZADA ANTERIORMENTE
        if(isset($_GET["tipo"])){
            if(isset($_GET["tipo"])){
                $tipo = $_GET["tipo"];
                if($tipo == "nombre" || $tipo == "carrera" || $tipo == "establecimiento" || $tipo == "distrito"){
                    $haytipo = true;
                }
            }
        }
    ?>
    <!-- FONDO INVISIBLE QUE SE ENCARGA DE QUE NO SE PUEDA DAR CLICK AL FONDO CUANDO ABRIMOS POR EJEMPLO LA VENTADA DEL MAPA -->
    <div class="overlay" id="overlay"></div>
    
    <div class="container">
        <main class="carrusel" >
            <?php
            //FUNCION QUE OBTIENE LOS DATOS QUE DEBERIAN IR EN EL INICIO Y MUESTRA EL CARRUSEL
                carruselinicio();
            ?>
        </main>
        <header class="header" id="header">
            <a href="index.php" class="logo_pba_horizontal " ></a>
            <?php
            if(isset($_SESSION["id_usuario"])){
            echo '    <a href="cargardatos/index.php" class="boton_nose_que_estudiar">Panel<div class="circulopregunta" style="background-image: url(imagenes/iconos/candado_desbloqueado.svg); background-size: 2.5vh;"></div></a>';
            }
            ?>
        </header>
        <main class="main">



     
            <div popover class="pop2">
                <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
              
              <iframe src="codigophp/mapa.php" loading="lazy" frameborder="0"></iframe>

            </div>

            <div class="identificador" id="identificador1" style="top: 100vh;"></div>
            <div class="botones" id="botones">
                <button class="boton pop" >
                    <div class="imagenboton" style="background-image: url(imagenes/iconos/ubicacion.svg);"></div>
                    <h1>Buscar establecimiento en el mapa</h1>
                </button>

                <!-- BOTON BUSCAR POR DISTRITO 

                <button class="boton" onclick="barradebusqueda('distrito')">
                    <div class="imagenboton" style="background-image: url(imagenes/iconos/ubicacion.svg);"></div>
                    <h1>Buscar universidad por distrito</h1>
                </button>
 -->

                <button class="boton" onclick="barradebusqueda('establecimiento')">
                    <div class="imagenboton" id="tipoestablecimiento" style=" background-image: url(imagenes/iconos/tipoestable.svg);"></div>
                    <h1>Filtrar por tipo de establecimiento</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('carrera')"><div class="imagenboton" style=" background-image: url(imagenes/iconos/sombrero.svg);"></div>
                    <h1>Filtrado por tipo de carrera</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('nombre')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/letrasabc.svg);"></div>
                    <h1>Buscar por nombre del establecimiento</h1>
                </button>
            </div>
            <form class="barradebusqueda <?php if($tipo == "nombre" || $haytipo == false){echo 'activo';} ?>" id="nombre" method="GET" action="./index.php#identificador2">
               <p class="barratexto">Nombre del establecimiento <img src="imagenes/iconos/lupa.svg" class="imglupa" alt=""></p>
            <div style="gap:2vh;">
                <input type="text" name="busqueda" maxlength ="35" placeholder="Nombre" required>
                <input type="hidden" name="tipo"  value="nombre" required>
                <input type="submit" value="Buscar">
                </div>
            </form>
            <form class="barradebusqueda <?php if($tipo == "distrito"){echo 'activo';} ?>" id="distrito" method="GET" action="./index.php#identificador2">
            
            <p class="barratexto">Elija un distrito <img src="imagenes/iconos/lupa.svg" class="imglupa" alt=""></p>
            <div style="gap:2vh;">
                <select name="busqueda"id="" required>
                    <option value="">Ninguno</option >
                    <?php
                        //ESCRIBE LOS DISTRITOS PARA LA BARRA DE BUSQUEDA
                        buscardistritos();
                    ?>
                </select>
                <input type="hidden" name="tipo" value="distrito" required>
                <input type="submit" name="" value="Buscar" >
                </div>
            </form>
            <form class="barradebusqueda <?php if($tipo == "establecimiento"){echo 'activo';} ?>" id="establecimiento" method="GET" action="./index.php#identificador2">
            <p class="barratexto">Elija un tipo de establecimiento <img src="imagenes/iconos/lupa.svg" class="imglupa" alt=""></p>
            <div style="gap:2vh;">
            <select name="busqueda" id="" required>
                    <option value="">Ninguno</option>
                    <?php
                        //ESCRIBE LOS TIPO DE ESTABLECIMIENTOS PARA LA BARRA DE BUSQUEDA
                        buscarestablecimientos();
                    ?>
                </select>
            
                <input type="hidden" name="tipo" value="establecimiento" required>
                <input type="submit" name="" value="Buscar">
                </div>
            </form>
            <form class="barradebusqueda <?php if($tipo == "carrera"){echo 'activo';} ?>" id="carrera" method="GET" action="./index.php#identificador2">
            <p class="barratexto">Elija una carrera <img src="imagenes/iconos/lupa.svg" class="imglupa" alt=""></p>
            <div style="gap:2vh;">
                <select name="busqueda" id="" required>
                    <option value="">Ninguno</option>
                    <?php
                        //ESCRIBE LAS CARRERAS PARA LA BARRA DE BUSQUEDA
                        buscartipocarrera();
                    ?>
                </select>
                <input type="hidden" name="tipo" value="carrera" required>
                <input type="submit" name="" value="Buscar">
                </div>
            </form>
            <div class="universidades" id="uni" style="padding-top:0vh; position:relative;">
            <div class="identificador" id="identificador2" style="top: -20vh;"></div>
                <?php
                    etiqueta();
                    //MUESTRA TODAS LAS UNIVERSIDADES O LOS RESULTADOS DE LAS BUSQUEDAS
                    buscar();
                ?>
            </div>
            <div class="barradebusqueda volverarriba">
                <img src="imagenes/iconos/flecha.svg" alt="" class="flecha">
                <button onclick="redirigircentro('botones')" >Volver arriba</button>
            </div>
        </main>

        <footer class="footer">
            <div class="imagenfooter"></div>
            <div class="logo_pba_vertical2"></div>
            <div class="logodte"></div>

            <div class="textofooter">
                <h1>&copy; 2024 Escuela Secundaria Técnica N°1 Vicente López. Todos los derechos reservados.</h1>
            </div>
            <div class="redesociales">
      
            </div>
        </footer>
    </div>
</body>
</html>
<script src="codigojs/carrusel.js"></script>
<script src="codigojs/redirigir.js"></script>
<script src="codigojs/ventanas.js"></script>
<script src="codigojs/botonesbarra.js"></script>
<script src="codigojs/scroll.js"></script>

