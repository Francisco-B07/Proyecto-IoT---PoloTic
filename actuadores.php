<?php

//Con esta instruccion hago que vuelva a cargar la pagina actuadoresCSS.html una vez que hace el envio de los datos
//http://localhost/secym/actuadoresCSS.html
//header('Location: http://192.168.0.6/secym/actuadoresCSS.html');
//https://secym.000webhostapp.com/secym/actuadoresCSS.html


header('Location: http://secym.000webhostapp.com/secym/actuadores_color.php');
require_once('conexion.php');


$dispositivo=$_GET['dispositivo'];
$servo=$_GET['servo'];
//$led=$_GET['led'];


$conn=new conexion();


//Hacemos la consulta de SQL para actualizar tabla ESTADO
//$queryUPDATE="UPDATE `estado` SET `temperatura` = '$temp', `humedad` = '$humedad', `servo` = '$servo', `led` = '$led' WHERE `estado`.`dispositivo` = '$dispositivo';";
$queryUPDATE="UPDATE `estado` SET `servo` = '$servo' WHERE `estado`.`dispositivo` = '$dispositivo';";

//UPDATE `estado` SET `temperatura` = '50', `humedad` = '30', `servo` = '21', `led` = '1' WHERE `estado`.`dispositivo` = 'node1';
//primer parametro la conexion, el segundo la consulta
$update= mysqli_query($conn->conectardb(),$queryUPDATE);


//Hacemos la consulta de SQL para filtrar el estado de la tarjeta
$querySELECT="SELECT`servo`, `led` FROM `estado` WHERE `dispositivo`= 'node1';";

//INSERT INTO `historico` (`dispositivo`, `temperatura`, `humedad`, `servo`, `led`, `fechaRegistro`) VALUES ('node1', '11', '11', '11', '1', '2021-11-02 15:23:19.000000');
//primer parametro la conexion, el segundo la consulta
$result= mysqli_query($conn->conectardb(),$querySELECT);

//Creo una variable $row (fila) en la cual vamos a guardar la fila que nos da como resultado la consulta SELECT
$row=mysqli_fetch_row($result);
//Esta fila $row va tener las dos posiciones, en la posicion 0 va a estar el valor de servo y en la posicion 1 va a estar el valor de led



//echo "Datos Recibidos <br>";
//echo "Dispositivo:" .$dispositivo ."  SERVO: " .$row[0] ."  LED: ".$row[1];
echo "{SERVO:".$row[0].",LED:".$row[1]."}";
//echo "Dispositivo:" .$dispositivo ."temperatura: " .$temp ."humedad: ".$humedad;




?>