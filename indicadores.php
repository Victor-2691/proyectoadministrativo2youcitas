<?php

session_start();
require 'includes/funciones.php';
incluirTempleate('header_indicadores');
require 'includes/config/database.php';
$db = conectarBD();

$consulta = "SELECT count(*) FROM suspiros";
$ejecutar = mysqli_query($db, $consulta);
$Resultado = mysqli_fetch_assoc($ejecutar);
$TotalSuspiros = $Resultado['count(*)'];

$consulta = "SELECT count(*) FROM likes";
$ejecutar = mysqli_query($db, $consulta);
$Resultado = mysqli_fetch_assoc($ejecutar);
$Totalikes = $Resultado['count(*)'];

$consulta = "
SELECT count(id_cliente) FROM Clientes_Externos where id_genero_pertenece = 1";
$ejecutar = mysqli_query($db, $consulta);
$Resultado = mysqli_fetch_assoc($ejecutar);
$TotalHombres = $Resultado['count(id_cliente)'];

$consulta = "
SELECT count(id_cliente) FROM Clientes_Externos where id_genero_pertenece = 3";
$ejecutar = mysqli_query($db, $consulta);
$Resultado = mysqli_fetch_assoc($ejecutar);
$TotalBinarios = $Resultado['count(id_cliente)'];


$consulta = "
SELECT count(id_cliente) FROM Clientes_Externos where id_genero_pertenece = 2";
$ejecutar = mysqli_query($db, $consulta);
$Resultado = mysqli_fetch_assoc($ejecutar);
$TotalMujeres = $Resultado['count(id_cliente)'];



?>

<main>

    <div class="container_perfil">
        <p hidden id="hiddensuspiros"> <?php echo $TotalSuspiros ?> </p>
        <p hidden id="hiddenlikes"> <?php echo $Totalikes  ?> </p>
        <p hidden id="hiddenHombres"> <?php echo $TotalHombres ?> </p>
        <p hidden id="hiddenBinarios"> <?php echo $TotalBinarios ?> </p>
        <p hidden id="hiddenMujeres"> <?php echo $TotalMujeres ?> </p>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Total Suspiros</h6>
                        <img src="build/img/Suspiro_sinfondo.svg">
                        <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i>
                            <span id="suspiros"> 0 </span>
                        </h2>

                        <!-- <p class="m-b-0">Consultado<span class="f-right">04/18/2023</span></p> -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Coincidencias</h6>
                        <img src="build/img/-F20F10-4--unscreen.gif">
                        <h2 class="text-right"><i class="fa fa-rocket f-left"></i>
                            <span id="coincidencias">0</span>
                        </h2>


                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Total Likes</h6>
                        <img src="build/img/LikeNegro.svg">
                        <h2 class="text-right"><i class="fa fa-refresh f-left"></i>
                            <span id="likes">0</span>
                        </h2>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Usuarios Masculinos</h6>
                        <img src="build/img/Masculino.svg">
                        <h2 class="text-right"><i class="fa fa-credit-card f-left"></i>
                            <span id="masculinos">0</span>
                        </h2>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-binario order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Usuarios Nobinarios</h6>
                        <img src="build/img/Nobinario3.svg">
                        <h2 class="text-right"><i class="fa fa-credit-card f-left"></i>
                            <span id="nobinarios">0</span>
                        </h2>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink2 order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Usuarios Femeninos</h6>
                        <img src="build/img/Femenino.svg">
                        <h2 class="text-right"><i class="fa fa-credit-card f-left"></i>
                            <span id="femeninos">0</span>
                        </h2>

                    </div>
                </div>
            </div>


        </div>

    </div>


</main>

<script>
    function onPageLoad() {
        let totalsuspiroshidden = document.getElementById('hiddensuspiros').innerText;
        let totalikeshidden = document.getElementById('hiddenlikes').innerText;
        let totalhombreshidden = document.getElementById('hiddenHombres').innerText;
        let totalbinarios = document.getElementById('hiddenBinarios').innerText;
        let totalfemenino = document.getElementById('hiddenMujeres').innerText;
        // Obtener el elemento del DOM que muestra el total
        var totalElement = document.getElementById('suspiros');
        var totalcoicidencias = document.getElementById('coincidencias');
        var variableLike = document.getElementById('likes');
        var elementomasculino = document.getElementById('masculinos');
        var elementobinario = document.getElementById('nobinarios');
        var elemenFemenino = document.getElementById('femeninos');

        // Valor de inicio y valor objetivo del total
        var startValue = 0;
        startIncrement(startValue, totalsuspiroshidden, totalElement);
        startIncrement(startValue, 80, totalcoicidencias);
        startIncrement(startValue, totalikeshidden, variableLike);
        startIncrement(startValue, totalhombreshidden, elementomasculino);
        startIncrement(startValue, totalbinarios, elementobinario);
        startIncrement(startValue, totalfemenino, elemenFemenino);


        // Función para iniciar el incremento
        function startIncrement(startValue, totalsuspiros, totalElement) {
            var intervalId = setInterval(function() {
                var valorint = parseInt(totalsuspiros);
                // Incrementar el valor de inicio en 1
                startValue++;

                // Actualizar el valor mostrado en el DOM
                totalElement.textContent = startValue;

                // Detener el incremento cuando se alcance el valor objetivo
                if (startValue === valorint) {

                    clearInterval(intervalId);
                }
            }, 20); // Puedes ajustar el intervalo de tiempo (en milisegundos) para controlar la velocidad de incremento
        }


    }
    // Asociar la función onPageLoad al evento load de window
    window.addEventListener('load', onPageLoad);
</script>

<?php
incluirTempleate('footer');
?>