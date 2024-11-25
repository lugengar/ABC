<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$result = null;
$tipo = "";
include "./codigophp/conexionbs.php";
include "./codigophp/construccion.php";
function buscarcarrera(){ //BUSCA CARRERAS/LICENCIATURAS CON EL TITULO NO TECNICO PARA MOSTRARLOS
    global $conn;
    global $stmt;
   
    $tec = "Técnico";
    $stmt =  $conn->prepare("SELECT * FROM carrera WHERE titulo NOT LIKE ? ");
    $param = "%$tec%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->get_result();
    carreraslista($result);
$stmt->close();

}
function carruselinicio(){
    global $conn;
    global $stmt;
    $stmt =  $conn->prepare("SELECT * FROM establecimiento WHERE id_establecimiento = 0");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt =  $conn->prepare("SELECT * FROM imagenes WHERE fk_establecimiento = 0");
    $stmt->execute();
    $imagenes = $stmt->get_result();
    carrusel($row["descripcion"], $row["nombre"], $imagenes,true);
    $stmt->close();
}
function buscarcarreras(){ //BUSCA CARRERAS/LICENCIATURAS CON EL TITULO NO TECNICO PARA MOSTRARLOS
    global $conn;
    global $stmt;
    $stmt =  $conn->prepare("SELECT * FROM carrera ORDER BY nombre");
    $stmt->execute();
    $result = $stmt->get_result();
    carreraslista($result);
    $stmt->close();
}
function buscartipocarrera(){
    global $conn;
    global $stmt;
    $stmt =  $conn->prepare("SELECT DISTINCT tipo_carrera FROM carrera");
    $stmt->execute();
    $result = $stmt->get_result();
    carreratipolista($result);
    $stmt->close();
}
function buscarestablecimientos(){
    global $admin;
    global $conn;
    global $stmt;
    $stmt =  $conn->prepare("SELECT DISTINCT tipo_establecimiento FROM establecimiento WHERE id_establecimiento != 0 ".$admin);
    $stmt->execute();
    $result = $stmt->get_result();
    establecimientolista($result);
    $stmt->close();
}
function buscartecnicatura(){ //BUSCA TECNICATURAS CON EL TITULO "TECNICO" PARA MOSTRARLOS
    global $conn;
    global $stmt;
    $tec = "Técnico";
    $stmt =  $conn->prepare("SELECT * FROM carrera WHERE titulo LIKE ? ");
    $param = "%$tec%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->get_result();
    carreraslista($result);
$stmt->close();

}
function buscardistritos(){ //BUSCA LOS DISTRITOS PARA MOSTRARLOS
    global $conn;
    global $stmt;
    $tec = "Técnico";
    $stmt =  $conn->prepare("SELECT * FROM distrito");
    $stmt->execute();
    $result = $stmt->get_result();
    distritolista($result);
    $stmt->close();

}
function etiqueta(){
    if (isset($_GET['busqueda']) & isset($_GET['tipo'])) {
        $busqueda = filter_var($_GET['busqueda'], FILTER_SANITIZE_SPECIAL_CHARS);
        echo '<div class="etiquetas"><a href="index.php#identificador2" id="etiqueta" class="etiqueta">Eliminar busqueda: '.$busqueda.'</a></div> <div class="barraseparadora" ></div>';
    }
}function carrerasEstablecimiento($id, $tipo) {
    global $conn;
    
    // Obtener carreras relacionadas con el establecimiento
    $sql3 = "SELECT DISTINCT c.id_carrera, c.nombre
             FROM recursos r
             INNER JOIN carrera c ON r.fk_carrera = c.id_carrera
             WHERE r.fk_establecimiento = ? AND c.nombre LIKE ?
             ORDER BY c.nombre";
    $stmt = $conn->prepare($sql3);
    $stmt->bind_param("is", $id, $tipo);
    $stmt->execute();
    return $stmt->get_result();
}

function buscar() {
    global $conn, $admin,$stmt;
    $result = null;
    $busqueda = "";
    $tipo = "";
    if (isset($_GET['busqueda']) && isset($_GET['tipo'])) {
        $busqueda = filter_var($_GET['busqueda'], FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = filter_var($_GET['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);
        $param = "%$busqueda%";

        if($tipo == "nombre"){
            $stmt = $conn->prepare("
                SELECT * FROM establecimiento
                WHERE nombre LIKE ? AND id_establecimiento != 0 $admin
                ORDER BY
                    CASE 
                        WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                        WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                        ELSE 2
                    END, tipo_establecimiento
            ");
            $stmt->bind_param("s", $param);
        } else if($tipo == "carrera"){
            $param = "%$busqueda%";
            $stmt = $conn->prepare("
                SELECT DISTINCT e.id_establecimiento, e.nombre, e.descripcion, e.habilitado
                FROM establecimiento e
                INNER JOIN recursos r ON e.id_establecimiento = r.fk_establecimiento
                INNER JOIN carrera c ON r.fk_carrera = c.id_carrera
                WHERE c.nombre LIKE ? AND e.id_establecimiento != 0 $admin
                ORDER BY
                    CASE 
                        WHEN e.tipo_establecimiento LIKE 'Instituto%' THEN 0
                        WHEN e.tipo_establecimiento LIKE 'Universidad%' THEN 1
                        ELSE 2
                    END, e.tipo_establecimiento
            ");
            $stmt->bind_param("s", $param);
        } else if($tipo == "establecimiento"){
            $stmt = $conn->prepare("
                SELECT * FROM establecimiento
                WHERE tipo_establecimiento LIKE ? AND id_establecimiento != 0 $admin
                ORDER BY nombre
            ");
            $stmt->bind_param("s", $param);
        } else if($tipo == "distrito"){
            $stmt = $conn->prepare("
                SELECT * FROM establecimiento
                WHERE fk_distrito LIKE ? AND id_establecimiento != 0 $admin
                ORDER BY
                    CASE 
                        WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                        WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                        ELSE 2
                    END, tipo_establecimiento
            ");
            $stmt->bind_param("s", $param);
        } else{
            $stmt = $conn->prepare("
                SELECT * FROM establecimiento
                WHERE id_establecimiento != 0 $admin
                ORDER BY
                    CASE 
                        WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                        WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                        ELSE 2
                    END, tipo_establecimiento
            ");
        }

        $stmt->execute();
        $result = $stmt->get_result();
    }else{
        $stmt = $conn->prepare("
            SELECT * FROM establecimiento
            WHERE id_establecimiento != 0 $admin
            ORDER BY
                CASE 
                    WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                    WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                    ELSE 2
                END, tipo_establecimiento
        ");
        $stmt->execute();
        $result = $stmt->get_result();
    }

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagenes = [];
            $sql2 = "SELECT url FROM imagenes WHERE fk_establecimiento = ?";
            $stmtImg = $conn->prepare($sql2);
            $stmtImg->bind_param("i", $row["id_establecimiento"]);
            $stmtImg->execute();
            $imagenes = $stmtImg->get_result();
            
            $stmtImg->close();

            $carreras = null;
            if ($tipo == "carrera") {
                $carreras = carrerasEstablecimiento($row["id_establecimiento"],  "%$busqueda%");
            }

            universidad($row["id_establecimiento"], $row["nombre"], $row["descripcion"], $imagenes, $carreras, $row["habilitado"]);
        }
    } else {
        echo "<p class='error'>No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda) . "</p>";
    }



$stmt->close();
$conn->close();
}
?>
