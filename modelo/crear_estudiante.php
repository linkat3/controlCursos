<?php
include_once "conectar.php";
include_once "../controlador/estudiantes.php";
$estudiante = new Estudiante($_POST["tipo"],$_POST["username"],$_POST["email"], $_POST["clave"],
$_POST["nIdentidad"], $_POST["nombre"], $_POST["apellido1"], $_POST["apellido2"], $_POST["cial"],
$_POST["direccion"], $_POST["telef"], $_POST["fecha_creacion"], $_POST["foto"]);
$estudiante->guardar();
header("Location: ../vista/lista_alumnos.php");

 ?>