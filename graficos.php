<?php
session_start();
require 'includes/funciones.php';
incluirTempleate('header_indicadores');
require 'includes/config/database.php';
$db = conectarBD();

$consulta = "SELECT DAYNAME(fecha_registro) AS dia_semana, COUNT(*) AS cantidad_ventas
FROM Usuarios_Clientes_Externo
GROUP BY DAYNAME(fecha_registro)";
$ejecutar = mysqli_query($db, $consulta);
foreach ($ejecutar as $key => $opciones) :
    if ($opciones['dia_semana'] == 'Monday') {
        $lunes = $opciones['cantidad_ventas'];
    }
    if ($opciones['dia_semana'] == 'Tuesday') {
        $martes = $opciones['cantidad_ventas'];
    }
    if ($opciones['dia_semana'] == 'Wednesday') {
        $miercoles = $opciones['cantidad_ventas'];
    }

    if ($opciones['dia_semana'] == 'Thursday') {
        $jueves = $opciones['cantidad_ventas'];
    }

    if ($opciones['dia_semana'] == 'Friday') {
        $viernes = $opciones['cantidad_ventas'];
    }

    if ($opciones['dia_semana'] == 'Saturday') {
        $sabado = $opciones['cantidad_ventas'];
    }

    if ($opciones['dia_semana'] == 'Sunday') {
        $domingo = $opciones['cantidad_ventas'];
    }


endforeach;

?>
<main class="main">
    <p hidden id="l"> <?php echo $lunes ?> </p>
    <p hidden id="m"> <?php echo $martes ?> </p>
    <p hidden id="k"> <?php echo $miercoles ?> </p>
    <p hidden id="j"> <?php echo $jueves ?> </p>
    <p hidden id="v"> <?php echo $viernes ?> </p>
    <p hidden id="s"> <?php echo $sabado ?> </p>
    <p hidden id="d"> <?php echo $domingo ?> </p>
    <div class="contenedor_principal">
        <div class="contenedor_graficos">
        <div class="contenidografico">
                <canvas id="registroUsuarios"></canvas>
            </div>
            <div class="contenidografico">
           
                <canvas id="graficoPie"></canvas>
            </div>

          
        </div>

    </div>
</main>
<script>

</script>


<script>

</script>

<script>
    function onPageLoad() {
        //   datos 
        let l = document.getElementById('l').innerText;
        let m = document.getElementById('k').innerText;
        let k = document.getElementById('m').innerText;
        let j = document.getElementById('j').innerText;
        let v = document.getElementById('v').innerText;
        let s = document.getElementById('s').innerText;
        let d = document.getElementById('d').innerText;
        // 

        
        const ctx2 = document.getElementById('registroUsuarios');
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                datasets: [{
                    label: 'Registros de Usuarios',
                    data: [l, k, m, j, v, s, d],
                    fill: false,
                    backgroundColor: [
                        'rgb(255, 87, 87)',

                    ],
                    tension: 0.1,

                }]
            },
            options: {


            }
        });


        // Datos del gráfico
        var datos = {
            labels: ['18 Años', '23 Años', '21 Años', '31 Años', '45 Años'],
            datasets: [{
                data: [8, 6, 5, 4, 3], // Datos numéricos
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'], // Colores de fondo
                hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'] // Colores de fondo al pasar el cursor
            }]
        };

        // Opciones del gráfico
        var opciones = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Distribución de edad'
                }
            }
        };





        // Crear el gráfico de tipo Pie
        var ctx = document.getElementById('graficoPie').getContext('2d');
        var graficoPie = new Chart(ctx, {
            type: 'pie',
            data: datos,
            options: opciones

        });

        // 



    }
    // Asociar la función onPageLoad al evento load de window
    window.addEventListener('load', onPageLoad);
</script>



<?php
incluirTempleate('footer');
?>