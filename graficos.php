<?php

session_start();
require 'includes/funciones.php';
incluirTempleate('header_indicadores');
?>


<h1>Total: <span id="total">0</span></h1>
<button onclick="startIncrement()">Comenzar incremento</button>



<script>
    // Obtener el elemento del DOM que muestra el total
    var totalElement = document.getElementById('total');

    // Valor de inicio y valor objetivo del total
    var startValue = 0;
    var targetValue = 100; // Puedes cambiar este valor al total que desees

    // Función para iniciar el incremento
    function startIncrement() {
        var intervalId = setInterval(function() {
            // Incrementar el valor de inicio en 1
            startValue++;

            // Actualizar el valor mostrado en el DOM
            totalElement.textContent = startValue;

            // Detener el incremento cuando se alcance el valor objetivo
            if (startValue === targetValue) {
                clearInterval(intervalId);
            }
        }, 90); // Puedes ajustar el intervalo de tiempo (en milisegundos) para controlar la velocidad de incremento
    }
</script>








<?php
incluirTempleate('footer');
?>