<?php
// Configuración de la conexión
$host = 'localhost';  // O tu servidor de base de datos
$user = 'root';       // Tu usuario de base de datos
$password = '';       // Tu contraseña de base de datos
$dbname = 'saki_bd';  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variable de resultado
$resultado = null;

// Verificar si se envió un formulario de búsqueda por matrícula
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $sql = "SELECT * FROM Personas WHERE id = ?";
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $matricula);  // Usamos 'i' para enteros (matrícula)
    $stmt->execute();
    
    // Obtener el resultado
    $resultado = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta por Matrícula</title>
    <style>
        /* Estilo general de la página */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9f7ef;  /* Fondo verde claro */
            color: #2c3e50;  /* Texto oscuro para contraste */
            margin: 0;
            padding: 0;
        }

        /* Barra de navegación */
        nav {
            background-color: #003366;  /* Barra de navegación azul marino */
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;  /* Alinea los elementos horizontalmente */
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1em;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Contenedor principal */
        .container {
            width: 80%;
            max-width: 900px;
            margin: 20px auto;
            background-color: #ffffff;  /* Fondo blanco para el contenedor */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Títulos */
        h1, h2 {
            text-align: center;
            color: #003366;  /* Azul marino para los títulos */
        }

        /* Formulario */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;  /* Alinea los elementos en el centro verticalmente */
        }

        form label {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #003366;
        }

        form input[type="number"] {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #003366;
            border-radius: 4px;
            margin-bottom: 15px;
            width: 80%;
            max-width: 300px;
        }

        /* Contenedor para los botones, en la misma fila */
        .button-container {
            display: flex;
            justify-content: space-between;  /* Distribuye los botones a lo largo de la fila */
            width: 80%;
            max-width: 300px;
            margin-top: 10px;
        }

        form button {
            background-color: #003366;  /* Botón azul marino */
            color: white;
            padding: 10px 20px;
            font-size: 1.1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 48%;  /* Ajuste de ancho para los botones */
        }

        form button:hover {
            background-color: #004d80;  /* Azul marino brillante al pasar el mouse */
        }

        /* Estilo para los resultados */
        h2 {
            margin-top: 30px;
        }

        p {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
            font-size: 1.1em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para los enlaces si hay */
        a {
            color: #003366;  /* Azul marino para los enlaces */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilo para el botón Nueva Consulta */
        form button[type="button"] {
            background-color: #006699;  /* Azul marino más claro */
        }

        form button[type="button"]:hover {
            background-color: #3399cc;  /* Azul claro brillante */
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Consulta</a></li>
            <li><a href="#">Acerca de</a></li>
        </ul>
    </nav>

    <h1>Consultar Persona por Matrícula</h1>

    <!-- Botón Nueva Consulta -->
    <form method="POST" action="">
        <button type="button" onclick="window.location.href = window.location.href;">Limpiar</button>
    </form>

    <!-- Formulario de búsqueda -->
    <form method="POST" action="">
        <label for="matricula">Ingrese la matrícula (ID):</label>
        <input type="number" name="matricula" id="matricula" required>
        <button type="submit">Buscar</button>
    </form>

    <h2>Resultados:</h2>
    <?php
    // Mostrar los resultados si hay alguna consulta
    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<p>ID: " . $row['id'] . "<br>";
                echo "Nombre: " . $row['nombre'] . "<br>"; 
                echo "Apellido: " . $row['apellido'] . "<br>"; 
                echo "Edad: " . $row['edad'] . "<br>";
                echo "Código Postal: " . $row['codigo_postal'] . "<br>";
                echo "Beso: " . ($row['beso'] ? 'Sí' : 'No') . "<br>";
                echo "Sexo: " . $row['sexo'] . "</p>";
            }
        } else {
            echo "<p>No se encontraron resultados para la matrícula ingresada.</p>";
        }
    }
    ?>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
