<?php include "./componentes/header.php" ?>
<div class="row">
    <div class="col-12">
        <h1>Registro de Materia</h1>
        <form action="../modelo/crear_materia.php" method="POST">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input name="codigo" required type="text" id="codigo" class="form-control" placeholder="cod de tres letras">
                <label for="idciclo">Id Ciclo</label>
                <input name="idciclo" required type="text" id="idciclo" class="form-control" placeholder="cod ciclo">
                <label for="nombre">Nombre</label>
                <input name="nombre" required type="text" id="nombre" class="form-control" placeholder="Nombre">
                <label for="horas_semana">Horas Semanales</label>
                <input name="horas_semana" required type="text" id="horas_semana" class="form-control" placeholder="Horas Semanal">
            </div>
            
            <div class="form-group">
                <button class="btn btn-success pb-2 m-2" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include "./componentes/footer.php" ?>