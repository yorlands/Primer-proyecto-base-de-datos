<?php
// Se incluye el archivo de conexión a la base de datos
include('db.php');

// Se obtienen los datos del usuario enviados mediante el método POST   
$USUARIO=$_POST['usuario'];
$EMAIL=$_POST['email'];
$PASSWORD=$_POST['password'];

// Se define la consulta SQL para obtener los datos del usuario que se está intentando autenticar
$consulta = "SELECT * FROM usuarios WHERE usuario='$USUARIO' and email='$EMAIL' and password='$PASSWORD'";

// Se ejecuta la consulta y se almacena el resultado en la variable $resultado
$resultado = mysqli_query($conexion, $consulta);

// Se obtiene el número de filas del resultado de la consulta
$filas=mysqli_num_rows($resultado);

// Si se encontró al menos una fila, se redirige al usuario a la página de la tabla de usuarios
if($filas>0){
    header("location:tabla.php");
}else{
    // Si no se encontró ninguna fila, se muestra un mensaje de error de autenticación y se incluye el archivo index.html
    include("index.html");
    ?>
    <h1>ERROR DE AUTENTIFICACION</h1>
    <?php
}
// Se liberan los resultados de la consulta y se cierra la conexión a la base de datos
mysqli_free_result($resultado);
mysqli_close($conexion);

?>