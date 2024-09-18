<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Agregar Datos</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <?php
        include "../codigophp/conexionbs.php";
        include "../claves.php";
        include "../codigophp/verificacion.php";
        esadmin();

        $distritos_result = mysqli_query($conn, "SELECT * FROM distrito");
        $establecimientos_result = mysqli_query($conn, "SELECT * FROM establecimiento WHERE id_establecimiento != 0");
        $carrera_result = mysqli_query($conn, "SELECT * FROM carrera");
        $tipo_contacto_result = mysqli_query($conn, "SELECT DISTINCT tipo FROM contacto");

        $distritos = mysqli_fetch_all($distritos_result, MYSQLI_ASSOC);
        $establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);
        $carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
        $tipos_contacto = mysqli_fetch_all($tipo_contacto_result, MYSQLI_ASSOC);
    ?>

    <div class="form-container">
        <h2>Formulario de Agregar Datos</h2>
        <form action="prossagregar.php" method="post" id="dataForm" enctype="multipart/form-data">
            <label for="tabla">Seleccionar tabla:</label>
            <select id="tabla" name="tabla" onchange="mostrarCampos()" required>
                <option value="carrera">Carrera</option>
                <option value="contacto">Contacto</option>
                <option value="establecimiento">Establecimiento</option>
                <option value="recursos">Recursos</option>
                <option value="imagenes">Imágenes</option>
                <option value="distrito">Distritos</option>
            </select>

            <div id="formFields"></div>

            <input type="submit" value="Enviar">
        </form>
    </div>

    <script>
        function mostrarCampos() {
            var tabla = document.getElementById("tabla").value;
            var formFields = document.getElementById("formFields");

            formFields.innerHTML = ''; 

            if (tabla === "carrera") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>
                    <label for="tipo_carrera">Tipo de Carrera:</label>
                    <select id="tipo_carrera" name="tipo_carrera" required>
                        <option value="Tecnicatura">Técnica</option>
                        <option value="Profesorado">Profesorado</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Ingeniería">Ingeniería</option>
                        <option value="Otro">Otro</option>
                    </select>
                `;
            } else if (tabla === "contacto") {
                formFields.innerHTML = `
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="">--Selecciona un tipo--</option>
                        <?php foreach ($tipos_contacto as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['tipo']); ?>">
                                <?php echo htmlspecialchars($row['tipo']); ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="contacto">Contacto:</label>
                    <input type="text" id="contacto" name="contacto" required>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['id_establecimiento']); ?>">
                                <?php echo htmlspecialchars($row['id_establecimiento'] . " - " . $row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "establecimiento") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" required>
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
                    <select id="tipo_establecimiento" name="tipo_establecimiento" required>
                        <option value="Universidad">Universidad</option>
                        <option value="Instituto">Instituto</option>
                        <option value="Centro Universitario">Centro Universitario</option>
                        <option value="Polo Educativo">Polo Educativo</option>
                    </select>
                    <label for="servicios">Servicios:</label>
                    <input type="text" id="servicios" name="servicios" required>
                    <label for="fk_distrito">Distrito:</label>
                    <select id="fk_distrito" name="fk_distrito" required>
                        <option value="">--Selecciona un distrito--</option>
                        <?php foreach ($distritos as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['id_distrito']); ?>">
                                <?php echo htmlspecialchars($row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="habilitado">Habilitado:</label>
                    <input type="checkbox" id="habilitado" name="habilitado" value="1">
                `;
            } else if (tabla === "recursos") {
                formFields.innerHTML = `
                    <label for="pdf">PDF Plan de Estudio o Diseño Curricular:</label>
                    <input type="file" id="pdf" name="pdf" accept="application/pdf">
                    <label for="fk_carrera">Carrera:</label>
                    <select id="fk_carrera" name="fk_carrera" required>
                        <option value="">--Selecciona una carrera--</option>
                        <?php foreach ($carreras as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['id_carrera']); ?>">
                                <?php echo htmlspecialchars($row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="fk_establecimiento">Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['id_establecimiento']); ?>">
                                <?php echo htmlspecialchars($row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="tipo_recurso">Tipo de Recurso:</label>
                    <select id="tipo_recurso" name="tipo_recurso" required>
                        <option value="">--Selecciona un tipo de recurso--</option>
                        <option value="plan de estudio">Plan de Estudio</option>
                        <option value="diseño curricular">Diseño Curricular</option>
                    </select>
                `;
            } else if (tabla === "imagenes") {
                formFields.innerHTML = `
                    <label for="imagen">Imagen (JPG):</label>
                    <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg" required>
                    <label for="fk_establecimiento">Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <option value="0"> 
                            Carrusel del inicio
                        </option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['id_establecimiento']); ?>">
                                <?php echo htmlspecialchars($row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "distrito") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre del Distrito:</label>
                    <input type="text" id="nombre" name="nombre" required>
                `;
            }
        
            tablasino = "<?php if(isset($_GET["tabla"])){echo "true";}else{echo "false";} ?>"
            if (tablasino != "false") {
                tabla =  <?php if(isset($_GET["tabla"])){echo '"'.$_GET["tabla"].'"';}else{echo "null";} ?>;
                id1 = "<?php if(isset($_GET["id"])){echo $_GET["id"];}else{echo"null";} ?>" 
                id2 ="<?php if(isset($_GET["id2"])){echo $_GET["id2"];}else{echo"null";} ?>" 
                id3 ="<?php if(isset($_GET["id3"])){echo $_GET["id3"];}else{echo"null";} ?>" 
                if (tabla == "contacto") {
                    document.getElementById("fk_establecimiento").value = id1;
                }else if (tabla == "recursos") {
                    document.getElementById("fk_establecimiento").value = id1;
                    document.getElementById("fk_carrera").value = id2;
                }else if (tabla == "imagenes") {
                    document.getElementById("fk_establecimiento").value = id1;
                }
            }
           
        }

        window.onload = function() {
            var tablaSeleccionada = document.getElementById("tabla").value;
            if (tablaSeleccionada) {
                mostrarCampos();
            }
        };
        <?php
         if(isset($_GET["tabla"])){
            echo 'document.getElementById("tabla").value = "'.$_GET["tabla"].'"';
        }
        ?>
    </script>
</body>
</html>
