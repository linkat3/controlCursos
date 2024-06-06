<?php include("./componentes/header.php") ?>
<?php
include("../modelo/db.php");
require_once("../modelo/session.php");

include_once "../controlador/estudiantes.php";
if (isset($_GET['id'])) {
    $codigo = $_GET['id']; // pasando el codigo desde parametro url
} else {
    // mensaje error
    die('Missing codigo parameter');
}
$estudiantes = Estudiante::obtenerMateria($codigo);

?>
<div class="d-flex justify-content-end">
        <a href="asistencia_alumnos.php" class="btn btn-primary m-1">
            Volver
        </a>
</div>

<!-- Consulta de los alumnos de esta materia -->
<div class="p-4 mb-3 bg-light rounded-3">
    <div class="container-fluid py-2">
        <h1 class="display-5 fw-bold">Listado de Alumnos</h1>
        <div class="d-flex justify-content-center">
            <h2 class="badge bg-dark fs-2 text-warning">De <?php echo $codigo; ?> </h2>
        </div>
        <div class="row g-4">
            <!-- <?php foreach ($estudiantes as $estudiante) {
                        $estudianteId = $estudiante['id']; // guardar el id del alumno
                    ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 w-100 shadow">
                        <div class="card-img-top">
                            <div class="d-flex justify-content-end p-2">
                                <form action="" method="POST">
                                    <div class="form-check form-check-inline border-1 text-danger">
                                        <input class="form-check-input border border-danger" type="checkbox" id="falta" value="falta">
                                        <label class="form-check-label" for="falta">Marcar Falta</label>
                                    </div>
                                    <div class="form-check form-check-inline text-warning">
                                        <input class="form-check-input border border-warning" type="checkbox" id="retraso" value="retraso">
                                        <label class="form-check-label" for="retraso">Marcar Retraso</label>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body bg-dark">
                            <div hidden><?php echo $estudiante['id']; ?></div>
                            <div class="text-light">
                                <h5 class="card-title text-primary">Nombre: <?php echo $estudiante['nombre']; ?></h5>
                                <h5>Primer Apellido: <?php echo $estudiante['apellido1']; ?></h5>
                                <h5>Segundo Apellido: <?php echo $estudiante['apellido2']; ?></h5>
                                <h5>Email: <?php echo $estudiante['email']; ?></h5>
                            </div>
                            <a href="./ver-detalles.php?id=<?php echo $estudiante['id']; ?>" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>
            <?php } ?> -->
            <?php foreach ($estudiantes as $estudiante) {
                $estudianteId = $estudiante['id'];
            ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 w-100 shadow">
                        <div class="card-img-top">
                            <div class="d-flex justify-content-end p-2">
                                <form action="controlar_asistencia.php" method="POST">
                                    <input type="hidden" name="estudiante_id" value="<?php echo $estudianteId; ?>">
                                    <input type="hidden" name="modulo" value="<?php echo $codigo; ?>">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline border-1 text-danger">
                                            <input class="form-check-input border border-danger" type="checkbox" id="falta-<?php echo $estudianteId; ?>" value="Falta" name="attendance[<?php echo $estudianteId; ?>]">
                                            <label class="form-check-label" for="falta-<?php echo $estudianteId; ?>">Marcar Falta</label>
                                        </div>
                                        <div class="form-check form-check-inline text-warning">
                                            <input class="form-check-input border border-warning" type="checkbox" id="retraso-<?php echo $estudianteId; ?>" value="Retraso" name="attendance[<?php echo $estudianteId; ?>]">
                                            <label class="form-check-label" for="retraso-<?php echo $estudianteId; ?>">Marcar Retraso</label>
                                        </div>
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                        Comentarios </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <textarea class="form-control" id="comentarios" name="comentarios" rows="2"></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>

                            </div>
                        </div>
                        <div class="card-body bg-dark">
                            <div hidden><?php echo $estudianteId; ?></div>
                            <div class="text-light">
                                <h5 class="card-title text-primary">Nombre: <?php echo $estudiante['nombre']; ?></h5>
                                <h5>Primer Apellido: <?php echo $estudiante['apellido1']; ?></h5>
                                <h5>Segundo Apellido: <?php echo $estudiante['apellido2']; ?></h5>
                                <h5>Email: <?php echo $estudiante['email']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- <div class="row">
                <div class="col pt-2">
                    <button type="submit" class="btn btn-primary float-end">Guardar/Enviar</button>
                </div>
            </div> -->

        </div>
    </div>
</div>

<?php include("./componentes/footer.php") ?>