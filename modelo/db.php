<?php
  global $conexion;
  $servidor = "localhost";
  $db = "controlcursos";
  $username = "root";
  $password = "majada";

  try {
    $conexion = mysqli_connect($servidor, $username, $password, $db);

  } catch (Exception $e) {
    echo "Conexión fallida: " . $e->getMessage();
  }

?>