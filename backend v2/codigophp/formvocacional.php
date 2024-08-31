<div class="content">


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];

    $categories = [
        'a' => 'Ciencias Exactas e Ingeniería',
        'b' => 'Artes y Diseño',
        'c' => 'Comunicación y Humanidades',
        'd' => 'Ciencias de la Salud'
    ];

    $counts = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0];

    $responses = [$q1, $q2, $q3, $q4, $q5];
    foreach ($responses as $response) {
        $counts[$response]++;
    }

    $max_category = array_keys($counts, max($counts))[0];
    $career = $categories[$max_category];

    echo "<h1>Resultado del Test Vocacional</h1>";
    echo "<p>Según tus respuestas, la carrera más adecuada para ti es: <strong>$career</strong></p>";
}
?>
<a href="../index.php"  class="botonuni">SALIR</a>
</div>
<style>
    .content{
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap; 
    }
    .content h1, p{
        margin-left:5dvw;
        margin-right:5dvw;
        width: 80dvw;
        height:max-content;
        text-align: center;
    }
    .botonuni{
        font-size: 2vh;
        border: none;
        border-radius: 1.5vh;
        height: 5vh;
        width: 18vh;
        background-color: #e81f76;
        color: white;
        transform: translateY(-2.5vh);
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        margin-left:30dvw;
        margin-right:30dvw;
    }
</style>
<link rel="stylesheet" href="../estiloscss/universidad.css">
<script src="../codigojs/confetti.js"></script>
<script>
    createConfetti();
    setTimeout(cleanUpConfetti, 4000);

</script>
