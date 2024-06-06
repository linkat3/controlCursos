<?php
require_once "db.php";

class Profesor
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new DB;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    // Obtiene todos los datos de la tabla de usuario-profesor
    public function listar() {
        try {
            $resultado = $this->pdo->conexion()->prepare("SELECT * FROM usuario WHERE tipo=Profesor limit 4");
            $resultado->execute();
            return $resultado->fetchall(PDO::FETCH_OBJ);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }

    //añadir un profesor
    // Insertar comentario en tabla comentario
    public function agregar() {
        try {
            $sql = "INSERT into usuario (nombre,apellido1,apellido2,username,email,direccion,telef) values (:rating,:fecha,:comentario,:alias,:email,:options)";
            return $this->pdo->conexion()->prepare($sql)->execute((array) $_POST);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
}

/*if ($_POST) {
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $sexo = (isset($_POST['sexo']) ? $_POST['sexo'] : "");
    $edad = (isset($_POST['edad']) ? $_POST['edad'] : "");
    $tipo = (isset($_POST['tipo']) ? $_POST['tipo'] : "");
    $foto = (isset($_POST['foto']) ? $_POST['foto'] : "");


    $stm = $conexion->prepare("INSERT INTO mascotas(idmascotas,nombre,sexo,edad,tipo,foto)
    VALUES(null,:nombre,:sexo,:edad,:tipo,:foto)");
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":sexo", $sexo);
    $stm->bindParam(":edad", $edad);
    $stm->bindParam(":tipo", $tipo);
    $stm->bindParam(":foto", $foto);
    $stm->execute();    
}*/

?>
<!-- Modal Crear -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="nombre" placeholder="Ingresa nombre">

                    <label for="">Sexo</label>
                    <input type="text" class="form-control" name="sexo" value="sexo" placeholder="Ingresa el sexo, f / m">

                    <label for="">Edad</label>
                    <input type="text" class="form-control" name="edad" value="edad" placeholder="Ingresa la edad en numeros">

                    <label class="p-2" for="tipo">Elige el tipo o raza:</label>
                    <select name="tipo" id="tipo">
                        <option value="beagle">Beagle</option>
                        <option value="bardino">Bardino</option>
                        <option value="bulldog">Bulldog</option>
                        <option value="dalmata">Dalmata</option>
                        <option value="yorshire">Yorshire</option>
                        <option value="pitbull">Pitbull</option>
                        <option value="doberman">Doberman</option>
                        <option value="mestizo" selected>Mestizo</option>

                    </select>
                    <br>
                    <!-- <label for="">Tipo</label>
                    <input type="text" class="form-control" name="tipo" value="tipo" placeholder="Ingresa la raza o indica tipo"> -->

                    <label for="">Foto</label>
                    <input type="text" class="form-control" name="foto" value="foto" placeholder="url o dirección de la foto">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>