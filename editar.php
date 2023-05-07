    <?php
        include('db.php');
    ?>
    <html>
    <head>
        <title>Editar usuario</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url("https://radiomunera.com/wp-content/uploads/2019/04/los-jugadores-que-mandaron-mensaje-de-cumplea%C3%B1os-a-nacional-1068x1068.jpg");
        
        }
        h1 {
            color: #555;
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type=submit], a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #555;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.2s ease;
        }
        input[type=submit]:hover, a:hover {
            background-color: #333;
        }
    </style>
    </head>
    <body>
        <?php
        if(isset($_POST['enviar'])){// comprobar si el formulario ha sido enviado

            // Obtiene los valores enviados por el formulario
            $usuario=$_POST['usuario'];
            $nuevo_usuario=$_POST['nuevo_usuario'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            // Construye una consulta SQL para actualizar los datos del usuario basándose en su nombre de usuario actual
            $sql="UPDATE usuarios SET usuario='".$nuevo_usuario."', email='".$email."', password='".$password."' WHERE usuario='".$usuario."'";
            $resultado=mysqli_query($conexion,$sql);

            
            // Si la consulta se ejecutó correctamente
            if($resultado){
                // Muestra un mensaje de éxito y redirige a la tabla de usuarios
                echo "<script language='JavaScript'> 
                alert('Usuario actualizado'); 
                location.href = 'tabla.php';
                </script>";
            }else{
                 // Si la consulta falló, muestra un mensaje de error y redirige a la tabla de usuarios
                echo "<script language='JavaScript'> 
                alert('Usuario NO actualizado'); 
                location.href = 'tabla.php';
                </script>";
            }
            
            
        // Cierra la conexión a la base de datos
        mysqli_close($conexion);

    }else{
        // Obtiene el nombre de usuario de la consulta en la cadena de consulta
        $usuario=$_GET['usuario'];
    
        // Construye una consulta SQL para obtener los datos del usuario basándose en su nombre de usuario
        $sql="SELECT * FROM usuarios WHERE usuario='".$usuario."'";
        $resultado=mysqli_query($conexion,$sql);
    

        // Obtiene la fila de resultados como un arreglo asociativo
        $fila=mysqli_fetch_assoc($resultado);

        // Obtiene los valores del arreglo asociativo
        $usuario=$fila['usuario'];
        $email=$fila['email'];
        $password=$fila['password'];
    
        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
    
        // Construye el formulario HTML para editar los datos del usuario
        ?>   
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <h1>EDITAR USUARIO </h1>
            <label>usuario</label>
            <input type="text" name="nuevo_usuario"
            value="<?php echo $usuario; ?>"><br>

            <input type="hidden" name="usuario"
            value="<?php echo $usuario; ?>">

            <label>Correo</label>
            <input type="text" name="email"
            value="<?php echo $email; ?>"><br>

            <label>Contraseña</label>
            <input type="text" name="password"
            value="<?php echo $password; ?>"><br>
        
    
            <input type="submit" name="enviar" value="Actualizar ">
            <a href="tabla.php">volver</a>
    
        </form>
        <?php
        }
        ?>
    </body>
    </html>
