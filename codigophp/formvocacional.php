<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos las respuestas del formulario
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];

    // Definimos las categorías y las carreras asociadas
    $categories = [
        'a' => 'Ciencias Exactas e Ingeniería',
        'b' => 'Artes y Diseño',
        'c' => 'Comunicación y Humanidades',
        'd' => 'Ciencias de la Salud'
    ];

    // Contamos las respuestas para cada categoría
    $counts = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0];

    $responses = [$q1, $q2, $q3, $q4, $q5];
    foreach ($responses as $response) {
        $counts[$response]++;
    }

    // Determinamos la categoría con más respuestas
    $max_category = array_keys($counts, max($counts))[0];
    $career = $categories[$max_category];

    // Mostramos el resultado
    echo "<h1>Resultado del Test Vocacional</h1>";
    echo "<p>Según tus respuestas, la carrera más adecuada para ti es: <strong>$career</strong></p>";
}
?>
