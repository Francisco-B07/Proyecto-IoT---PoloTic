<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 10 - Control de Actuadores</title>
</head>
<body style='font-family: Century gothic; width: 800;'>

    <center>
        <h1>Control de Actuadores</h1>
        <h2>Clase 10</h2>
    <div style='box-shadow: 0px 0px 20px 8px rgba(0,0,0,0.22); padding: 20px; width: 300px; display: inline-block; margin: 30px;'> 
        <h1>SERVO</h1>
        
        <form action="actuadores.php" method="GET">
            <label style="left: auto">Dispositivo: </label>
            <input type="text" name="dispositivo" style="left: auto;"><br>
            <br>
            <label>Servo:</label>
            <input type="text" name="servo"><br>
            <br>

            <button style='background-color:rgb(0, 217, 255);  color:white; border-radius: 10px; border-color: rgb(17, 0, 255);' 
            type='submit'><h2>MOVER SERVO</h2>
            </button>
     
    
    
        </form>
        <br>
        <?php 
        //COMINEZA PHP
        //Insertamos codigo PHP en medio del HTML para mostrar la posición actual del servo
        
        require_once('conexion.php');
        $conn=new conexion();

        //Hago la consulta para obtener los estados
        $querySELECT="SELECT`servo`, `led` FROM `estado` WHERE `dispositivo`= 'node1';";
        //primer parametro la conexion, el segundo la consulta
        $result= mysqli_query($conn->conectardb(),$querySELECT);

        //Creo una variable $row (fila) en la cual vamos a guardar la fila que nos da como resultado la consulta SELECT
        $row=mysqli_fetch_row($result);
        //Esta fila $row va tener las dos posiciones, en la posicion 0 va a estar el valor de servo y en la posicion 1 va a estar el valor de led

        echo "Posición Servo: ".$row[0]."º";
        
        //TERMINA PHP
        ?>

        <h1>LED 1</h1>
       
        <button style='background-color:red;  color:white; border-radius: 10px; border-color: rgb(255, 0, 0);' 
            type='button' onClick=location.href='/secym/led.php?dispositivo=node1&led=0'><h2>Apagar</h2>
        </button>
        <button style='background-color:rgb(94, 255, 0); color:white; border-radius: 10px; border-color: rgb(25, 255, 4);' 
            type='button' onClick=location.href='/secym/led.php?dispositivo=node1&led=1'><h2>Encender</h2>
        </button>
        <br>
        <br>


        <?php
        
        //COMINEZA PHP
        //Insertamos codigo PHP en medio del HTML para mostrar el estado del led
        
        require_once('conexion.php');
        $conn=new conexion();
        $querySELECT="SELECT`servo`, `led` FROM `estado` WHERE `dispositivo`= 'node1';";

        //primer parametro la conexion, el segundo la consulta
        $result= mysqli_query($conn->conectardb(),$querySELECT);

        //Creo una variable $row (fila) en la cual vamos a guardar la fila que nos da como resultado la consulta SELECT
        $row=mysqli_fetch_row($result);
        //Esta fila $row va tener las dos posiciones, en la posicion 0 va a estar el valor de servo y en la posicion 1 va a estar el valor de led

        //Con el estado del led $row[1] armo una estructura if - else if - else para los distintos mensajes
        if($row[1]==1){
            echo "El led se encuentra ENCENDIDO";
            echo "<br>";
            echo "LED=".$row[1];
        }else if($row[1]==0){
            echo "El led se encuentra APAGADO";
            echo "<br>";
            echo "LED=".$row[1];

        }else{
            echo "Valor invalido para led";
            echo "<br>";
            echo "LED=".$row[1];
        }
        
        
        //TERMINA PHP
        ?>
        
    </div>
    
</center>

<a href="http://secym.000webhostapp.com/secym/PaginaPrincipal/Clase%2011%20con%20CSS/">
    <button>VOLVER</button>
</a>

</body>
</html>