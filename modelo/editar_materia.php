<?php
include_once "conectar.php";
include_once "../controlador/Materias.php";
include_once "../vista/componentes/header.php";
$materia = Materia::obtenerUna($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar materia</h1>
        <form action="actualizar_materia.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="<?php echo $materia->nombre ?>" name="nombre" required type="text" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input value="<?php echo $materia->codigo ?>" name="codigo" required type="text" id="codigo" class="form-control" placeholder="codigo de 3 letras">
            </div>
            <div class="form-group">
                <label for="horas_semanales">Horas Semanales</label>
                <input value="<?php echo $materia->horas_semana ?>" name="horas_semana" required type="text" id="horas_semana" class="form-control" placeholder="horas">
            </div>
            <div class="form-group">
                <button class="btn btn-success m-2" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "../vista/componentes/footer.php" ?>