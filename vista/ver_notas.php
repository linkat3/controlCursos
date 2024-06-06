<?php
include_once "../modelo/conectar.php";
include_once "../vista/componentes/header.php";
include_once "../controlador/Estudiantes.php";
include_once "../controlador/Materias.php";
include_once "../controlador/Notas.php";
require_once("../modelo/session.php");
$userId = $_GET['id'];

// $studentId = $_GET['studentId'];
// $subjectCode = $_GET['subjectCode'];

// Fetch student's grades
$sql = "SELECT c.modulo, c.nota, u.nombre, u.apellido1, u.apellido2
FROM calificaciones c
INNER JOIN usuario u ON c.id_alumno = u.id
WHERE c.modulo = '$subjectCode' AND c.id_alumno = $studentId";
$result = $conn->query($sql);

// Check query result
if ($result->num_rows > 0) {
    echo "<h2>Calificaciones de $subjectCode</h2>";

    // Display grades in table
    echo "<table>
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>";

    while ($row = $result->fetch_assoc()) {
        $fullName = $row['nombre'] . " " . $row['apellido1'] . " " . $row['apellido2'];
        $grade = $row['nota'];

        echo "<tr>
                <td>$fullName</td>
                <td>$grade</td>
            </tr>";
    }

    echo "</tbody>
    </table>";
} else {
    echo "No se encontraron calificaciones para el estudiante y la materia.";
}

// Close database connection
$conn->close();
