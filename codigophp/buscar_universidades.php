<?php

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
}
$carrera = null;
function carrerasestablecimiento($id,$tipo){
    global $conn;
    global $stmt;
    $sql3 = "SELECT * FROM recursos WHERE fk_establecimiento = ".$id;
    $idcarreras = $conn->query($sql3);
    $carreras= [];
    if ($idcarreras->num_rows > 0) {

        while ($row3 = $idcarreras->fetch_assoc()) {
            array_push($carreras, $row3["fk_carrera"]);
        }
        $stmt = $conn->prepare("SELECT * FROM carrera WHERE tipo_carrera = ? AND id_carrera IN (".implode(", ", $carreras).")");
        $stmt->bind_param("s", $tipo);
        $stmt->execute();
        $result4 = $stmt->get_result();
        if($result4->num_rows > 0) {
            return $result4;
        }else{
            return null;

        }
        $stmt->close();

    }else{
        return null;

    }

}


function buscar(){ //BUSCA EN GENERAL POR LOS 4 MEDIOS DISTRITO, TECNICO,LICENCIATURA O NOMBRE
    global $conn;
    global $carrera;
    global $stmt;
    global $tipo;
    global $admin;
    global $result;
// Validar y limpiar el parámetro de búsqueda
if (isset($_GET['busqueda']) & isset($_GET['tipo'])) {

    $busqueda = filter_var($_GET['busqueda'], FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo = filter_var($_GET['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);
    $param = "%$busqueda%";
    // Preparar la consulta usando una consulta preparada
if($tipo == "nombre"){    
        $stmt = $conn->prepare("SELECT * 
FROM establecimiento 
WHERE nombre LIKE ? 
AND id_establecimiento != 0 ".$admin."
ORDER BY 
    CASE 
        WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
        WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
        ELSE 2
    END,
    tipo_establecimiento; ");
    
    $stmt->bind_param("s", $param);
      
    $stmt->execute();

    $result = $stmt->get_result();
}else if($tipo == "carrera"){ 
  
    $param = $busqueda;

    // Preparar la consulta
    $stmt = $conn->prepare("
        SELECT DISTINCT e.id_establecimiento, e.nombre, e.descripcion, e.habilitado
        FROM establecimiento e
        INNER JOIN recursos r ON e.id_establecimiento = r.fk_establecimiento
        INNER JOIN carrera c ON r.fk_carrera = c.id_carrera
        WHERE c.tipo_carrera = ? AND e.id_establecimiento != 0
        " . $admin . "
        ORDER BY 
            CASE 
                WHEN e.tipo_establecimiento LIKE 'Instituto%' THEN 0
                WHEN e.tipo_establecimiento LIKE 'Universidad%' THEN 1
                ELSE 2
            END,
            e.tipo_establecimiento;
    ");

    // Enlazar el parámetro a la consulta
    $stmt->bind_param("s", $param);

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();
    
}else if($tipo == "carrera2"){ 
  
    $sql2 = "SELECT * FROM recursos WHERE fk_carrera = ".$busqueda;
    $planestudio = $conn->query($sql2);
    $establecimientos = [];
    foreach($planestudio as $plan) {
        $establecimientos[] = $plan["fk_establecimiento"];
    }

    if (!empty($establecimientos)) {
        $placeholders = implode(', ', array_fill(0, count($establecimientos), '?'));
        $stmt = $conn->prepare("SELECT * FROM establecimiento WHERE id_establecimiento IN ($placeholders) AND id_establecimiento != 0 ".$admin."
        ORDER BY 
            CASE 
                WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                ELSE 2
            END,
            tipo_establecimiento;");

        $types = str_repeat('i', count($establecimientos)); 

        $stmt->bind_param($types, ...$establecimientos);

        $stmt->execute();
        $result = $stmt->get_result();
    }
}else if($tipo == "establecimiento"){ 
  
    $stmt = $conn->prepare("SELECT * FROM establecimiento WHERE tipo_establecimiento LIKE ? AND id_establecimiento != 0 ".$admin." ORDER BY nombre");
        $stmt->bind_param("s", $param);
        $stmt->execute();

        $result = $stmt->get_result();
}else if($tipo == "distrito"){ 
 
        $stmt = $conn->prepare("SELECT * FROM establecimiento WHERE fk_distrito LIKE ? AND id_establecimiento != 0 ".$admin."
        ORDER BY 
            CASE 
                WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                ELSE 2
            END,
            tipo_establecimiento;");
        $stmt->bind_param("s", $param);
    
    $stmt->execute();

    $result = $stmt->get_result();
}else{
   
    $stmt = $conn->prepare("SELECT * FROM establecimiento WHERE id_establecimiento != 0 ".$admin."
        ORDER BY 
            CASE 
                WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                ELSE 2
            END,
            tipo_establecimiento;
 ");
   $stmt->execute();

   $result = $stmt->get_result();
}
    
}else{
    $stmt = $conn->prepare("SELECT * FROM establecimiento WHERE id_establecimiento != 0 ".$admin."
        ORDER BY 
            CASE 
                WHEN tipo_establecimiento LIKE 'Instituto%' THEN 0
                WHEN tipo_establecimiento LIKE 'Universidad%' THEN 1
                ELSE 2
            END,
            tipo_establecimiento;
 ");
   $stmt->execute();

   $result = $stmt->get_result();
}
if ($result != null){
    if ($result->num_rows == 0) {
    
    echo "<p class= 'error' >No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda)."</p>";
}else{
   
    while ($row = $result->fetch_assoc()) {
        $sql2 = "SELECT * FROM imagenes WHERE fk_establecimiento = ".$row["id_establecimiento"];
        $imagenes = $conn->query($sql2);
        if($tipo == "carrera"){
            $carrera = carrerasestablecimiento($row["id_establecimiento"],$busqueda);
        }
        universidad($row["id_establecimiento"], $row["nombre"], $row["descripcion"], $imagenes, $carrera, $row["habilitado"]); #$row["imagenes"]);
    }
}
}else{
    echo "<p class= 'error' >No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda)."</p>";
}

// Cerrar consulta y conexión

$stmt->close();
$conn->close();
}
?>
