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
         include "../codigophp/conexionbs.php";
         session_start();
         $_SESSION["id_usuario"] = "a";

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
        <h2>Formulario de Carga de Datos</h2>
        <form action="process.php" method="post" id="dataForm" enctype="multipart/form-data">
            <label for="accion">Seleccionar acción:</label>
            <select id="accion" name="accion" onchange="mostrarFormulario()" required>
                <option value="">--Selecciona una acción--</option>
                <option value="agregar">Agregar</option>
                <option value="eliminar">Eliminar</option>
                <option value="modificar">Modificar</option>
                <option value="visualizar">Visualizar</option>                  
            </select>

            <label for="tabla">Seleccionar tabla:</label>
            <select id="tabla" name="tabla" onchange="mostrarCampos()" required>
                <option value="">--Selecciona una tabla--</option>
                <option value="inicio">Inicio</option>
                <option value="carrera">Carrera</option>
                <option value="contacto">Contacto</option>
                <option value="establecimiento">Establecimiento</option>
                <option value="planestudio">Plan de Estudio</option>
                <option value="imagenes">Imagenes</option>
                <option value="distrito">Distritos</option>
            </select>

            <div id="formFields"></div>

            <input type="submit" value="Enviar">
        </form>
    </div>

    <script>
        function mostrarFormulario() {
            mostrarCampos(); 
        }

        function mostrarCampos() {
            var accion = document.getElementById("accion").value;
            var tabla = document.getElementById("tabla").value;
            var formFields = document.getElementById("formFields");
            formFields.innerHTML = ''; 


            if (accion === "agregar") {
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
                        <option value="" disabled selected>Seleccionar tipo</option>
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
                            <option value="Universidad">Universidad</option>
                            <option value="Instituto">Instituto</option>
                            <option value="Polo educativo">Polo educativo</option>
                            <option value="Centro universitario">Centro universitario</option>
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
                        <label for="imagen">Imagen (solo JPG):</label>
                        <input type="file" id="imagen" name="imagen" accept=".jpg" >
                        <label for="habilitado">¿Quiere que el establecimiento sea publico? (todos podran verlo):</label>
                        <input type="checkbox" id="habilitado" name="habilitado">
                    `;
                } else if (tabla === "planestudio") {
                    formFields.innerHTML = `
                        <label for="pdf">PDF:</label>
                        <input type="file" id="pdf" name="pdf" accept=".pdf" >
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
                }else if (tabla === "distrito") {
                formFields.innerHTML = `
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                `;
            }else if (tabla === "imagenes") {
                formFields.innerHTML = `
                    <label for="imagen">Cargar imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                    <br>
                    <label for="fk_establecimiento">FK Establecimiento:</label>
                    <select id="fk_establecimiento" name="fk_establecimiento" required>
                        <option value="">--Selecciona un establecimiento--</option>
                        <option value="0">
                                0 - Carrusel del inicio
                        </option>
                        <?php foreach ($establecimientos as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['id_establecimiento']); ?>">
                                <?php echo htmlspecialchars($row['id_establecimiento']) . " - " . htmlspecialchars($row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                `;
            }
            }


            else if (accion === "eliminar") {
                if (tabla === "carrera") {
                    formFields.innerHTML = `
                        <label for="id_carrera">Carrera a eliminar:</label>
                        <select id="id_carrera" name="id_carrera" required>
                            <option value="">--Selecciona una carrera--</option>
                            <?php foreach ($carreras as $row) { ?>
                                <option value="<?php echo $row['id_carrera']; ?>">
                                    <?php echo $row['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                } else if (tabla === "contacto") {
                    formFields.innerHTML = `
                        <label for="id_contacto">Contacto a eliminar:</label>
                        <select id="id_contacto" name="id_contacto" required>
                            <option value="">--Selecciona un contacto--</option>
                            <?php foreach ($tipos_contacto as $row) { ?>
                                <option value="<?php echo $row['tipo']; ?>">
                                    <?php echo $row['tipo']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                } else if (tabla === "establecimiento") {
                    formFields.innerHTML = `
                        <label for="id_establecimiento">Establecimiento a eliminar:</label>
                        <select id="id_establecimiento" name="id_establecimiento" required>
                            <option value="">--Selecciona un establecimiento--</option>
                            <?php foreach ($establecimientos as $row) { ?>
                                <option value="<?php echo $row['id_establecimiento']; ?>">
                                    <?php echo $row['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                } else if (tabla === "planestudio") {
                    formFields.innerHTML = `
                        <label for="id_planestudio">Plan de estudio a eliminar:</label>
                        <select id="id_planestudio" name="id_planestudio" required>
                            <option value="">--Selecciona un plan de estudio--</option>
                            <?php foreach ($carreras as $row) { ?>
                                <option value="<?php echo $row['id_carrera']; ?>">
                                    <?php echo $row['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                }
            }else if (accion === "modificar") {

            }else if (accion === "visualizar") {
                if (tabla === "establecimiento") {
                    formFields.innerHTML = `
                        <label for="id_establecimiento">Establecimiento a visualizar:</label>
                        <select id="id_establecimiento" name="id_establecimiento" required>
                            <option value="">--Selecciona un establecimiento--</option>
                            <?php foreach ($establecimientos as $row) { ?>
                                <option value="<?php echo $row['id_establecimiento']; ?>">
                                    <?php 
                                    $mensaje = "Privado";
                                    if($row['habilitado'] == "0"){
                                        $mensaje = "Publico";
                                    }
                                    echo $mensaje." - ".$row['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    `;
                }
            }
        }
    </script>
</body>
</html>