<?php
session_start();
if (!isset($_SESSION['matricula'])) {
    header("Location: login.php");
    exit();
}

$conexion = new mysqli("localhost", "root", "", "Saki_bd");
$matricula = $_SESSION['matricula'];
$query = "SELECT Contador FROM Lista WHERE ID = '$matricula'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();
$contador = $row['Contador'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>UPATLAUTLA</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #e0e0e0; 
            display: flex; 
            margin: 0; 
            min-height: 100vh; 
        }
        nav { 
            width: 250px; 
            background: rgb(76, 129, 175); 
            padding: 20px; 
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); 
            display: flex; 
            flex-direction: column; 
            justify-content: space-between; /* Distribuye el espacio entre los elementos */
        }
        nav ul { 
            list-style-type: none; 
            padding: 0; 
            margin: 0; 
        }
        nav ul li { 
            margin-bottom: 10px; 
        }
        nav ul li a { 
            text-decoration: none; 
            padding: 10px 20px; 
            background: rgb(0, 21, 75); 
            color: white; 
            border-radius: 5px; 
            display: block; 
            transition: background 0.3s ease; 
        }
        nav ul li a:hover { 
            background: rgb(0, 42, 112); 
        }
        .container { 
            background: white; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            flex-grow: 1; 
            margin: 20px; 
            overflow-y: auto; 
        }
        .contador { 
            font-size: 24px; 
            margin-bottom: 20px; 
        }
        .logo { 
            text-align: center; 
            margin-bottom: 20px; 
        }
        .logo img { 
            max-width: 100px; 
            margin: 10px; 
        }
        .university-info { 
            text-align: left; 
            margin-top: 20px; 
        }
        .university-info img { 
            max-width: 50%; 
            height: auto; 
            border-radius: 10px; 
            margin-bottom: 20px; 
            display: block; 
            margin-left: auto; 
            margin-right: auto; 
        }
    </style>
</head>
<body>
    <nav>
        <div>
            <div class="logo">
                
            </div>
            <ul>
                <li><a href="alta.php">Alta</a></li>
                <li><a href="modificar.php">Modificar</a></li>
                <li><a href="consultar.php">Consultar</a></li>
                <li><a href="baja.php">Baja</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li> <!-- Botón de cierre de sesión -->
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="contador">Veces que has entrado: <?php echo $contador; ?></div>
       
    </div>
</body>
</html>