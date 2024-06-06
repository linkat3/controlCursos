<?php
include_once "../modelo/conectar.php";
include_once "../controlador/Notas.php";
$nota = new Nota($_POST["nota"], $_POST["id_estudiante"], $_POST["tipo"], $_POST["codigo"]);
$nota->guardar();
header("Location: notas_alumnos.php?id=" . $_POST["id_estudiante"]);