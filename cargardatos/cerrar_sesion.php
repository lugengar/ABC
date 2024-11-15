<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="https://abc.gob.ar/core/themes/abc/favicon.ico" type="image/vnd.microsoft.icon">
</head>

<body>
    <?php
    session_start();
    
    session_destroy();
    ?>

    <div class="login-container">
        <p class="success-message">Cerrando la sesión...</p>
        <script>
            setTimeout(function() {
                window.location.href = 'index.php'; 
            }, 3000); 
        </script>
    </div>

</body>

</html>