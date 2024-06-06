<?php
include_once "conectar.php";
include_once "../controlador/estudiantes.php";
$estudiante = new Estudiante($_POST["tipo"],$_POST["username"],$_POST["email"],
$_POST["nIdentidad"], $_POST["nombre"], $_POST["apellido1"], $_POST["apellido2"],
$_POST["cial"], $_POST["direccion"], $_POST["telef"], $_POST["foto"],
$_POST["clave"],$_POST["id"]);
$estudiante->actualizar();
header("Location: ../vista/lista_alumnos.php");


