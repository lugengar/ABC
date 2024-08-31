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
    switch ($tipo) {
        case 'nombre':
            $sql = "SELECT * FROM establecimiento WHERE nombre LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $busqueda);
            break;
        case 'distrito':
            $sql = "SELECT * FROM establecimiento WHERE fk_distrito = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $busqueda) ;
            break;
        case 'carrera':
            $sql = "SELECT * FROM establecimiento WHERE carrera = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $busqueda);
            break;
        case 'tecnicatura':
            $sql = "SELECT * FROM establecimiento WHERE tecnicatura = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $busqueda);
            break;
        default:
            die("Tipo de búsqueda no válido.");
    }

    // Ejecutar la consulta y obtener los resultados
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mostrar los resultados
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . htmlspecialchars($row["id"]) . " - Nombre: " . htmlspecialchars($row["nombre"]) . " - Distrito: " . htmlspecialchars($row["fk_distrito"]) . "<br>";
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
