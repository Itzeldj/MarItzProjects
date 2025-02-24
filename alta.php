<!DOCTYPE html>
<html>
<head>
    <title>Alta de Estudiantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:rgb(181, 3, 45);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 500px;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 150px;
            height: auto;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h2 img {
            width: 70px;
            height: auto;
            margin: 0 15px;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="checkbox"] {
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .message.success {
            color: #4CAF50;
        }
        .message.error {
            color:rgb(54, 127, 244);
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .back-button:hover {
            background: #555;
        }
    </style>
</head>
<body>


<form method="POST">
    <br><br><br><br><br><br><br><br><br>
   
    <label for="id">ID:</label>
    <input type="text" name="id" required>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="apellidoP">Apellido Paterno:</label>
    <input type="text" name="apellidoP" required>
    <label for="apellidoM">Apellido Materno:</label>
    <input type="text" name="apellidoM" required>
    <label for="codigoPostal">Código Postal:</label>
    <input type="text" name="codigoPostal" required>
    <label for="beso">Beso:</label>
    <input type="checkbox" name="beso">
    <label for="sexo">Sexo:</label>
    <select name="sexo" required>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" required>
    <button type="submit">Registrar</button>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = new mysqli("localhost", "root", "", "Saki_bd");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $id = $conexion->real_escape_string($_POST['id']);
        $nombre = $conexion->real_escape_string($_POST['nombre']);
        $apellidoP = $conexion->real_escape_string($_POST['apellidoP']);
        $apellidoM = $conexion->real_escape_string($_POST['apellidoM']);
        $codigoPostal = $conexion->real_escape_string($_POST['codigoPostal']);
        $beso = isset($_POST['beso']) ? 1 : 0;
        $sexo = $conexion->real_escape_string($_POST['sexo']);
        $edad = $conexion->real_escape_string($_POST['edad']);

        $query = "INSERT INTO Lista (ID, Nombre, ApellidoP, ApellidoM, CodigoPostal, Beso, Sexo, Edad) 
                  VALUES ('$id', '$nombre', '$apellidoP', '$apellidoM', '$codigoPostal', '$beso', '$sexo', '$edad')";

        if ($conexion->query($query) === TRUE) {
            echo '<div class="message success">Usuario registrado con éxito.</div>';
        } else {
            echo '<div class="message error">Error: ' . $conexion->error . '</div>';
        }

        $conexion->close();
    }
    ?>
</form>

<a href="contador.php" class="back-button">Volver al Inicio</a>


</body>
</html>
