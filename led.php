<?php
//Este archivo solo actualiza el estado del LED

//Con esta instruccion hago que vuelva a cargar la pagina actuadoresCSS.html una vez que hace el envio de los datos
header('Location: http://secym.000webhostapp.com/secym/actuadores_color.php');


require_once('conexion.php');


$dispositivo=$_GET['dispositivo'];
$led=$_GET['led'];


$conn=new conexion();


//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `temperatura` = '$temp', `humedad` = '$humedad', `servo` = '$servo', `led` = '$led' WHERE `estado`.`dispositivo` = '$dispositivo';";
$queryUPDATE="UPDATE `estado` SET `led` = '$led' WHERE `estado`.`dispositivo` = '$dispositivo';";

//UPDATE `estado` SET `temperatura` = '50', `humedad` = '30', `servo` = '21', `led` = '1' WHERE `estado`.`dispositivo` = 'node1';
//primer parametro la conexion, el segundo la consulta
$update= mysqli_query($conn->conectardb(),$queryUPDATE);

?>