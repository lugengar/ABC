<?php
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

$id = $_GET['id'] ?? '';

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM tabla WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        echo '<h1>' . htmlspecialchars($result['nombre']) . '</h1>';
        echo '<p>' . htmlspecialchars($result['descripcion']) . '</p>';
    } else {
        echo 'No se encontraron detalles para este ID.';
    }
} else {
    echo 'ID no proporcionado.';
}
?>
