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
echo $TotalSuspiros;

?>

<main>

    <div class="container_perfil">
        <p hidden id="hiddensuspiros"> <?php echo $TotalSuspiros ?> </p>
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
                        <h6 class="m-b-20">Me gustas enviados</h6>
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
        console.log(totalsuspiroshidden)
        // Obtener el elemento del DOM que muestra el total
        var totalElement = document.getElementById('suspiros');
        var totalElement = document.getElementById('coincidencias');
  
        // Valor de inicio y valor objetivo del total
        var startValue = 0;
        startIncrement(totalsuspiroshidden,totalElement);
        
        
        
        // Función para iniciar el incremento
        function startIncrement(totalsuspiros,totalElement ) {
            var intervalId = setInterval(function() {
                var valorint = parseInt(totalsuspiros);
                console.log(valorint);
                // Incrementar el valor de inicio en 1
                startValue++;

                // Actualizar el valor mostrado en el DOM
                totalElement.textContent = startValue;

                // Detener el incremento cuando se alcance el valor objetivo
                if (startValue === valorint) {

                    clearInterval(intervalId);
                }
            }, 30); // Puedes ajustar el intervalo de tiempo (en milisegundos) para controlar la velocidad de incremento
        }


    }
    // Asociar la función onPageLoad al evento load de window
    window.addEventListener('load', onPageLoad);
</script>

<?php
incluirTempleate('footer');
?>