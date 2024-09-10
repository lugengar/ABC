<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloscss/styles.css">
    <!-- <link rel="stylesheet" href="estiloscss/mapa.css"> -->
    <link rel="icon" href="https://abc.gob.ar/core/themes/abc/favicon.ico" type="image/vnd.microsoft.icon">
    <title>Ofertas de Educación Superior Región 6</title>
    <meta name="description" content="Ofertas de Educación Superior Región 6">
</head>
<body>
    <?php
    $row = null;
        include "./codigophp/buscar_universidades.php";
        $tipo = "nombre";
        $haytipo = false;
       
        if(isset($_GET["tipo"])){
            if(isset($_GET["tipo"])){
                $tipo = $_GET["tipo"];
                if($tipo == "nombre" || $tipo == "carrera" || $tipo == "establecimiento" || $tipo == "distrito"){
                    $haytipo = true;
                }
            }
        }
    ?>
        <div class="overlay" id="overlay"></div>
    
    <div class="container">
        <main class="carrusel" >
            <div class="imagenes">
                <div class="imagen activo"  style="background-image: url('imagenes/otros/estudiantes.jpg');"></div>
                <div class="imagen" style="background-image: url('imagenes/otros/gente.jpg');"></div>
                <div class="imagen" style="background-image: url('imagenes/otros/graduados.jpg');"></div>
               
            </div>
            <div class="filtro" id="carrusel">
                <div class="contenidotexto">
                    <h1 class="texto1">Ofertas de Educación Superior Región 6</h1>
                    
                </div>
                <div class="contenidotexto">
                    <h1 class="texto2">Ahora es más fácil encontrar la universidad adecuada.</h1>
                </div>
                <div class="circulos">
                    <span class="circulo activo"></span>
                    <span class="circulo"></span>
                    <span class="circulo"></span>
                </div>
            </div>
            <div class="logo_pba_vertical"></div>
            <a onclick="redirigir('identificador1')" class="casita_superior"></a>
        </main>
        <header class="header" id="header">
            <a href="index.php" class="logo_pba_horizontal " ></a>
        </header>
        <main class="main">



            <!-- MAPA -->
            <div popover class="pop2">
                <h1>HAGA CLIC FUERA DEL CUADRO PARA SALIR</h1>
                <!-- ACA VA EL DIV O LO Q SEA DEL MAPA. EL TAMAÑO SE AJUSTA AUTOMATICAMENTE
                <div id="mapa">
                    <p></p>
                    <img id="imagenmapa" src="./imagenes/otros/mapa2.svg" alt="">
                    <a href="./universidad.php?universidad=1" class="puntero" onclick="redirigirEstablecimiento(1)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=2" class="puntero2" onclick="redirigirEstablecimiento(2)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=3" class="puntero3" onclick="redirigirEstablecimiento(3)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=4" class="puntero4" onclick="redirigirEstablecimiento(4)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=5" class="puntero5" onclick="redirigirEstablecimiento(5)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=6" class="puntero6" onclick="redirigirEstablecimiento(6)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=7" class="puntero7" onclick="redirigirEstablecimiento(7)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=8" class="puntero8" onclick="redirigirEstablecimiento(8)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=9" class="puntero9" onclick="redirigirEstablecimiento(9)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=10" class="puntero10" onclick="redirigirEstablecimiento(10)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=11" class="puntero11" onclick="redirigirEstablecimiento(11)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=12" class="puntero12" onclick="redirigirEstablecimiento(12)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=13" class="puntero13" onclick="redirigirEstablecimiento(13)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <a href="./universidad.php?universidad=14" class="puntero14" onclick="redirigirEstablecimiento(14)"><img src="./imagenes/otros/puntero.svg" alt="Puntero"></a>
                    <style>
                        .contenedor_mapa{
                            width: max-content;
                            position: relative;
                            height: 100%;
                            overflow-x: auto;
                        }
                        /* escobar */
                        .puntero img{
                            position: absolute;
                            top: 150px; left: 450px;
                            width: ;
                        }
                        /* tigre */
                        .puntero2 img{
                            position: absolute;
                            top: 400px; left: 600px;
                        }
                        .puntero3 img{
                            position: absolute;
                            top: 290px; left: 840px;
                        }
                        .puntero4 img{
                            position: absolute;
                            top:230px; left: 660px;
                        }
                        /* vicente lopez */
                        .puntero5 img{
                            position: absolute;
                            top: 690px; left: 900px;
                            width: 35px;
                        }
                        .puntero6 img{
                            position: absolute;
                            top: 650px; left: 860px;
                            width: 35px;
                        }
                        .puntero7 img{
                            position: absolute;
                            top: 590px; left: 950px;
                            width: 35px;
                        }
                        .puntero8 img{
                            position: absolute;
                            top: 637px; left: 920px;
                            width: 35px;
                        }
                        .puntero9 img{
                            position: absolute;
                            top: 646px; left: 973px;
                            width: 35px;
                        }
                        /* sanisidro */
                        .puntero10 img{
                            position: absolute;
                            top: 530px; left: 920px;
                            width: 35px;
                        }
                        .puntero11 img{
                            position: absolute;
                            top: 615px; left: 835px;
                            width: 35px;
                        }
                        .puntero12 img{
                            position: absolute;
                            top: 525px; left: 850px;
                            width: 35px;
                        }
                        /* san fernando */
                        .puntero13 img{
                            position: absolute;
                            top: 525px; left: 760px;
                            width: 35px;
                        }
                        .puntero14 img{
                            position: absolute;
                            top: 410px; left: 870px;
                            width: 35px;
                        }
                    </style>
                </div>-->
              <iframe src="codigophp/mapa2.php" loading="lazy" frameborder="0"></iframe>

            </div>

            <div class="identificador" id="identificador1" style="top: 100vh;"></div>
            <div class="botones" id="botones">
                <button class="boton pop" >
                    <div class="imagenboton" style="background-image: url(imagenes/iconos/ubicacion.svg);"></div>
                    <h1>Buscar universidad en el mapa</h1>
                </button>

                <!-- MAPA 

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
                    <h1>Filtrar establecimiento por carrera</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('nombre')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/letrasabc.svg);"></div>
                    <h1>Buscar por nombre del establecimiento</h1>
                </button>
            </div>
            <form class="barradebusqueda <?php if($tipo == "nombre" || $haytipo == false){echo 'activo';} ?>" id="nombre" method="GET" action="./index.php#identificador2">
               <p class="barratexto">Nombre del establecimiento</p>
            <div style="gap:2vh;">
                <input type="text" name="busqueda" placeholder="Nombre" required>
                <input type="hidden" name="tipo" value="nombre" required>
                <input type="submit" value="Buscar">
                </div>
            </form>
            <form class="barradebusqueda <?php if($tipo == "distrito"){echo 'activo';} ?>" id="distrito" method="GET" action="./index.php#identificador2">
            
            <p class="barratexto">Elija un distrito</p>
            <div style="gap:2vh;">
                <select name="busqueda"id="" required>
                    <option value="">Ninguno</option >
                    <?php
                    //ESCRIBE LAS OPCIONES PARA LA BARRA DE BUSQUEDA
                        buscardistritos();
                    ?>
                </select>
                <input type="hidden" name="tipo" value="distrito" required>
                <input type="submit" name="" value="Buscar" >
                </div>
            </form>
            <form class="barradebusqueda <?php if($tipo == "establecimiento"){echo 'activo';} ?>" id="establecimiento" method="GET" action="./index.php#identificador2">
            <p class="barratexto">Elija un tipo de establecimiento</p>
            <div style="gap:2vh;">
            <select name="busqueda" id="" required>
                    <option value="">Ninguno</option>
                    <?php
                        //ESCRIBE LAS OPCIONES PARA LA BARRA DE BUSQUEDA
                        buscarestablecimientos();
                    ?>
                </select>
            
                <input type="hidden" name="tipo" value="establecimiento" required>
                <input type="submit" name="" value="Buscar">
                </div>
            </form>
            <form class="barradebusqueda <?php if($tipo == "carrera"){echo 'activo';} ?>" id="carrera" method="GET" action="./index.php#identificador2">
            <p class="barratexto">Elija una carrera</p>
            <div style="gap:2vh;">
                <select name="busqueda" id="" required>
                    <option value="">Ninguno</option>
                    <?php
                        //ESCRIBE LAS OPCIONES PARA LA BARRA DE BUSQUEDA
                        buscarcarreras();
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

