<?php
include_once "../modelo/conectar.php";
include_once "../vista/componentes/header.php";
include_once "../controlador/Estudiantes.php";
include_once "../controlador/Materias.php";
include_once "../controlador/Notas.php";
require_once("../modelo/session.php");
$userId = $_GET['id'];
$estudiante = Estudiante::obtenerUno($userId);
$materias = Materia::obtener();
$notas = Nota::obtenerDeEstudiante($estudiante->id);
$materiasConCalificacion = Nota::combinar($materias, $notas);
?>
<div class="row">
    <div class="col-12 badge bg-info m-2">
        <h1>Notas de <?php echo $estudiante->nombre ?>
        <?php echo '' ?>
        <?php echo $estudiante->apellido1?>
        <?php echo '' ?>
        <?php echo $estudiante->apellido2?>
    </h1>
    </div>
    <div class="col-12 m-2">
        <table class="table table-responsive table-primary table-striped text-center">
            <thead class="table-dark">
                <tr class="table-active fs-4">
                    <th>Materia</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody class="fs-5">
                <?php
                $sumatoria = 0;
                foreach ($notas as $nota) {
                    $sumatoria += $nota["nota"];
                ?>
                    <tr>
                        <td><?php echo $nota["modulo"] ?></td>
                        <td><?php echo $nota["nota"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot class="fs-5">
                <tr>
                    <td><strong>Promedio</strong></td>
                    <td>
                        <?php
                        $promedio = $sumatoria / (count($notas));                                           
                        ?>
                        <strong><?php echo $promedio; ?></strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script src="../js/app.js"></script>
<script src="../js/java.js"></script>
<?php include("componentes/footer_login.php") ?>