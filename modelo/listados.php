<?php
include("db.php");
$stm = $conexion->prepare("SELECT * FROM mascotas");
$stm->execute();
$mascotas = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- sesión star y comprobación login -->
<!-- <?php
session_start();?>
<h1>Visitante n: <?php echo $_SESSION["contador"]; ?></h1> -->
<!-- activo de sesiones, comprobación de login sino existe redirigir al login -->
<?php include("../vista/componentes/header.php") ?>
<!-- Button trigger modal Crear/agregar -->
<button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#create">
    Nuevo
</button>
<div class="table-responsive">
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Raza</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mascotas as $mascota) { ?>
                <tr class="text-body">
                    <td scope="row"><?php echo $mascota['idmascotas']; ?></td>
                    <td><?php echo $mascota['nombre']; ?></td>
                    <td><?php echo $mascota['sexo']; ?></td>
                    <td><?php echo $mascota['edad']; ?></td>
                    <td><?php echo $mascota['tipo']; ?></td>
                    <!-- <td><?php echo $mascota['foto']; ?></td> -->
                    <td><?php
                        $imageURL = $mascota['foto']; // url de la imagen
                        if (!empty($imageURL)) {
                            echo '<img style="max-width: 40%;" src="' . $imageURL . '" alt="' . $mascota['nombre'] . '">'; // Display image with alt text
                        } else {

                            // http://localhost/perrunos-proyecto/perrunos/modelo/index.php
                            echo '<img style="max-width: 30%;" class="img-fluid img-thumbnail" src="http://localhost/perrunos-proyecto/perrunos/imagenes/nofoto.jpg">'; // No images
                        }
                        ?></td>
                    <td>
                        <a href="../vista/ver.php?id=<?php echo $mascota['idmascotas']; ?>" class="btn btn-primary">ver</a>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $mascota['idmascotas']; ?>" class="btn btn-warning">modificar</a>
                    </td>
                    <td>
                        <a href="confirmar.php?id=<?php echo $mascota['idmascotas']; ?>" class="btn btn-danger">borrar</a>
                    </td>

                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>



<?php include("add.php") ?>

<?php include("../vista/componentes/footer.php") ?>