<?php

class conexion{
   
    //DB Local
    /*
    const user='root'; //nombre de usuario de la DB
    const pass=''; //Contraseña de la DB
    const db='iot01'; // Nombre de la DB
    const servidor='LOCALHOST'; //Nombre del HOST
    */

    //BD en 000WebHost
    const user='id18089198_admin';
    const pass='tHZ2z(POmgaSaYx)rX(w';//CONTRASEÑA QUE CREAMOS EN LA BD
    const db='id18089198_iot01';
    const servidor='localhost';

    public function conectardb(){
        $conectar = new mysqli(self::servidor, self::user,self::pass,self::db);
        if($conectar->connect_error){
            die("Error en la conexion".$conectar->connect_error);
        }
        return $conectar;
    }  
    
    public function desconectarDB(){
        

        mysqli_close();
    }  
}

?>

