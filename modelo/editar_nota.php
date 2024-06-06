<?php
include_once "conectar.php";
include_once "../controlador/Notas.php";
$nota = new Nota($_POST["nota"], $_POST["idEstudiante"], $_POST["modulo"], $_POST["tipo"]);
$nota->actualizar();
header("Location: ../vista/asigna_nota_materia.php?id=" . $_GET["modulo"]);


