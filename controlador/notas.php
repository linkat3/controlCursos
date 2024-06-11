<?php
class Nota
{
    private $puntaje, $idEstudiante, $idMateria, $tipo;

    public function __construct($puntaje, $idEstudiante, $tipo, $idMateria)
    {
        $this->puntaje = $puntaje;
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
            (?, ?, ?, ?)");
        $sentencia->bind_param("issd", $this->idEstudiante, $this->tipo, $this->idMateria, $this->puntaje);        
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

    public static function combinar($materias, $notas)
    {
        for ($x = 0; $x < count($materias); $x++) {
            $materias[$x]["nota"] = self::obtenerCalificacion($notas, $materias[$x]["codigo"]);
        }
        return $materias;
    }

    private static function obtenerCalificacion($notas, $idMateria)
    {
        foreach ($notas as $nota) {
            if (intval($nota["modulo"]) === intval($idMateria)) {
                return $nota["nota"];
            }
        }
        return 0;
    }


    public function eliminar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM calificaciones WHERE id_alumno = ? AND modulo = ?");
        $sentencia->bind_param("is", $this->idEstudiante, $this->idMateria);
        $sentencia->execute();
    }

    
}