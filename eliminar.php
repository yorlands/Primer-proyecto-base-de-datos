<?php
// Se incluye el archivo de conexión a la base de datos
include('db.php');

// Se obtiene el usuario a eliminar mediante el método GET
$usuario = $_GET['usuario'];

// Se define la consulta SQL para eliminar al usuario de la tabla usuarios
$sql = "DELETE FROM usuarios WHERE usuario='".$usuario."'";

// Se ejecuta la consulta y se almacena el resultado en la variable $resultado
$resultado = mysqli_query($conexion, $sql);


// Se verifica si la eliminación fue exitosa
if ($resultado) {
    // Si fue exitosa, se muestra un mensaje de confirmación mediante una alerta de JavaScript y se redirige al usuario a la página de la tabla de usuarios
    echo "<script language='JavaScript'> 
          alert('Usuario eliminado'); 
          location.assign('tabla.php');
          </script>";
} else {
    // Si no fue exitosa, se muestra un mensaje de error mediante una alerta de JavaScript y se redirige al usuario a la página de la tabla de usuarios
    echo "<script language='JavaScript'> 
          alert('Usuario NO eliminado'); 
          location.assign('tabla.php');
          </script>";
}

// Se cierra la conexión a la base de datos
mysqli_close($conexion);
?>
