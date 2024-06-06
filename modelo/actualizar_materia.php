<?php
include_once "conectar.php";
include_once "../controlador/Materias.php";
$materia = new Materia($_POST["nombre"], $_POST["horas_semana"], $_POST["codigo"], $_POST["id"]);
$materia->actualizar();
header("Location: mostrar_materia.php");