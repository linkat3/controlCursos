<?php
class Materia
{
    private $nombre, $id, $idciclo, $horas_semana;

    public function __construct($nombre, $horas_semana, $idciclo, $id = null)
    {
        $this->nombre = $nombre;
        $this->horas_semana = $horas_semana;
        $this->idciclo = $idciclo;
        if ($id) {
            $this->id = $id;
        }
    }

    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO modulo
            (codigo, nombre, horas_semana, idciclo)
                VALUES
                (?, ?, ?, ?)");
        $sentencia->bind_param("ssii", $this->id, $this->nombre, $this->horas_semana, $this->idciclo);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT codigo, nombre, horas_semana FROM modulo");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUna($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT codigo, nombre, horas_semana FROM modulo WHERE codigo = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update modulo set nombre = ?, horas_semana = ?, codigo = ? where codigo = ?");
        $sentencia->bind_param("siss", $this->nombre, $this->horas_semana, $this->id, $this->id, );
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM modulo WHERE codigo = ?");
        $sentencia->bind_param("s", $id);
        $sentencia->execute();
    }
}