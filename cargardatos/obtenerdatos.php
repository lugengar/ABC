<?php

if(isset($_SESSION['id_usuario'])){
include "../codigophp/conexionbs.php";

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
    $id = $_GET['id'];

    if ($tipo == "establecimiento" || $tipo == "carrusel") {
        // Obtener los datos del establecimiento
        $query = "SELECT * FROM establecimiento WHERE id_establecimiento = ?";
    } elseif ($tipo == "recursos") {
        // Obtener los datos del recurso
        $query = "SELECT * FROM recursos WHERE id_recurso = ?";
    } elseif ($tipo == "carrera") {
        // Obtener los datos de la carrera
        $query = "SELECT * FROM carrera WHERE id_carrera = ?";
    } elseif ($tipo == "contacto") {
        // Obtener los datos del contacto
        $query = "SELECT * FROM contacto WHERE id_contacto = ?";
    } elseif ($tipo == "distrito") {
        // Obtener los datos del distrito
        $query = "SELECT * FROM distrito WHERE id_distrito = ?";
    } elseif ($tipo == "imagenes") {
        // Obtener los datos de la imagen
        $query = "SELECT * FROM imagenes WHERE id_imagen = ?";
    } else {
        echo 'Tipo no válido.';
        exit;
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        if ($tipo == "carrusel") {

            echo '
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="' . htmlspecialchars($data['nombre']) . '" required>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="' . htmlspecialchars($data['descripcion']) . '" required>
            ';
        } else if ($tipo == "establecimiento") {
            include "../codigophp/construccion.php";

            echo '
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="' . htmlspecialchars($data['nombre']) . '" required>
                <label for="ubicacion">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" value="' . htmlspecialchars($data['ubicacion']) . '" required>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="' . htmlspecialchars($data['descripcion']) . '" required>
                <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
                <select name="tipo_establecimiento" id="tipo_establecimiento" required>';

            $query2 = "SELECT DISTINCT tipo_establecimiento
                       FROM establecimiento
                       ORDER BY
                           CASE
                               WHEN id_establecimiento = ? THEN 0
                               ELSE 1
                           END, tipo_establecimiento";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            establecimientolista($result2);

            echo '
                </select>
                <label for="servicios">Servicios:</label>
                <input type="text" id="servicios" name="servicios" value="' . htmlspecialchars($data['servicios']) . '" required>
                <label for="fk_distrito">Distrito:</label>
                <select name="fk_distrito" id="fk_distrito" required>';

            $query2 = "SELECT DISTINCT *
                       FROM distrito
                       ORDER BY
                           CASE
                               WHEN id_distrito = ? THEN 0
                               ELSE 1
                           END, nombre";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $data["fk_distrito"]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            distritolista($result2);

            echo '
                </select>
                <label for="habilitado">¿Quiere que el establecimiento sea público? (todos podrán verlo):</label>
                <input type="checkbox" id="habilitado" name="habilitado" ' . ($data['habilitado'] ? 'checked' : '') . '>
            ';
        } elseif ($tipo == "carrera") {
            include "../codigophp/construccion.php";

            echo '
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="' . htmlspecialchars($data['nombre']) . '" required>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="' . htmlspecialchars($data['descripcion']) . '" required>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="' . htmlspecialchars($data['titulo']) . '" required>
                <label for="tipo_carrera">Tipo de Carrera:</label>
                <select name="tipo_carrera" id="tipo_carrera" required>';

            $query2 = "SELECT DISTINCT tipo_carrera
                       FROM carrera
                       ORDER BY
                           CASE
                               WHEN id_carrera = ? THEN 0
                               ELSE 1
                           END, tipo_carrera";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            carreratipolista($result2);

            echo '
                </select>
            ';
        } elseif ($tipo == "contacto") {
            include "../codigophp/construccion.php";

            echo '
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" required value="' . htmlspecialchars($data['descripcion']) . '">
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>';

            $query2 = "SELECT DISTINCT tipo
                       FROM contacto
                       ORDER BY
                           CASE
                               WHEN id_contacto = ? THEN 0
                               ELSE 1
                           END, tipo";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            foreach ($result2 as $row) {
                echo '<option value="' . $row["tipo"] . '">' . $row["tipo"] . '</option>';
            }

            echo '
                </select>
                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" name="contacto" required value="' . htmlspecialchars($data['contacto']) . '">
                <label for="fk_establecimiento">FK Establecimiento:</label>
                <select id="fk_establecimiento" name="fk_establecimiento" required>';

            $query2 = "SELECT * FROM establecimiento
                       ORDER BY
                           CASE
                               WHEN id_establecimiento = ? THEN 0
                               ELSE 1
                           END";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $data["fk_establecimiento"]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            foreach ($result2 as $row) {
                echo '<option value="' . $row["id_establecimiento"] . '">' . $row["nombre"] . '</option>';
            }

            echo '
                </select>
            ';
        } elseif ($tipo == "recursos") {
            include "../codigophp/construccion.php";

            echo '
                <label for="pdf">PDF Plan de Estudio o Diseño Curricular:</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" value="../pdf/' . htmlspecialchars($data['pdf']) . '.pdf">
                <label for="fk_carrera">Carrera:</label>
                <select id="fk_carrera" name="fk_carrera" required>';

            $query2 = "SELECT * FROM carrera
                       ORDER BY
                           CASE
                               WHEN id_carrera = ? THEN 0
                               ELSE 1
                           END";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $data["fk_carrera"]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            foreach ($result2 as $row) {
                echo '<option value="' . $row["id_carrera"] . '">' . $row["nombre"] . '</option>';
            }

            echo '
                </select>
                <label for="fk_establecimiento">Establecimiento:</label>
                <select id="fk_establecimiento" name="fk_establecimiento" required>';

            $query2 = "SELECT * FROM establecimiento
                       ORDER BY
                           CASE
                               WHEN id_establecimiento = ? THEN 0
                               ELSE 1
                           END";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $data["fk_establecimiento"]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            foreach ($result2 as $row) {
                echo '<option value="' . $row["id_establecimiento"] . '">' . $row["nombre"] . '</option>';
            }

            echo '
                </select>
            
              <label for="tipo_recurso">Tipo de recurso:</label>
                <select id="tipo_recurso" name="tipo_recurso" required value="'.$data["tipo_recurso"].'">';

            $query2 = "SELECT DISTINCT tipo_recurso FROM recursos
                       ORDER BY
                           CASE
                               WHEN id_recurso = ? THEN 0
                               ELSE 1
                           END";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            foreach ($result2 as $row) {
                echo '<option value="' . $row["tipo_recurso"] . '">' . $row["tipo_recurso"] . '</option>';
            }

            echo '
                </select>';
        } elseif ($tipo == "imagenes") {
        include "../codigophp/construccion.php";
    
        echo '
              <label for="imagen">Imagen (JPG):</label>
                <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg" required>
                <label for="fk_establecimiento">Establecimiento:</label>
                <select id="fk_establecimiento" name="fk_establecimiento" required>
                    <option value="0"> 
                        Carrusel del inicio
                    </option>';
    
        $query2 = "SELECT * FROM establecimiento
                   ORDER BY
                       CASE
                           WHEN id_establecimiento = ? THEN 0
                           ELSE 1
                       END";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("i", $data["fk_establecimiento"]);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        foreach ($result2 as $row) {
            echo '<option value="' . $row["id_establecimiento"] . '">' . $row["nombre"] . '</option>';
        }
        echo '
            </select>
        ';
    }elseif ($tipo == "distrito") {

    
        echo '
              <label for="nombre">Nombre del Distrito:</label>
             <input type="text" id="nombre" name="nombre" required value="'.htmlspecialchars($data["nombre"]).'">
        ';
    } else {
        echo 'No se encontraron datos.';
    }
}
} else {
    echo 'ID o tipo no proporcionado.';
}
}
?>
