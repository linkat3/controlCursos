<?php
include_once "conectar.php";
include_once "../controlador/materias.php";
$materia = new Materia($_POST["nombre"], $_POST["horas_semana"], $_POST["idciclo"], $_POST["codigo"]);
$materia->guardar();
header("Location: mostrar_materia.php");
