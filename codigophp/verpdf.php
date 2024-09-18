<?php
if (isset($_GET["pdf"])) {
    // Incluir el archivo que contiene la función arreglarpdf
    include "../codigophp/construccion.php";

    // Obtener y limpiar el nombre del PDF
    $pdf_nombre = arreglarpdf($_GET["pdf"]);

    // Construir la ruta al archivo PDF
    $pdf_ruta = "." . $pdf_nombre;
    // Verificar si el archivo PDF existe antes de intentar mostrarlo
    if (file_exists($pdf_ruta)) {
        echo '<embed class="pdf-viewer" src="' . htmlspecialchars($pdf_ruta, ENT_QUOTES, 'UTF-8') . '" type="application/pdf" />';
    } else {
        echo '<p>El archivo PDF no se encuentra en el servidor.</p>';
    }
}
?>

<style>
    .pdf-viewer {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }
</style>