<?php
include_once "conectar.php";
include_once "../controlador/Notas.php";
$nota = new Nota($_POST["puntaje"],$_POST["id_estudiante"], $_POST["tipo"],$_POST["id_materia"]);
$nota->guardar();
header("Location: ../vista/asigna_nota_materia.php?id=" . $_GET["id_materia"]);


// $this->puntaje = $puntaje;
//         $this->idEstudiante = $idEstudiante;
//         $this->tipo = $tipo;
//         $this->idMateria = $idMateria;