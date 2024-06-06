<?php
include_once "conectar.php";
include_once "../controlador/estudiantes.php";
include_once "../vista/componentes/header.php";
$estudiante = Estudiante::obtenerUno($_GET["id"]);
?>
<div class="row">
    <div class="col-10">
        <h1>Editar estudiante</h1>
        <form action="actualizar_alumno.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                <div class="form-group">
                    <!-- <label for="tipo">Tipo Alumno</label> -->
                    <input type="hidden" name="tipo" value="<?php echo $estudiante->tipo ?>" id="tipo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="<?php echo $estudiante->username ?>" name="username" type="text" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?php echo $estudiante->email ?>" name="email" type="text" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nIdentidad">Num Identidad</label>
                    <input value="<?php echo $estudiante->nIdentidad ?>" name="nIdentidad" required type="text" id="nIdentidad" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input value="<?php echo $estudiante->nombre ?>" name="nombre" required type="text" id="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellido1">Primer Apellido</label>
                    <input value="<?php echo $estudiante->apellido1 ?>" name="apellido1" required type="text" id="apellido1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellido2">Segundo Apellido</label>
                    <input value="<?php echo $estudiante->apellido2 ?>" name="apellido2" required type="text" id="apellido2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cial">Nº CIAL</label>
                    <input disabled value="<?php echo $estudiante->cial ?>" name="cial" type="text" id="cial" class="form-control">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input value="<?php echo $estudiante->direccion ?>" name="direccion" required type="text" id="direccion" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="telef">Teléfono</label>
                    <input value="<?php echo $estudiante->telef ?>" name="telef" required type="text" id="telef" class="form-control">
                </div>               
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="text" class="form-control" name="foto" value="foto" placeholder="url o dirección de la foto">
                </div>
                <div class="form-group">
                    <label for="fecha_creacion">Fecha de Alta</label>
                    <input disabled type="text" class="form-control" name="fecha_creacion" value="<?php echo $estudiante->fecha_creacion; ?>">
                </div>               
                <div class="form-group">
                    <label for="clave">Password</label>
                    <input value="<?php echo $estudiante->clave ?>" disabled name="clave" type="password" id="clave" class="form-control">
                </div>                                          
                <div class="form-group">
                    <a href="../vista/lista_alumnos.php" class="btn btn-primary m-2">Volver</a>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include("../vista/componentes/footer.php") ?>