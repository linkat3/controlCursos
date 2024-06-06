<?php
// Table: calificaciones
// Columns:
// modulo char(3) PK 
// id_alumno bigint PK 
// tipo varchar(10) PK 
// nota decimal(4,2)
class Nota
{
    private $nota, $idEstudiante, $idMateria, $tipo;

    public function __construct($nota, $idEstudiante, $tipo, $idMateria)
    {
        $this->nota = $nota;
        $this->idEstudiante = $idEstudiante;
        $this->tipo = $tipo;
        $this->idMateria = $idMateria;
    }

    public function guardar()
    {
        global $mysqli;
        // La eliminamos en caso de que exista
        $this->eliminar();
        // Y siempre la insertamos. No importa si es la primera vez o es una actualización
        $sentencia = $mysqli->prepare("INSERT INTO calificaciones
            (id_alumno, tipo, modulo, nota)
                VALUES
                (?, ?, ?)");
        $sentencia->bind_param("issd", $this->idEstudiante, $this->tipo, $this->idMateria, $this->nota);
        $sentencia->execute();
    }

    public static function obtenerDeEstudiante($idEstudiante)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT modulo, id_alumno, tipo, nota FROM calificaciones WHERE id_alumno = ?");
        $sentencia->bind_param("i", $idEstudiante);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function combinar($modulos, $notas) {
        $materiasConCalificacion = []; // Initialize an empty array to store subject-grade pairs
      
        for ($x = 0; $x < count($modulos); $x++) {
          $subjectCode = $modulos[$x]["codigo"];
          $subjectName = $modulos[$x]["nombre"];
          $subjectGrades = []; // Initialize an empty array to store grades for the current subject
      
          // Get grades for the current subject (assuming 'nota' is the grade key)
          $notasMateria = self::obtenerCalificacion($notas, $subjectCode);
      
          foreach ($notasMateria as $nota) {
            $gradeExists = false; // Flag to check if grade already exists
      
            // Check if grade already exists in the array
            foreach ($subjectGrades as $existingGrade) {
                if (is_array($existingGrade) && isset($existingGrade['nota']) && is_array($nota) && isset($nota['nota'])) {
                    if ($existingGrade['nota'] === $nota['nota']) {
                $gradeExists = true;
                break; // Exit inner loop if grade found
              }
              } else {
  // Handle unexpected data structures or missing keys
}
            }
      
            if (!$gradeExists) {
              $subjectGrades[] = $nota; // Add grade only if it doesn't exist
            }
          }
      
          // Create a new entry with subject details and grades array
          $materiaConCalificacion = [
            "nombre" => $subjectName,
            "codigo" => $subjectCode,
            "nota" => $subjectGrades, // Store unique grades only
          ];
      
          // Add the subject-grade pair to the main array
          $materiasConCalificacion[] = $materiaConCalificacion;
        }
      
        return $materiasConCalificacion;
      }
      
    
    private static function obtenerCalificacion($puntajes, $idMateria)
    {
        $notas = [];
        foreach ($puntajes as $puntaje) {
            $moduloValue = $puntaje["modulo"]; // Store the value before conversion
            if (is_numeric($moduloValue)) { // Check if it's numeric
                $moduloValue = floatval($moduloValue); // Convert to float
            }
            if (floatval($moduloValue) === floatval($idMateria)) {
                $notas[] = $puntaje["nota"];
            }
        }
        return $notas;
    }

    public function eliminar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM calificaciones WHERE id_alumno = ? AND modulo = ?");
        $sentencia->bind_param("is", $this->idEstudiante, $this->idMateria);
        $sentencia->execute();
    }

    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update calificaciones set nota = ? where id_alumno = ? AND modulo =?");
        $sentencia->bind_param("ids", $this->nota, $this->idEstudiante, $this->idMateria);
        $sentencia->execute();
    }


    public static function obtenerNotas($nota, $modulo)
    {
        global $conexion;

        $sentencia = $conexion->prepare("SELECT * from calificaciones where id_alumno = ?, tipo=? AND modulo=? ");
        $sentencia->bind_param('iss', $nota, $modulo);

        $sentencia->execute();
        $nota = $sentencia->fetch_assoc();
        return $nota;

        // SELECT * FROM calificaciones WHERE id_alumno=1 AND modulo='BAE';

    }


}
