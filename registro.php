<?php
include('db.php');

$USUARIO = $_POST['usuario'];
$EMAIL = $_POST['email'];
$PASSWORD = $_POST['password'];

// Verificar si el usuario ya existe en la base de datos
$consulta = "SELECT * FROM usuarios WHERE usuario='$USUARIO' and email='$EMAIL' and password='$PASSWORD'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
    include("index.html"); // Redirigir al home en caso de que el usuario ya exista
} else {
    // Insertar al usuario en la base de datos
    $consulta = "INSERT INTO usuarios (usuario, email, password) VALUES ('$USUARIO', '$EMAIL', '$PASSWORD')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        include("tabla.php");
        echo "<h1>Registro exitoso</h1>"; // Mostrar mensaje de registro exitoso
    } else {
        include("registro.html");
        echo "<h1>Error de registro</h1>"; // Mostrar mensaje de error de registro
    }
}
?>