<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "Saki_bd");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $query = "SELECT * FROM Lista WHERE ID = '$matricula'";
    $result = $conexion->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['matricula'] = $matricula;
        $update_counter = "UPDATE Lista SET Contador = Contador + 1 WHERE ID = '$matricula'";
        $conexion->query($update_counter);
        header("Location: contador.php");
    } else {
        echo "Matrícula no encontrada.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(134, 2, 200);
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
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background:rgba(28, 213, 173, 0.45);
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
        .message.error {
            color:rgb(54, 92, 244);
        }
    </style>
</head>
<body>


<form method="POST">
    <h2>Iniciar Sesión</h2>
    <label for="matricula">Matrícula:</label>
    <input type="text" name="matricula" required><br><br>
    <button type="submit">Validar</button>

    <?php
    if (isset($_POST['matricula']) && $result->num_rows != 1) {
        echo '<div class="message error">Matrícula no encontrada.</div>';
    }
    ?>
</form>

</body>
</html>
