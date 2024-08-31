<!DOCTYPE html>
<html lang="en-es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloscss/styles.css">
    <title>abc</title>
</head>
<body>
    <div class="container">
        
    <!--query images-->
    <?php
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "abc";

        $conexionDatos = new mysqli($servername, $username, $password, $dbname);

        if ($conexionDatos->connect_error) {
            die("Conexión fallida: " . $conexionDatos->connect_error);
        }

        
        $queryImagenes = "SELECT url FROM imagenes WHERE 1";
        $resultDatos = $conexionDatos->query($queryImagenes);

        $imagenes = array();

        if ($resultDatos->num_rows > 0) {
            while ($row = $resultDatos->fetch_assoc()) {
                $imagenes[] = $row;
            }
        } else {
            echo "0 resultados";
        }
        $conexionDatos->close();
    ?>

    <!--query distritos-->
    <?php
        
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "abc";
        
        // Crear conexión
        $conexionDatos = new mysqli($servername, $username, $password, $dbname);
        
        // Verificar conexión
        if ($conexionDatos->connect_error) {
            die("Conexión fallida: " . $conexionDatos->connect_error);
        }
        
        // Consulta SQL para obtener los nombres de los distritos
        $queryDistritos = "SELECT * FROM distrito"; // Suponiendo que tienes una columna 'id' y 'nombre' en la tabla 'distrito'
        $resultDatos = $conexionDatos->query($queryDistritos);
        
        $distritos = array();
        
        if ($resultDatos->num_rows > 0) {
            // Recorrer todos los registros y añadirlos al array
            while ($row = $resultDatos->fetch_assoc()) {
                $distritos[] = $row;
            }
        } else {
            echo "0 resultados";
        }
        
        // Cerrar la conexión
        $conexionDatos->close();
        
    ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "abc";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Verificar si 'tipo' está definido y es válido
        if (isset($_GET['tipo']) && in_array($_GET['tipo'], ['nombre', 'distrito', 'carrera', 'tecnicatura'])) {
            $tipo = filter_var($_GET['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);
            $busqueda = $_GET[$tipo] ?? '';

            // Construir la consulta SQL según el tipo de búsqueda
            $sql = "";
            if ($tipo == 'nombre') {
                $sql = "SELECT * FROM establecimiento WHERE nombre LIKE ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $busqueda);
            } elseif ($tipo == 'distrito') {
                $sql = "SELECT * FROM establecimiento WHERE fk_distrito = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $busqueda);
            } elseif ($tipo == 'carrera') {
                $sql = "SELECT * FROM establecimiento WHERE carrera = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $busqueda);
            } elseif ($tipo == 'tecnicatura') {
                $sql = "SELECT * FROM establecimiento WHERE tecnicatura = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $busqueda);
            } else {
                die("Tipo de búsqueda no válido.");
            }

            // Ejecutar la consulta y obtener los resultados
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Mostrar los resultados
                while ($row = $result->fetch_assoc()) {
                    echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Distrito: " . $row["fk_distrito"] . "<br>";
                }
            } else {
                echo "No se encontraron resultados.";
            }

            $stmt->close();
        } else {
            echo "Tipo de búsqueda no válido.";
        }

        $conn->close();
        ?>
            <!-- Mostrar universidades -->
        <?php
            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta SQL para obtener todas las universidades
            $sql = "SELECT * FROM establecimiento";
            $result = $conn->query($sql);

            $universidades = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $universidades[] = $row;
                }
            }

            $conn->close();
        ?>


    <main class="carrusel">
            <div class="imagenes">
                <?php
                    echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagenes[0]['url']) . ')"></div>';
                    echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[1]['url']) . ')"></div>';
                    echo '<div class="imagen" style="background-image: url(' . htmlspecialchars($imagenes[2]['url']) . ')"></div>';
                ?>
            </div>
            <div class="filtro">
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
        </main>
        <header class="header"id="header">
            <a href="index.php" class="logo_pba_horizontal"></a>
            <a href="./codigophp/formulario.html" class="boton_nose_que_estudiar">No sé que estudiar <div class="circulopregunta" style="background-image: url(imagenes/iconos/pregunta.svg); background-size: 4vh;"></div></a>
        </header>
        
        <main class="main">
            <div class="botones" id="botones">
                <button class="boton " onclick="barradebusqueda('distrito')">
                    <div class="imagenboton" style="background-image: url(imagenes/iconos/ubicacion.svg);"></div>
                    <h1>Buscar por distrito</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('carrera')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/sombrero.svg);"></div>
                    <h1>Buscar por carrera o ingenieria</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('tecnicatura')"><div class="imagenboton" style=" background-image: url(imagenes/iconos/diploma.svg);"></div>
                    <h1>Buscar por terciario o tecnicatura</h1>
                </button>
                <button class="boton" onclick="barradebusqueda('nombre')">
                    <div class="imagenboton" style=" background-image: url(imagenes/iconos/nombre.svg);"></div>
                    <h1>Buscar por nombre del establecimiento</h1>
                </button>
            </div>
            <form class="barradebusqueda activo" id="nombre">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <input type="text" name="" placeholder="Nombre del establecimiento" required>
                <input type="submit" name="" value="Buscar">
            </form>
            <form class="barradebusqueda" id="distrito" method="GET" action="buscar.php">
                <img src="imagenes/iconos/lupa.svg" class="imglupa" alt="">
                <select name="distrito" id="distritos" required>
                    <option value="">Selecciona un distrito</option>
                    <?php
                    foreach ($distritos as $distrito) {
                        echo '<option value="' . htmlspecialchars($distrito['id']) . '">' . htmlspecialchars($distrito['nombre']) . '</option>';
                    }
                    ?>
                </select>
                <input type="hidden" name="tipo" value="distrito">
                <input type="submit" value="Buscar">
            </form>


            <form class="barradebusqueda" id="carrera">
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="carrera" id="carrera" required>
                    <option value="">Elija una carrera</option>
                    <option value="Ingeniería Civil">Ingeniería Civil</option>
                    <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                    <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                    <option value="Licenciatura en Administración de Empresas">Licenciatura en Administración de Empresas</option>
                    <option value="Licenciatura en Psicología">Licenciatura en Psicología</option>
                </select>
                <input type="submit" value="Buscar">
            </form>

            <form class="barradebusqueda" id="tecnicatura">
                <img src="imagenes/iconos/lupa.svg" alt="">
                <select name="tecnicatura" id="tecnicatura" required>
                    <option value="">Elija una tecnicatura</option>
                    <option value="Técnico en Informática">Técnico en Informática</option>
                    <option value="Técnico en Gestión Ambiental">Técnico en Gestión Ambiental</option>
                    <option value="Técnico en Administración de Empresas">Técnico en Administración de Empresas</option>
                    <option value="Técnico en Enfermería">Técnico en Enfermería</option>
                    <option value="Técnico en Mecánica Automotriz">Técnico en Mecánica Automotriz</option>
                </select>
                <input type="submit" value="Buscar">
            </form>

            <div class="universidades">
                <?php
                    foreach ($universidades as $universidad) {
                        echo '<div class="universidad"> 
                                <div class="imagenesuni">';
                        foreach ($imagenes as $imagen) {
                            echo '<div class="imagen activo" style="background-image: url(' . htmlspecialchars($imagen['url']) . ')"></div>';
                        }
                        echo '    <div class="circulos">
                                    <span class="circulo2 activo"></span>
                                    <span class="circulo2"></span>
                                    <span class="circulo2"></span>
                                </div>
                            </div>
                            <div class="texto">
                                <h1>' . htmlspecialchars($universidad['nombre']) . '</h1>
                                <p>' . htmlspecialchars($universidad['descripcion']) . '</p>
                            </div>
                        </div>';
                    }
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
<script src="./codigojs/carrusel.js"></script>
<script src="./codigojs/redirigir.js"></script>
<script src="./codigojs/botonesbarra.js"></script>
<script src="./codigojs/scroll.js"></script>
<script src="./codigojs/scroll.js"></script>
<?php
    include 'conexion.php';

    $sql = "SELECT id, nombre, email FROM usuarios";
    $result = $conn->query($sql);
?>