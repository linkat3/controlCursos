<?php
include_once "../modelo/conectar.php";
include_once "../vista/componentes/header.php";
include_once "../controlador/Estudiantes.php";
include_once "../controlador/Materias.php";
include_once "../controlador/Notas.php";
$estudiante = Estudiante::obtenerUno($_GET["id"]);
$materias = Materia::obtener();
$notas = Nota::obtenerDeEstudiante($estudiante->id);
$materiasConCalificacion = Nota::combinar($materias, $notas);
?>
<div class="row">
    <div class="col-12">
        <h1>Notas de <?php echo $estudiante->nombre ?></h1>
    </div>
    <div class="col-12 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumatoria = 0;
                foreach ($materiasConCalificacion as $materia) {
                    // $sumatoria += $materia["nota"];
                    $sumatoria += intval($materia["nota"]);

                ?>
                    <tr>
                        <td>
                            <?php echo $materia["nombre"] ?>
                        </td>
                        <td>
                            <form action="../modelo/modificar_nota.php" method="POST" class="form-inline">
                                <input type="hidden" value="<?php echo $estudiante->id ?>" name="id_estudiante">
                                <input type="hidden" value="Alumno" name="tipo">
                                <input type="hidden" value="<?php echo $materia["codigo"] ?>" name="codigo">
                                <input value="<?php echo $materia["nota"] ?>" required min="0" name="nota" placeholder="Escriba la calificación" type="number" class="form-control">
                                <button class="btn btn-success mx-2">Guardar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Promedio</td>
                    <td>
                        <strong>
                            <?php
                            $promedio = $sumatoria / count($materias);
                            echo $promedio;
                            ?>
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php
include_once "../vista/componentes/footer.php";