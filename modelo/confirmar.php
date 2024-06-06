<?php include("../vista/componentes/header.php") ?>





<div class="container">
    <h1 class="text-primary">Los perrunos de Fuerteventura</h1>
    <hr>

    <?php

    if(isset($_GET["id"]))
    {
        ?>
            <h3 class="text-body">¿Realmente desea BORRAR este registro?</h3>
            <br>
            <a href = "<?=$_SERVER["HTTP_REFERER"]?>" class="btn btn-success">No. Volver al listado de perros</a>
            
            <a class="btn btn-danger" href = "eliminar_alumno.php/?id=<?=$_GET["id"]?>">Eliminar</a>
        <?php
    }

?>
   
</div>
<?php include("../vista/componentes/footer.php") ?>
