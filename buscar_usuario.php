<?php
$conexion = new mysqli("localhost", "root", "", "Saki_bd");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id = $conexion->real_escape_string($_GET['id']);
$query = "SELECT * FROM Lista WHERE ID='$id'";
$result = $conexion->query($query);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    echo json_encode($usuario);
} else {
    echo json_encode(null);
}

$conexion->close();
?>
