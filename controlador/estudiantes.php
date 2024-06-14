<?php
class Estudiante
{
    private $username, $email, $cial, $clave, $fecha_creacion, $tipo, $nIdentidad, $nombre, $apellido1, $apellido2, $id, $direccion, $telef, $foto;

    public function __construct($username, $email, $clave, $fecha_creacion, $nIdentidad, $nombre, $apellido1, $apellido2, $cial, $direccion, $telef, $tipo, $foto, $id = null)
    {
        $this->username = $username; //1
        $this->email = $email; //2
        $this->clave = $clave; //3
        $this->fecha_creacion = $fecha_creacion; //4
        $this->nIdentidad = $nIdentidad; //5
        $this->nombre = $nombre; //6
        $this->apellido1 = $apellido1; //7
        $this->apellido2 = $apellido2; //8
        $this->cial = $cial; //9
        $this->direccion = $direccion; //10
        $this->telef = $telef; //11
        $this->tipo = $tipo; //12
        $this->foto = $foto; //13

        if ($id) {
            $this->id = $id;
        }
    }
    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO usuario
            (tipo, username, email, clave, nIdentidad, nombre, apellido1, apellido2, cial,
            direccion, telef,fecha_creacion, foto)
                VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sentencia->bind_param(
            "sssssssssssss",
            $this->username,
            $this->email,
            $this->clave,
            $this->fecha_creacion,
            $this->nIdentidad,
            $this->nombre,
            $this->apellido1,
            $this->apellido2,
            $this->cial,
            $this->direccion,
            $this->telef,
            $this->tipo,
            $this->foto
        );
        try {
            $sentencia->execute();
            if ($sentencia->affected_rows > 0) {
                // Handle successful insertion
                echo "Estudiante creado con éxito";
            } else {
                // Handle failed insertion (other than duplicate error)
                echo "Error al crear el estudiante";
            }
        } catch (mysqli_sql_exception $e) {
            // Handle duplicate entry error
            if ($e->getCode() === 1062) { // Check for duplicate key error code
                $message = "Error: Ya existe un estudiante con ese número de identificación";
            } else {
                $message = "Error: " . $e->getMessage(); // Generic error message
            }

            echo $message; // Display the custom error message
        }
        $sentencia->close();
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT * FROM usuario where tipo='Alumno'");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerUno($id)
    {
        global $mysqli;

        $sentencia = $mysqli->prepare("SELECT * FROM usuario WHERE id = ? AND tipo='Alumno'");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }

    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update usuario set username = ?, email = ?, nIdentidad = ?, nombre = ?, apellido1 = ?, apellido2 = ?, direccion = ?, telef = ?, foto = ? WHERE id = ?");
        $sentencia->bind_param("sssssssssi", $this->username, $this->email, $this->nIdentidad, $this->nombre, $this->apellido1, $this->apellido2, $this->direccion, $this->telef, $this->foto, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM usuario WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }

    //para mostrar la materia escogida y fijar asistencia
    public static function obtenerMateria($codigo)
    {
        global $conexion;

        $sql = "SELECT usuario.*, modulo.codigo AS materia_codigo FROM usuario LEFT JOIN modulo ON usuario.id = modulo.iduser INNER JOIN calificaciones 
    ON calificaciones.id_alumno = usuario.id WHERE calificaciones.modulo = ?";
        $stmt = $conexion->prepare($sql);

        $stmt->bind_param('s', $codigo);

        $stmt->execute();
        $resultado = $stmt->get_result();
        $materias = $resultado->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $materias;
    }

    //consultar faltas por alumno
    public static function obtenerAsistencia($id)
    {
        global $conexion;

        $sentencia = $conexion->prepare("SELECT * from asiste where alumnos_id_codigo = ?");
        $sentencia->bind_param('s', $id);

        $sentencia->execute();
        $asistencia = $sentencia->get_result();

        return $asistencia;
    }

    //notas de alumnos por materia
    public static function obtenerNotas($modulo)
    {
        global $conexion;

        $sentencia = $conexion->prepare("SELECT nombre,apellido1, apellido2, nota FROM usuario INNER JOIN calificaciones
        ON usuario.id = calificaciones.id_alumno  WHERE modulo = ?");
        $sentencia->bind_param('s', $modulo);
        $sentencia->execute();
        $notas = $sentencia->get_result();
        return $notas;

    }
}
