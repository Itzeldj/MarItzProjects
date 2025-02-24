<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Estudiante</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #df7c0b;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        button:hover {
            background-color: #c96b0a;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Eliminar Estudiante</h1>
        <form method="POST" action="">
            <label for="matricula">Matrícula:</label>
            <input type="text" name="matricula" required>
            <button type="submit">Eliminar</button>
        </form>
        <?php
        // Datos de conexión
        $host = 'localhost'; 
        $usuario = 'root'; 
        $contrasena = ''; 
        $nombre_base_datos = 'Saki_bd'; 

        // Crear conexión
        $conn = new mysqli($host, $usuario, $contrasena, $nombre_base_datos);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Verificar si se recibió la matrícula
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['matricula'])) {
            $matricula = $_POST['matricula'];

            // SQL para eliminar al estudiante
            $sql = "DELETE FROM estudiantes WHERE matricula = ?";

            // Preparar la consulta
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $matricula);
                if ($stmt->execute()) {
                    echo "<p>Estudiante eliminado correctamente.</p>";
                } else {
                    echo "<p>Error al eliminar al estudiante. Intenta de nuevo.</p>";
                }
                $stmt->close();
            } else {
                echo "<p>Error al preparar la consulta.</p>";
            }
        }
        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</body>
</html>
