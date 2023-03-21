<?php



require 'includes/config/database.php';
$db = conectarBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Usario = $_POST['usuario'];
    $contra = $_POST['password'];

    //  var_dump($Usario);
    //  var_dump($contra);
    //  exit; 
}

// Revisar si el usuario existe 

$consulta = "SELECT * FROM SA_Usuarios_Administracion WHERE correo_electronico = '$Usario'";
$ejecutar = mysqli_query($db, $consulta);

if ($ejecutar->num_rows) {

    $consulta = mysqli_fetch_assoc($ejecutar);

    if ($Usario == $consulta['correo_electronico'] &&  $contra == $consulta['contrasena']) {
       
        session_start();

        $_SESSION['idusuario'] = $consulta['id_cliente'];
        $_SESSION['id_rol'] = $consulta['id_rol'];
        $_SESSION['nombre'] = $consulta['nombre'];
        $_SESSION['apellido'] = $consulta['primer_apellido'];
        // Llenar el arreglo de la sesion


       
        echo  "<script>alert('Usuario Correcto');</script>";
                 
   
    } else {
        echo  "<script>alert('Usuario o contra incorrectas');</script>";
    }


    
} else {
    echo  "<script>alert('El usuario no existe');</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrativo</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="body-index">

    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="centrar_icono">
                    <div class="titulo">
                        <img src="build/img/2yousinfondo.png">
                    </div>
                </div>

                <form method="POST" id="loginform">
                    <input type="text" name="usuario" placeholder="Usuario" required>

                    <input type="password" placeholder="Contraseña" name="password" required>

                    <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                </form>
                <div class="pie-form">

                </div>
            </div>
            <div class="inferior">

            </div>
        </div>
    </div>

</body>

</html>