<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Modificación de Datos</title>
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
        $tipo_contacto_result = mysqli_query($conn, "SELECT * FROM contacto");
        $imagenes_result = mysqli_query($conn, "SELECT * FROM imagenes");
        $recursos_result = mysqli_query($conn, "SELECT * FROM recursos");

        $recursos = mysqli_fetch_all($recursos_result, MYSQLI_ASSOC);
        $distritos = mysqli_fetch_all($distritos_result, MYSQLI_ASSOC);
        $establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);
        $carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
        $tipos_contacto = mysqli_fetch_all($tipo_contacto_result, MYSQLI_ASSOC);
        $imagenes = mysqli_fetch_all($imagenes_result, MYSQLI_ASSOC);
    ?>

    <div class="form-container">
        <h2>Formulario de Modificación de Datos</h2>
        <form action="prossmodificar.php" method="post" id="dataForm" enctype="multipart/form-data">
            <label for="tabla">Seleccionar tabla:</label>
            <select id="tabla" name="tabla" onchange="mostrarCampos()" required>
                <option value="">--Selecciona una tabla--</option>
                <option value="carrera">Carrera</option>
                <option value="contacto">Contacto</option>
                <option value="establecimiento">Establecimiento</option>
                <option value="carrusel">Carrusel</option>
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

            var html = '';
            switch (tabla) {
                case "establecimiento":
                    html = `
                        <label for="id_establecimiento">Establecimiento a modificar:</label>
                        <select id="id_establecimiento" name="id_establecimiento" onchange="cargarDatos('establecimiento')" required>
                            <option value="">--Selecciona un establecimiento--</option>

                            <?php foreach ($establecimientos as $row) { ?>
                                <option value="<?php echo htmlspecialchars($row['id_establecimiento']); ?>">
                                
                                    <?php echo htmlspecialchars($row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="establecimientoFields"></div>
                    `;
                    break;
                case "carrusel":
                    html = `
                        <label for="id_carrusel">Carrusel a modificar:</label>
                        <select id="id_carrusel" name="id_establecimiento" onchange="cargarDatos('carrusel')" required>
                            <option value="">--Selecciona un carrusel--</option>
                            <option value="0">Carrusel del inicio</option>
                        </select>
                        <div id="carruselFields"></div>
                    `;
                    break;
                case "carrera":
                    html = `
                        <label for="id_carrera">Carrera a modificar:</label>
                        <select id="id_carrera" name="id_carrera" onchange="cargarDatos('carrera')" required>
                            <option value="">--Selecciona una carrera--</option>
                            <?php foreach ($carreras as $row) { ?>
                                <option value="<?php echo htmlspecialchars($row['id_carrera']); ?>">
                                    <?php echo htmlspecialchars($row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="carreraFields"></div>
                    `;
                    break;

                case "contacto":
                    html = `
                        <label for="id_contacto">Contacto a modificar:</label>
                        <select id="id_contacto" name="id_contacto" onchange="cargarDatos('contacto')" required>
                            <option value="">--Selecciona un contacto--</option>
                            <?php foreach ($tipos_contacto as $row) { ?>
                                <option value="<?php echo htmlspecialchars($row['id_contacto']); ?>">
                                    <?php echo htmlspecialchars($row['tipo']); ?> -  <?php echo htmlspecialchars($row['contacto']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="contactoFields"></div>
                    `;
                    break;

                case "recursos":
                    html = `
                        <label for="id_recursos">ID recurso:</label>
                        <select id="id_recursos" name="id_recurso" onchange="cargarDatos('recursos')" required>
                            <option value="">--Selecciona un recurso--</option>
                            <?php foreach ($recursos as $row) { ?>
                                <option value="<?php echo htmlspecialchars($row['id_recurso']); ?>">
                                    <?php echo htmlspecialchars($row['tipo_recurso'] . " - " . $row['pdf']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="recursosFields"></div>
                    `;
                    break;

                case "imagenes":
                    html = `
                        <label for="id_imagenes">ID Imagen:</label>
                        <select id="id_imagenes" name="id_imagen" required onchange="cargarDatos('imagenes')">
                            <option value="">--Selecciona una imagen--</option>
                            <?php foreach ($imagenes as $row) { ?>
                                <option value="<?php echo htmlspecialchars($row['id_imagen']); ?>">
                                    <?php echo htmlspecialchars($row['id_imagen'] . " - " . $row['url']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="imagenesFields"></div>
                    `;
                    break;

                case "distrito":
                    html = `
                        <label for="id_distrito">ID Distrito:</label>
                        <select id="id_distrito" name="id_distrito" required onchange="cargarDatos('distrito')">
                            <option value="">--Selecciona un distrito--</option>
                            <?php foreach ($distritos as $row) { ?>
                                <option value="<?php echo htmlspecialchars($row['id_distrito']); ?>">
                                    <?php echo htmlspecialchars($row['id_distrito'] . " - " . $row['nombre']); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="distritoFields"></div>
                    `;
                    break;

                default:
                    html = '<p>Por favor, selecciona una tabla.</p>';
            }


            formFields.innerHTML = html;
           
            tablasino = "<?php if(isset($_GET["tabla"])){echo "true";}else{echo "false";} ?>"
            if (tablasino != "false") {
                tabla =  <?php if(isset($_GET["tabla"])){echo '"'.$_GET["tabla"].'"';}else{echo "null";} ?>;
                id1 = "<?php if(isset($_GET["id"])){echo $_GET["id"];}else{echo"null";} ?>" 
                id2 ="<?php if(isset($_GET["id2"])){echo $_GET["id2"];}else{echo"null";} ?>" 
                id3 ="<?php if(isset($_GET["id3"])){echo $_GET["id3"];}else{echo"null";} ?>" 
                if (tabla == "contacto") {
                    document.getElementById("id_contacto").value = id1;
                }else if (tabla == "recursos") {
                    document.getElementById("id_recurso").value = id1;
                }else if (tabla == "establecimiento") {
                    document.getElementById("id_establecimiento").value = id1;
                }else if (tabla == "imagenes") {
                    document.getElementById("id_imagenes").value = id1;
                }else if (tabla == "distrito") {
                    document.getElementById("id_distrito").value = id1;
                }
                cargarDatos(tabla)
            }
           
        }

      
        function cargarDatos(tabla) {
           var idElemento = document.getElementById("id_" + tabla).value;
            var fieldsContainer = document.getElementById(tabla + "Fields");

            if (idElemento) {
                // Realizar una solicitud AJAX para obtener los datos del elemento seleccionado
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "obtenerdatos.php?tipo="+tabla+"&id=" + idElemento, true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Insertar los campos con los datos actuales para ser modificados
                        fieldsContainer.innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                fieldsContainer.innerHTML = '';
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
