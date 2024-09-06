<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Carga de Datos</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <?php
        // Datos de conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "abc"; // Cambia esto al nombre real de tu base de datos

        // Conexión a la base de datos
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        // Consultas para obtener los datos de los FKs
        $distritos_result = mysqli_query($conn, "SELECT id_distrito, nombre FROM distrito");
        $establecimientos_result = mysqli_query($conn, "SELECT id_establecimiento, nombre FROM establecimiento");
        $carrera_result = mysqli_query($conn, "SELECT id_carrera, nombre FROM carrera");

        // Consultas adicionales para Tipo de Establecimiento y Tipo de Contacto
        $tipo_establecimiento_result = mysqli_query($conn, "SELECT DISTINCT tipo_establecimiento FROM establecimiento");
        $tipo_contacto_result = mysqli_query($conn, "SELECT DISTINCT tipo FROM contacto");

        // Guardar los resultados en arrays para reutilizarlos
        $distritos = mysqli_fetch_all($distritos_result, MYSQLI_ASSOC);
        $establecimientos = mysqli_fetch_all($establecimientos_result, MYSQLI_ASSOC);
        $carreras = mysqli_fetch_all($carrera_result, MYSQLI_ASSOC);
        $tipos_establecimiento = mysqli_fetch_all($tipo_establecimiento_result, MYSQLI_ASSOC);
        $tipos_contacto = mysqli_fetch_all($tipo_contacto_result, MYSQLI_ASSOC);
    ?>
    
    <div class="form-container">
        <h2>Formulario de Carga de Datos</h2>
        <form action="process.php" method="post" id="dataForm" enctype="multipart/form-data">
            <label for="tabla">Seleccionar tabla:</label>
            <select id="tabla" name="tabla" onchange="mostrarCampos()" required>
                <option value="">--Selecciona una tabla--</option>
                <option value="carrera">Carrera</option>
                <option value="contacto">Contacto</option>
                <option value="establecimiento">Establecimiento</option>
                <option value="imagenes">Imágenes</option>
                <option value="planestudio">Plan de Estudio</option>
            </select>

            <!-- Contenedor para los campos dinámicos -->
            <div id="formFields"></div>

            <input type="submit" value="Enviar">
        </form>
    </div>

    <script>
        function mostrarCampos() {
            var tabla = document.getElementById("tabla").value;
            var formFields = document.getElementById("formFields");
            formFields.innerHTML = '';  // Limpiar campos anteriores

            if (tabla === "carrera") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>
                `;
            } else if (tabla === "contacto") {
                formFields.innerHTML = `
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="">--Selecciona un tipo--</option>
                        <?php foreach ($tipos_contacto as $row) { ?>
                            <option value="<?php echo $row['tipo']; ?>">
                                <?php echo $row['tipo']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="contacto">Contacto:</label>
                    <input type="text" id="contacto" name="contacto" required>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo $row['id_establecimiento']; ?>">
                                <?php echo $row['id_establecimiento'] . " - " . $row['nombre']; ?>
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
                        <option value="">--Selecciona un tipo--</option>
                        <?php foreach ($tipos_establecimiento as $row) { ?>
                            <option value="<?php echo $row['tipo_establecimiento']; ?>">
                                <?php echo $row['tipo_establecimiento']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="servicios">Servicios:</label>
                    <input type="text" id="servicios" name="servicios" required>
                    <label for="fk_distrito">FK Distrito:</label>
                    <select id="fk_distrito" name="fk_distrito" required>
                        <option value="">--Selecciona un distrito--</option>
                        <?php foreach ($distritos as $row) { ?>
                            <option value="<?php echo $row['id_distrito']; ?>">
                                <?php echo $row['id_distrito'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "imagenes") {
                formFields.innerHTML = `
                    <label for="imagen">Cargar imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                    <br>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['id_establecimiento']); ?>">
                                <?php echo htmlspecialchars($row['id_establecimiento']) . " - " . htmlspecialchars($row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            } else if (tabla === "planestudio") {
                formFields.innerHTML = `
                    <label for="pdf">PDF:</label>
                    <input type="file" id="pdf" name="pdf" accept=".pdf" required>
                    <br>
                    <label for="fk_carrera">FK Carrera:</label>
                    <select id="fk_carrera" name="fk_carrera" required>
                        <option value="">--Selecciona una carrera--</option>
                        <?php foreach ($carreras as $row) { ?>
                            <option value="<?php echo $row['id_carrera']; ?>">
                                <?php echo $row['id_carrera'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo $row['id_establecimiento']; ?>">
                                <?php echo $row['id_establecimiento'] . " - " . $row['nombre']; ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            }
        }
    </script>
</body>
</html>
