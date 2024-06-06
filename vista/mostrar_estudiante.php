<?php
include_once "../modelo/conectar.php";
include_once "../vista/componentes/header.php";
include_once "../controlador/estudiantes.php";
$estudiantes = Estudiante::obtener();
?>
<div class="row">
    <div class="col-12">
        <h1>Listado de estudiantes</h1>
        <a href="../vista/formulario_registro_estudiante.php" class="btn btn-info my-2">Nuevo</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Notas</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante) { ?>
                    <tr>
                        <td><?php echo $estudiante["nombre"] ?></td>
                        <td><?php echo $estudiante["apellido1"] ?>
                        <?php echo $estudiante["apellido2"] ?></td>
                        <td>
                            <a href="notas_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-info">
                                Notas
                            </a>
                        </td>
                        <td>
                            <a href=".../modelo/editar_alumno.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="eliminar_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-danger">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once "../vista/footer.php";