<?php

session_start();



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
<h1>Gestor de perfiles</h1>    

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