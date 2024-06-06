<?php
include_once "conectar.php";
include_once "../vista/componentes/header.php";
include_once "../controlador/materias.php";
include("../modelo/session.php");

// $userId = $_GET['id'];

$materias = Materia::obtener();

?>
<div class="row">
    <div class="col-10">
        <h1>Listado de Materias</h1>
        <a href="../vista/formulario_registro_materia.php" class="btn btn-info my-2">Nuevo</a>
    </div>
    <div class="col-2">
        <a href="../vista/ficha_profesor.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary my-2">
            volver
        </a>
    </div>
</div>
<div class="col-12 table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materias as $materia) { ?>
                <tr>
                    <td><?php echo $materia["codigo"] ?></td>
                    <td><?php echo $materia["nombre"] ?></td>
                    <td><?php echo $materia["horas_semana"] ?></td>

                    <!-- <td>
                            <a href="notas_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-info">
                                Notas
                            </a>
                        </td> -->
                    <td>
                        <a href="editar_materia.php?id=<?php echo $materia["codigo"] ?>" class="btn btn-warning">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="eliminar_materia.php?id=<?php echo $materia["codigo"] ?>" class="btn btn-danger">
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
include_once "../vista/componentes/footer.php";
