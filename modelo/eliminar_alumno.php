<?php
include_once "conectar.php";
include_once "../controlador/estudiantes.php";


if (isset($_POST['id'])) {
    $id = $_POST['id']; // Access the id only if it exists
    Estudiante::eliminar($_GET["id"]);
    header("Location: ../vista/lista_alumnos.php");

} else {
    // Handle the case where id is missing
    echo "";
}