<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../estiloscss/cargardatos.css">
    <link rel="stylesheet" href="../estiloscss/animaciones.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
</head>
    <?php
    include "../claves.php";
    include "../codigophp/verificacion.php";
    entraradmin();
    ?>
    <body style="position:relative;">
   
<header class="header" id="header" style="">
            <a href="../index.php" class="logo_pba_horizontal " ></a>
            <a href="../index.php" class="boton_nose_que_estudiar">Inicio<div class="circulopregunta" style="background-image: url(../imagenes/iconos/casa.svg); background-size: 4vh;"></div></a>
        </header>
    <div class="login-container">
    
        <h1>Inicio de sesión</h1>
        <form id="loginForm" action="procesar_login.php" method="post">
            <div class="input-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Iniciar sesión</button>        
        </form>
    </div>
</body>
</html>
<style>
  /* styles.css */
.header{
    position:absolute; 
    height: 6vh; 
    width:100%;
    top:0%;
    left:0%;
}
body {
    background-color: #ffffff;
    font-family: sans-serif; /* Usando una fuente del sistema */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
    overflow:hidden;
    margin: 0;
}
body {
    background-image: url(../imagenes/otros/imagen_footer2.png);
    background-repeat: repeat-x;
    background-size: 150vh;
    background-position: bottom;
    animation: footer 40s linear infinite;
}

.login-container {
    width: 80vw;
    max-width: 400px;
    padding: 4vh;
    background-color: #ffffff;
    border-radius: 1vh;
    box-shadow: 0 0.5vh 2vh rgba(0, 0, 0, 0.2);
    text-align: center;
}

h1 {
    color: #00adc1; /* Cyan */
    margin-bottom: 3vh;
    font-size: 3vh;
}

.input-group {
    margin-bottom: 3vh;
    text-align: left;
}

label {
    color: #333;
    font-weight: bold;
    display: block;
    margin-bottom: 1vh;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 1.5vh;
    border: 0.2vh solid #ccc;
    border-radius: 0.5vh;
    box-sizing: border-box;
    font-size: 2vh;
}

input[type="email"]:focus,
input[type="password"]:focus {
    outline: none;
    box-shadow: 0 0 1vh rgba(0, 255, 255, 0.5);
}

.btn {
    width: 100%;
    padding: 1.5vh;
    background-color: #e81f76; /* Magenta */
    color: #ffffff;
    font-weight: bold;
    border: none;
    border-radius: 0.5vh;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 2.5vh;
}


.btn:focus {
    outline: none;
    box-shadow: 0 0 1vh rgba(255, 0, 255, 0.5);
}


</style>