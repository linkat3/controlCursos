<?php include("./componentes/header.php") ?>
<?php
include("../modelo/conectar.php");
include_once "../controlador/estudiantes.php";
$estudiantes = Estudiante::obtener();
session_start(); 
?>
<div class="row">
    <div class="col-12">
        <h1>Listado de alumnos</h1>
        <!-- Button trigger modal Crear/agregar -->
        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#create">
            Nuevo
        </button>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Opciones</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante) { ?>
                    <tr>
                        <td><?php echo $estudiante["nombre"] ?></td>
                        <td><?php echo $estudiante["apellido1"] ?></td>
                        <td><?php echo $estudiante["apellido2"] ?></td>
                        <td><?php echo $estudiante["email"] ?></td>
                        <td><?php echo $estudiante["username"] ?></td>
                        <td><?php echo $estudiante["direccion"] ?></td>
                        <td><?php echo $estudiante["telef"] ?></td>
                        <td>
                            <a href="notas_alumnos.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-info">
                                Notas
                            </a>
                        </td>
                        <td>
                            <a href="../modelo/editar_alumno.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger delete-button" data-id="<?php echo $estudiante["id"] ?>">
                                <i class="bi bi-trash-fill" aria-hidden="true"></i>
                            </a>

                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/modal.js"></script>
<?php include("../modelo/formulario_crear_estudiante.php") ?>
<?php include("../modelo/eliminar_alumno.php") ?>
<?php include("./componentes/footer.php") ?>