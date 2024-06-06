<?php include("./componentes/header.php") ?>
<?php
include("../modelo/db.php"); 
session_start();

?>
<?php
$stm = ("SELECT usuario.*, modulo.codigo AS materia_codigo from usuario LEFT JOIN modulo ON usuario.id = modulo.iduser WHERE usuario.tipo = 'Alumno';");
$stmt = $conexion->prepare($stm);
$stmt->execute();
$result = $stmt->get_result();

$usuarios = $result->fetch_all(MYSQLI_ASSOC);

?>
<?php
$userId = 3;
$mat = ("SELECT codigo, nombre from modulo WHERE iduser=$userId");
$matt = $conexion->prepare($mat);
$matt->execute();
$resultado = $matt->get_result();
$materias = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<div class="p-4 mb-3 bg-light rounded-3">
    <div class="container-fluid py-2">
            <div class="d-flex justify-content-end">
                <a href="ficha_profesor.php?id=<?php echo $_SESSION['user_id'];?>" class="btn btn-primary btn-sm m-1">
                    Volver
                </a>

            </div>
        <h1 class="display-5 fw-bold">Listado de Materias</h1>
        <h2>Elige a la materia que quieres asignar las notas para sus alumnos</h2>

        <div>
            <?php foreach ($materias as $materia) { ?>
                <div hidden><?php echo $materia['codigo']; ?></div>
                <p class="p-2" id="materia">
                    <a href="./asigna_nota_materia.php?id=<?php echo $materia["codigo"] ?>" class="btn btn-warning"><?php echo $materia['nombre']; ?></a>

                </p>
            <?php } ?>
        </div>
    </div>
</div>
<script src="js/java.js"></script>
<?php include("./componentes/footer.php") ?>