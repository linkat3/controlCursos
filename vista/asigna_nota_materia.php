<?php include("./componentes/header.php") ?>
<?php
include("../modelo/db.php");
require_once("../modelo/session.php");
include_once "../controlador/Materias.php";
include_once "../controlador/Notas.php";
include_once "../controlador/estudiantes.php";
if (isset($_GET['id'])) {
    $codigo = $_GET['id']; // pasando el codigo desde parametro url
} else {
    // mensaje error
    die('Missing codigo parameter');
}
$materia = Estudiante::obtenerMateria($codigo);
$stm = ("SELECT modulo, id_alumno, nota, nombre, apellido1, apellido2 FROM calificaciones
inner join usuario on calificaciones.id_alumno = usuario.id WHERE modulo = '$codigo';");

$stmt = $conexion->prepare($stm);
$stmt->execute();
$result = $stmt->get_result();

$estudiantes = $result->fetch_all(MYSQLI_ASSOC);

?>

<div class="d-flex justify-content-end">
    <!-- <a href="asistencia_alumnos.php" class="btn btn-primary m-1">
        Volver
    </a> -->
    <a href="../vista/asignar_notas.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary btn-sm m-1">
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

        <form action="../modelo/editar_nota.php" method="POST">
            <input type="hidden" name="modulo" value="<?php echo $codigo ?>">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Nota</th>
                        <th>Guardar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($estudiantes)) { ?>
                        <tr>
                            <td colspan="3" class="text-center">No hay estudiantes matriculados</td>
                        </tr>
                    <?php } else { ?>

                        <?php foreach ($estudiantes as $estudiante) { ?>
                            <tr>
                                <td><?php echo $estudiante["nombre"] ?>
                                    <?php echo $estudiante["apellido1"] ?>
                                    <?php echo $estudiante["apellido2"] ?>
                                </td>
                                <td>
                                    <input type="number" class="form-control grade-input" name="notas[<?php echo $estudiante["id_alumno"] ?>]" value="<?php echo $estudiante["nota"] ?>">
                                </td>
                                <td>
                                    <button class="btn btn-success m-2" type="submit">Guardar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>

    <?php include("./componentes/footer.php") ?>