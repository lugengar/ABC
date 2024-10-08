<?php
// OBTIENE TODAS LAS CARRERAS DE LA UNI
$result = null;
include "./codigophp/conexionbs.php";
$carreras= null;
if(isset($_GET['universidad'])){
    $universidad = filter_var($_GET['universidad'], FILTER_SANITIZE_SPECIAL_CHARS);
    $sql3 = "SELECT * FROM recursos WHERE fk_establecimiento = ".$universidad;
    $idcarreras = $conn->query($sql3);
    $carreras= [];

    while ($row3 = $idcarreras->fetch_assoc()) {
        array_push($carreras, $row3["fk_carrera"]);
    }
}
// Validar y limpiar el parámetro de búsqueda
if(isset($_GET['universidad']) && isset($_GET['busqueda']) ){
    $universidad = filter_var($_GET['universidad'], FILTER_SANITIZE_SPECIAL_CHARS);
    $busqueda = filter_var($_GET['busqueda'], FILTER_SANITIZE_SPECIAL_CHARS);
    echo '<div class="etiquetas"><a id="etiqueta"href="universidad.php?universidad='.$universidad.'#identificador2" class="etiqueta">Eliminar busqueda: '.$busqueda.'</a></div> <div class="barraseparadora" ></div>';
}
if (isset($_GET['busqueda']) && isset($_GET['tipo']) && $carreras != null) {

    $busqueda = filter_var($_GET['busqueda'], FILTER_SANITIZE_SPECIAL_CHARS);
    
    $tipo = filter_var($_GET['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);
    $tec = "Técnico";
    // Preparar la consulta usando una consulta preparada
  
    if($tipo == "nombre"){    
        $stmt =  $conn->prepare("SELECT * FROM carrera WHERE nombre LIKE ? AND id_carrera IN (".implode(", ", $carreras).")");

        $param = "%$busqueda%";
        
        // Asignar parámetro y ejecutar consulta
        $stmt->bind_param("s", $param);
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();
    }else if($tipo == "carrera"){ 
        $stmt =  $conn->prepare("SELECT * FROM carrera WHERE tipo_carrera = ? AND id_carrera IN (".implode(", ", $carreras).")");
        // Asignar parámetro y ejecutar consulta
        $stmt->bind_param("s", $busqueda);
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();
    }else if($tipo == "tecnicatura"){ 
        $stmt =  $conn->prepare("SELECT * FROM carrera WHERE nombre LIKE ? AND titulo LIKE ? AND id_carrera IN (".implode(", ", $carreras).")");
        $param = "%$busqueda%";
        $param2 = "%$tec%";
        
        // Asignar parámetro y ejecutar consulta
        $stmt->bind_param("ss", $param, $param2);
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();
    }

    
}else{
    if($carreras != null){
        $stmt = $conn->prepare("SELECT * FROM carrera WHERE id_carrera IN (".implode(", ", $carreras).") ORDER BY RAND()");
        $stmt->execute();
        $result = $stmt->get_result();
    }else{
        echo "<p class= 'error' >No se encontraron carreras para este establecimiento</p>";
    }
}
if($result != null){
    if ($result->num_rows == 0) {
        echo "<p class= 'error' >No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda)."</p>";
    }else{
        echo '<div class="universidades lista2" style="position:relative;">';
        while ($row2 = $result->fetch_assoc()) {
            carrera($row2["id_carrera"], $row2["nombre"], $row2["descripcion"],$row["id_establecimiento"],$row2["titulo"]); #$row["imagenes"]);
        }
        echo '</div>';

    }
$stmt->close();

}


$conn->close();
?>
