<?php
// Conectar a la base de datos
$host = 'localhost';
$db = 'test';
$user = 'root';
$pass = '';

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

$query = $_GET['q'] ?? '';

if ($query) {
    $stmt = $conn->prepare("SELECT * FROM tabla WHERE id LIKE ?");
    $stmt->execute(["%$query%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($results as $result) {
        echo '<button onclick="parent.navigateToPage(\'detail_page.php?id=' . $result['id'] . '\')">' . htmlspecialchars($result['nombre']) . '</button><br>';
    }
}
?>
