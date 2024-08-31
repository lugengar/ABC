<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visor de PDF</title>
  <link rel="stylesheet" href="styles.css">
  <style>

    .container2{
    left: 0;
    top: 0;
    position: absolute;
    height: max-content ;
    width: 100%;
    display: grid;
    gap: 2vh;
    grid-template-areas: 
    "HEA"
    "MAI";
    grid-template-rows: 7vh 86vh;
    grid-template-columns: auto ;
}

    .pdf-container {
      grid-area: MAI;;
      position: relative;
      border: 1px solid #ccc;
      overflow: auto;
      box-shadow: 0 0.5vh 2vh 0.5vh rgba(0, 0, 0, 0.2);
    }

    .pdf-viewer {
      position: absolute;
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body>
  
  <div class="container2">
    <header class="header">
      <a href="" class="logo_pba_horizontal"></a>
      <a onclick="window.history.back()" class="boton_nose_que_estudiar" style="background-image: none;">Volver a la universidad</a>
  </header>
  
    <div class="pdf-container">
      <embed class="pdf-viewer" src="diseño pdf.pdf" type="application/pdf" />
    </div>
  </div>
  
</body>
</html>
