<?php
global $conexion;
$servidor="localhost";
$db="controlCursos";
$username="root";
$password="majada";

try {
    $conexion=new PDO("mysql:host=$servidor;dbname=$db",$username,$password);
}catch (Exception $e){
    echo $e;
}

?>