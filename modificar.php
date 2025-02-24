<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: url('Gorrion.jpeg') no-repeat center center fixed; 
            background-size: cover; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: rgba(255, 255, 255, 0.9); 
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            height: 100%; 
            max-width: 100%; 
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .title-container {
            background: linear-gradient(to right, red, green, white); 
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 36px; 
            font-weight: bold;
            margin: 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 20px; 
            color: #333;
            font-weight: bold; 
        }

        input[type="text"],
        input[type="number"],
        select,
        input[type="checkbox"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 18px; 
            font-weight: bold; 
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        input[type="checkbox"]:focus {
            background-color:rgb(198, 237, 237); 
            color: black; 
            border-color: #0066cc; 
        }

        button {
            width: 100%;
            padding: 20px;
            background: rgb(232, 118, 141);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 24px; 
            font-weight: bold; 
            cursor: pointer;
            transition: background 0.3s, background-image 0.3s;
            background-image: linear-gradient(to right, red, blue);
            background-size: 200% 100%;
            background-position: right bottom;
        }

        button:hover {
            background-position: left bottom; 
        }

        .back-button {
            position: absolute;
            bottom: 20px;
            left: 20px;
            padding: 15px 25px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px; 
            font-weight: bold; 
        }

        .back-button:hover {
            background: #444;
        }
        .modificar_u{
            width: 300px;
            height: 200px;
            background: linear-gradient(right, #008000, #ffffff, #ff0000); 
            border: 2px solid #000;
            padding: 10px;
            color: #000;
            text-align: center;
            line-height: 200px;
            font-size: 20px;
        }
    </style>
    <script>
        function cambiarColorBorde(event) {
            event.target.style.borderColor = '#0066cc'; 
        }

        function restaurarColorBorde(event) {
            event.target.style.borderColor = '#ccc'; 
        }
        
        function buscarUsuario() {
            const buscarId = document.getElementById('buscar_id').value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', buscar_usuario.php?id=${buscarId}, true);
            xhr.onload = function () {
                if (this.status === 200) {
                    const usuario = JSON.parse(this.responseText);
                    if (usuario) {
                        document.getElementById('id').value = usuario.ID;
                        document.getElementById('nombre').value = usuario.Nombre;
                        document.getElementById('apellidoP').value = usuario.ApellidoP;
                        document.getElementById('apellidoM').value = usuario.ApellidoM;
                        document.getElementById('codigoPostal').value = usuario.CodigoPostal;
                        document.getElementById('beso').checked = usuario.Beso;
                        document.getElementById('sexo').value = usuario.Sexo;
                        document.getElementById('edad').value = usuario.Edad;
                    } else {
                        alert('Usuario no encontrado.');
                    }
                }
            }
            xhr.send();
        }
    </script>
</head>
<body>


<form method="POST">


        <div class="title-container">
            <h2>Modificar Usuario</h2>
        </div>
    <label for="id">ID Actual:</label>
    <input type="text" id="id" name="id" required >
    <label for="nuevo_id">Nuevo ID:</label>
    <input type="text" id="nuevo_id" name="nuevo_id" required>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <label for="apellidoP">Apellido Paterno:</label>
    <input type="text" id="apellidoP" name="apellidoP">
    <label for="apellidoM">Apellido Materno:</label>
    <input type="text" id="apellidoM" name="apellidoM">
    <label for="codigoPostal">Código Postal:</label>
    <input type="text" id="codigoPostal" name="codigoPostal">
    <label for="beso">Beso:</label>
    <input type="checkbox" id="beso" name="beso">
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>
    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad">
    <button type="submit">Modificar</button>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = new mysqli("localhost", "root", "Vck_mmm_@9/++", "Saki_bd");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $id = $conexion->real_escape_string($_POST['id']);
        $nuevo_id = $conexion->real_escape_string($_POST['nuevo_id']);
        $nombre = $conexion->real_escape_string($_POST['nombre']);
        $apellidoP = $conexion->real_escape_string($_POST['apellidoP']);
        $apellidoM = $conexion->real_escape_string($_POST['apellidoM']);
        $codigoPostal = $conexion->real_escape_string($_POST['codigoPostal']);
        $beso = isset($_POST['beso']) ? 1 : 0;
        $sexo = $conexion->real_escape_string($_POST['sexo']);
        $edad = $conexion->real_escape_string($_POST['edad']);

        $query = "UPDATE Lista SET ID='$nuevo_id', Nombre='$nombre', ApellidoP='$apellidoP', ApellidoM='$apellidoM', CodigoPostal='$codigoPostal', Beso='$beso', Sexo='$sexo', Edad='$edad' WHERE ID='$id'";
        if ($conexion->query($query) === TRUE) {
            echo '<div class="message success">Usuario modificado con éxito.</div>';
        } else {
            echo '<div class="message error">Error: ' . $conexion->error . '</div>';
        }

        $conexion->close();
    }
    ?>
</form>

<a href="contador.php" class="back-button">Volver a la pagina principal</a>

</body>
</html>
