<?php
$host = "localhost";
$usuario = "root";
$contrasenia = "majada";
$base_de_datos = "controlcursos";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}