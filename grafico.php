

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
    En este grafico podemos ver las variaciones de temperatura en el tiempo
    <br>
  
    <a href="http://localhost/secym/formularioGrafico.html">
        <button>VOLVER</button>
    </a>
    </p>
</figure>

<?php

$dispositivoF=0;
//recibe las variables del formulario
$dispositivoF=$_GET['dispositivo'];
$intervaloF=$_GET['intervalo'];
$mesF=$_GET['mes'];
$diaF=$_GET['dia'];


//Vamos a crearuna funci[on que nos devuelva los datos en el formato que necesitamos para el fr[afico]]

function temperatura_diaria($dispositivo,$intervalo,$mes,$dia){
    require_once('conexion.php');
    $conn=new conexion();
$ano=date("Y");


//Esta es la consulta
//SELECT UNIX_TIMESTAMP(fechaRegistro), `temperatura` FROM `historico` WHERE YEAR(fechaRegistro)='2021' AND MONTH(fechaRegistro)='11' AND DAY(fechaRegistro)='02' AND `dispositivo`='node1';
$queryTemp="SELECT UNIX_TIMESTAMP(fechaRegistro), `temperatura` FROM `historico` WHERE YEAR(fechaRegistro)='$ano' AND MONTH(fechaRegistro)='$mes' AND DAY(fechaRegistro)='$dia'AND `dispositivo`='$dispositivo';";
$resultado= mysqli_query($conn->conectardb(),$queryTemp);


while($row=mysqli_fetch_row($resultado)){
    echo "[";
    echo $row[0]*1000; //multiplico por 1000 porque pide ms
    echo ",";
    echo $row[1];
    echo "],";

    //Cuenta la cantidad de veces el intervalo para salterse filas
    for($x=0;$x<$intervalo;$x++){
        $row=mysqli_fetch_row($resultado);
    }
}

//mysqli_close();
}



//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `temperatura` = '$temp', `humedad` = '$humedad', `servo` = '$servo', `led` = '$led' WHERE `estado`.`dispositivo` = '$dispositivo';";
//$queryUPDATE="UPDATE `estado` SET `led` = '$led' WHERE `estado`.`dispositivo` = '$dispositivo';";

//UPDATE `estado` SET `temperatura` = '50', `humedad` = '30', `servo` = '21', `led` = '1' WHERE `estado`.`dispositivo` = 'node1';
//primer parametro la conexion, el segundo la consulta
//$update= mysqli_query($conn->conectardb(),$queryUPDATE);
//temperatura_diaria("node1","1","11","02");
?>






<script type="text/javascript">



Highcharts.chart('container', {
    chart: {
        type: 'spline',
        zoomType: 'x'
    },
    title: {
        text: 'Electronica Aplicada a IOT'
    },
    subtitle: {
        text: 'Clase 11 - Grafico Historico de Temperatura'
    },
    xAxis: {
        type:'datetime'
       // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Temperatura (°C)'
        }
    },
    /*plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },*/
    series: [{
        name: '<?php echo $dispositivoF ?>',
        data: [
            
         <?php  //temperatura_diaria("node1","1","11","04"); 
         temperatura_diaria($dispositivoF,$intervaloF,$mesF,$diaF);
         
         
         ?>
    
    
    
    ]
    }]
});

</script>