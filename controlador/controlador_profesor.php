<?php
Class Profesor
{
    private $nombre, $apellido1, $apellido2, $email, $nIdentidad, $id, $tipo, $direccion, $telef;

    public function __construct($nombre, $apellido1, $apellido2, $email, $nIdentidad, $direccion, $telef, $id, $tipo = null)
    {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->email = $email;
        $this->nIdentidad = $nIdentidad;
        $this->direccion = $direccion;
        $this-> telef = $telef;

        if ($id){
            $this->id=$id;
        }
    }

    public function guardar()
    {
        global $conexion;
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $sentencia = $conexion->prepare("INSERT INTO usuario
        (nombre, apellido1, apellido2, email, nIdentidad, tipo, direccion, telef)
        VALUES (?,?,?,?,?,?,?,?)");

        $sentencia->bind_param("ss", $this->nombre, $this->apellido1, $this->apellido2, 
        $this->email, $this->nIdentidad, $this->tipo, $this->direccion, $this->telef);
        $sentencia->execute();
    }

    public static function obtener()
    {
        global $conexion;
        $resultado = $conexion->query("SELECT * FROM usuario where tipo='Profesor'");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerUno($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("SELECT id, nombre, apellido1, apellido2 FROM usuario WHERE id = ? AND tipo='Profesor'");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }

    public function actualizar()
    {
        global $conexion;
        $sentencia = $conexion->prepare("update usuarios set nombre = ?, apellido1 = ?, apellido2 = ?, email = ?, direccion = ?, telef = ? where id = ?");
        $sentencia->bind_param("ssi", $this->nombre, $this->apellido1, $this->apellido2, $this->email, $this->direccion, $this-> telef, $this->id);
        $sentencia->execute();
    }

    public static function eliminar($id)
    {
        global $conexion;
        $sentencia = $conexion->prepare("DELETE FROM usuario WHERE id = ? AND tipo='Profesor'");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    }

}   