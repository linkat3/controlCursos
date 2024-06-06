<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fechaActual = date('Y-m-d'); // Get current date
    $studentId = $_POST['estudiante_id']; 
    $attendanceType = $_POST['attendance'][$studentId]; 
    $modulo = $_POST['modulo']; 
    $comentarios = $_POST['comentarios'];
    $tipo = "Alumno"; // parametro pasado fijo

    if (isset($_POST['attendance']) && is_array($_POST['attendance'])) {
        // Connect to your MySQL database
        include_once("../modelo/db.php");

        // Prepare SQL statement (using prepared statement)
        $sql = "INSERT INTO asiste (fecha, alumnos_id_codigo, tipo, modulo, motivo, comentarios) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        try {
            // Process attendance data for each student
            foreach ($_POST['attendance'] as $studentId => $attendanceType) {
                $fechaActual = date('Y-m-d'); // fecha en formato YYYY-MM-DD 
                var_dump($fechaActual, $studentId, $tipo, $modulo, $comentarios, $attendanceType); 
                $stmt->debug_stmt; // Log executed SQL statement
                // Bind parameters
                $stmt->bind_param('sissss', $fechaActual, $studentId, $tipo, $modulo, $attendanceType, $comentarios);

                $stmt->execute();
            }
            echo 'Guardado exitosamente!';
            header("location: asistencia_alumnos.php");
        } catch (mysqli_sql_exception $e) {
            // Mensaje de error
            echo 'Error saving attendance: ' . $e->getMessage();
        }

        // Close the statement (optional, might be closed automatically)
        $stmt->close();
    }
}

?>