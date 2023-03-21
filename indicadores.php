<?php

session_start();
include_once 'db.php';
$correousuarioautenticado = $_SESSION['nombredelusuario'];

$query = mysqli_query($db,"SELECT u.id_cliente, c.nombre, c.primer_apellido FROM Usuarios_Clientes_Externo u join Clientes_Externos c
on u.id_cliente = c.id_cliente WHERE u.correo_electronico = '$correousuarioautenticado'");

//esta  variable es para contar las filas del query
foreach ($query  as $key => $opciones) :
    $idcliente = $opciones['id_cliente'];  
    $nombre = $opciones['nombre'];
endforeach;

$_SESSION['idcliente'] = $idcliente;
$_SESSION['nombre'] = $nombre;
$nombreusuario = $_SESSION['nombre'];


if(isset($_SESSION['nombredelusuario'])){
    $usuarioingresado = $_SESSION['nombredelusuario'];
    //echo "<h1>Bienvanido: $usuarioingresado </h1>";
}else{
    header('location: inicio_sesion.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Document</title>
</head>
<body>
<h1>Perfil de indicadores</h1>    

<footer class="footer">
    <div class="contenedor contenedor-footer">
        <?php
        // Obtener fecha del servidor le pasamos el formato
        // y miniscula solo year corto 22 y Y imprime completo 2022
        $fecha =  date('Y');
        ?>
        <p class="copyright">Todos los derechos Reservados <?php echo date('Y') ?> &copy;</p>

    </div>

</footer>
<script src="build/js/bundle.min.js"></script>
</body>
</html>