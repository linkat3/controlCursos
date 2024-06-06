<!-- Consultar las asistencias, faltas, retrasos del alumno -->
<?php include("./componentes/header.php") ?>
<?php
include("../modelo/db.php");
require_once("../modelo/session.php");
$userId = $_GET['id'];

include_once "../controlador/estudiantes.php";
if (isset($_GET['id'])) {
    $id = $_GET['id']; // pasando el codigo desde parametro url
} else {
    // mensaje error
    die('Missing codigo parameter');
}
$asistencias = Estudiante::obtenerAsistencia($id); // Recuperando las asistencias del alumno
// $estudiante = Estudiante::obtener();

// Consultar las cantidades de faltas
$query = "SELECT COUNT(motivo) FROM asiste WHERE alumnos_id_codigo=? AND motivo='Falta';";
$stmt = $conexion->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_row(); 
$totalFaltas = $row[0];
?>
<?php
if ($asistencias->num_rows > 0) {
    // Process and display data
    echo "<h1>Consulta de inasistencias del Alumno </h1>";
    echo '<div class="table-responsive">';
    echo "<table class='table'>";
    echo '<thead class="table-dark">
    <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Módulo</th>
        <th scope="col">Motivo</th>
        <th scope="col">Comentarios</th>
    </tr>
    </thead>
    <tbody>';

    while ($row = $asistencias->fetch_object()) {
        echo '<tr>';
        echo '<td>' . $row->fecha . '</td>';
        echo '<td>' . $row->modulo . '</td>';
        echo '<td>' . $row->motivo . '</td>';
        echo '<td>' . $row->comentarios . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '<div class="d-flex justify-content-end m-2">';
    echo '<span class="bg-dark text-light p-1">Total de faltas del modulo  </span>';
    echo '<span class="bg-dark text-warning p-1">' . $totalFaltas . '</span>';
    echo '</div>';
    echo '<a href="ver.php?id='.$userId.'" class="btn btn-warning btn-md m-1"> Volver</a>';

} else {
    echo "No se encontraron registros de asistencia para el alumno con ID: " . $id;
}

// Close the statement and connection
$conexion->close();
?>

<?php include("./componentes/footer.php") ?>