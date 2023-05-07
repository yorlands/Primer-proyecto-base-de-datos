<html>
<head>
    <title>Editar usuario</title>
    <style>
    /* Fuentes */
    body {
        font-family: "Open Sans", sans-serif;
        font-size: 16px;
    }
    h1, h2, h3, h4, h5, h6 {
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        color: #3B3B3B;
    }
    p {
        font-family: "Open Sans", sans-serif;
        line-height: 1.5;
        color: #636363;
    }

    /* Colores */
    :root {
        --main-color: #2D5C5F;
        --accent-color: #FCCB5F;
        --bg-color: #F9F9F9;
        --dark-bg-color: #3B3B3B;
        --text-color: #636363;
        --light-text-color: #C6C6C6;
    }

    /* Encabezados */
    h1 {
        font-size: 3rem;
        text-align: center;
        margin: 2rem 0;
    }
    h2 {
        font-size: 2rem;
        margin: 1.5rem 0;
    }
    h3 {
        font-size: 1.5rem;
        margin: 1rem 0;
    }

    /* Botones */
    .button {
        display: inline-block;
        background-color: var(--main-color);
        color: #fff;
        border: none;
        padding: 1rem 2rem;
        font-size: 1rem;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
    }
    .button:hover {
        background-color: var(--accent-color);
    }

    /* Enlaces */
    a {
        color: var(--main-color);
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }
    a:hover {
        color: var(--accent-color);
        text-decoration: underline;
    }

    /* Tablas */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid var(--text-color);
        padding: 0.5rem;
    }
    th {
        background-color: var(--main-color);
        color: #fff;
    }
    tr:nth-child(even) {
        background-color: var(--bg-color);
    }
    tr:hover {
        background-color: var(--accent-color);
    }

    /* Formularios */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    textarea {
        width: 100%;
        padding: 1rem;
        border: none;
        border-radius: 4px;
        background-color: var(--bg-color);
        color: var(--text-color);
        margin-bottom: 1rem;
    }
    input[type="submit"] {
        display: block;
        margin-top: 1rem;
        background-color: var(--main-color);
        color: #fff;
        border: none;
        padding: 1rem 2rem;
        font-size: 1rem;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color
    }
</style>
</head>
<body>

<?php
// Se incluye el archivo de conexión a la base de datos
include("db.php");
// Se define la consulta SQL para obtener los datos de la tabla usuarios
$sql="SELECT * FROM usuarios";
// Se ejecuta la consulta y se almacena el resultado en la variable $resultado
$resultado=mysqli_query($conexion,$sql);
?>

<!-- Se muestra el título de la página y un enlace para agregar un nuevo usuario -->
    <h1>Editar usuario</h1>
    <a href="./registro.html" class="button">Nuevo usuario</a><br><br>

    <!-- Se inicia la tabla y se define el encabezado -->
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>email</th>
                <th>password</th>
                <th>Editar</th>
                <th>eliminar</th>
            </tr>
        </thead>
        <tbody>

        <!-- // Se recorren los resultados de la consulta con un bucle while -->
        <?php
        while($filas=mysqli_fetch_assoc($resultado)){
             // Se muestra cada fila de la tabla con los datos del usuario correspondiente
            ?>
            <tr>
                <td> <?php echo $filas['usuario']?> </td>
                <td> <?php echo $filas['email']?> </td>
                <td> <?php echo $filas['password']?> </td>
                <td>
                <!-- Se incluyen enlaces para editar o eliminar el usuario -->
                <?php echo "<a href='editar.php?usuario=".$filas['usuario']."'>Editar</a>"; ?>

        </td>
        <td>
        <?php echo "<a href='eliminar.php?usuario=".$filas['usuario']."'>eliminar</a>"; ?>
        </td>
                <tr>
                <?php
        }
                ?>
         </tbody>           
</table>
<?php
    mysqli_close($conexion); // Se cierra la tabla y la conexión a la base de datos

?>
</body>
</html>    