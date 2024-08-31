<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción Universitaria</title>
    <link rel="stylesheet" href="./estiloscss/universidad.css">
    <style>
        body {
            background-color: #f0f0f0;
            margin: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #e81f76;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #e81f76;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h1>Formulario de Inscripción Universitaria</h1>
        <p>Por favor complete todos los campos:</p>
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefono">Teléfono de contacto:</label>
        <input type="tel" id="telefono" name="telefono" required>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

        <label for="colegio">Colegio secundario de egreso:</label>
        <input type="text" id="colegio" name="colegio" required>

        <label for="titulo_secundario">Título secundario obtenido:</label>
        <input type="text" id="titulo_secundario" name="titulo_secundario" required>

        <label for="promedio_secundario">Promedio secundario:</label>
        <input type="number" id="promedio_secundario" name="promedio_secundario" min="1" max="10" step="0.01" required>

        <label for="carrera">Carrera a la que desea inscribirse:</label>
        <select id="carrera" name="carrera" required>
            <option value="">Seleccione una carrera</option>
            <option value="Licenciatura en Administración">Licenciatura en Administración</option>
            <option value="Ingeniería en Sistemas">Ingeniería en Sistemas</option>
            <option value="Licenciatura en Ciencias Económicas">Licenciatura en Ciencias Económicas</option>
            <!-- Agrega más opciones según las carreras que ofrezca la universidad -->
        </select>

        <label for="comentarios">Comentarios adicionales:</label>
        <textarea id="comentarios" name="comentarios" rows="4"></textarea>

        <button type="submit" class="inscribirse">Enviar Inscripción</button>
    </form>
</body>
</html>
<script src="codigojs/confetti.js"></script>