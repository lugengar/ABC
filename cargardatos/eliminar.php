<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Eliminación de Datos</title>
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
        $imagenes_result = mysqli_query($conn, "SELECT * FROM imagenes");
        $contacto_result = mysqli_query($conn, "SELECT * FROM contacto");
        $recursos_result = mysqli_query($conn, "SELECT * FROM recursos");

        $distritos = mysqli_fetch_all($distritos_result, MYSQLI_ASSOC);
        $establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);
        $carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
        $imagenes = mysqli_fetch_all($imagenes_result, MYSQLI_ASSOC);
        $contactos = mysqli_fetch_all($contacto_result, MYSQLI_ASSOC);
        $recursos = mysqli_fetch_all($recursos_result, MYSQLI_ASSOC);
    ?>

    <div class="form-container">
        <h2>Formulario de Eliminación de Datos</h2>
        <form action="prosseliminar.php" method="post" id="deleteForm">
            <label for="tabla">Seleccionar tabla:</label>
            <select id="tabla" name="tabla" onchange="mostrarCampos()" required>
                <option value="carrera">Carrera</option>
                <option value="contacto">Contacto</option>
                <option value="establecimiento">Establecimiento</option>
                <option value="imagenes">Imágenes</option>
                <option value="recursos">Recurso</option>
            </select>

            <div id="formFields"></div>

            <input type="submit" value="Eliminar">
        </form>
    </div>

    <script>
        function mostrarCampos() {
            var tabla = document.getElementById("tabla").value;
            var formFields = document.getElementById("formFields");

            formFields.innerHTML = '';

            if (tabla === "carrera") {
                formFields.innerHTML = `
                    <label for="id_carrera">Selecciona una carrera:</label>
                    <select id="id_carrera" name="id_carrera" required>
                        <option value="">--Selecciona una carrera--</option>
                        <?php foreach ($carreras as $row) { ?>
                            <option value="<?php echo $row['id_carrera']; ?>">
                                <?php echo $row['id_carrera'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "contacto") {
                formFields.innerHTML = `
                    <label for="id_contacto">Selecciona un contacto:</label>
                    <select id="id_contacto" name="id_contacto" required>
                        <option value="">--Selecciona un contacto--</option>
                        <?php foreach ($contactos as $row) { ?>
                            <option value="<?php echo $row['id_contacto']; ?>">
                                <?php echo $row['id_contacto'] . " - " . $row['descripcion']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "establecimiento") {
                formFields.innerHTML = `
                    <label for="id_establecimiento">Selecciona un establecimiento:</label>
                    <select id="id_establecimiento" name="id_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo $row['id_establecimiento']; ?>">
                                <?php echo $row['id_establecimiento'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "imagenes") {
                formFields.innerHTML = `
                    <label for="id_imagen">Selecciona una imagen:</label>
                    <select id="id_imagen" name="id_imagen" required>
                        <option value="">--Selecciona una imagen--</option>
                        <?php foreach ($imagenes as $row) { ?>
                            <option value="<?php echo $row['id_imagen']; ?>">
                            <?php echo $row['id_imagen'] . " - " . $row['url']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "distrito") {
                formFields.innerHTML = `
                    <label for="id_distrito">Selecciona un distrito:</label>
                    <select id="id_distrito" name="id_distrito" required>
                        <option value="">--Selecciona un distrito--</option>
                        <?php foreach ($distritos as $row) { ?>
                            <option value="<?php echo $row['id_distrito']; ?>">
                                <?php echo $row['id_distrito'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "recursos") {
                formFields.innerHTML = `
                    <label for="id_recurso">Selecciona un recurso:</label>
                    <select id="id_recurso" name="id_recurso" required>
                        <option value="">--Selecciona un recurso--</option>
                        <?php foreach ($recursos as $row) { ?>
                            <option value="<?php echo $row['id_recurso']; ?>">
                                <?php echo $row['id_recurso'] . " - " . $row['pdf']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            }
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
                    document.getElementById("id_imagen").value = id1;
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
