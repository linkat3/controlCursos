<!-- Modal Crear -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../modelo/crear_estudiante.php" method="POST">
                <div class="modal-body">
                    <label for="">Numero de Identidad</label>
                    <input type="text" class="form-control" name="nIdentidad" value="" placeholder="DNI, NIE, pasaporte">

                    <label for="">CIAL</label>
                    <input type="text" class="form-control" name="cial" value="cial" placeholder="Num CIAL">

                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" value="username" placeholder="Ingresa un nombre de usuario">

                    <label for="">Password</label>
                    <input type="password" class="form-control" name="clave" value="clave" placeholder="Numero y letras">
                    
                    <label for="">Fecha de Alta</label>
                    <input type="date" class="form-control" name="fecha_creacion" value="<?php echo date('Y-m-d'); ?>" placeholder="fecha">
                    
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="nombre" placeholder="Ingresa nombre">

                    <label for="">Primer Apellido</label>
                    <input type="text" class="form-control" name="apellido1" value="apellido1" placeholder="primer apellido">

                    <label for="">Segundo Apellido</label>
                    <input type="text" class="form-control" name="apellido2" value="apellido2" placeholder="segundo apellido">

                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="email" placeholder="email@gmail.com">

                    <label for="">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="direccion" placeholder="Calle N Municipio">

                    <label for="">Teléfono</label>
                    <input type="text" class="form-control" name="telef" value="telef" placeholder="640640640">

                    <label class="p-2" for="tipo">Tipo de usuario:</label>
                    <!-- <input type="text" class="form-control" name="tipo" id="tipo" value="Alumno" readonly placeholder="Alumno"> -->
                    <select name="tipo" id="tipo">
                        <option value="Alumno" selected>Alumno</option>
                        <option value="Profesor" >Profesor</option>

                    </select>
                    <br>

                    <label for="">Foto</label>
                    <input type="text" class="form-control" name="foto" value="" placeholder="url o dirección de la foto">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
  // Habilitar el campo de fecha después de cargar la página
  window.onload = function() {
    document.querySelector('input[name="fecha_creacion"]').disabled = false;
  };

  // Get the input element by ID
  const tipoInput = document.getElementById('tipo');

  // Prevent the form from submitting the default value
  tipoInput.form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Check if the value has been changed (optional)
    if (tipoInput.value !== 'Alumno') {
      alert('El tipo debe ser "Alumno".');
      return; // Prevent further form processing
    }

    // Submit the form with the fixed value
    tipoInput.form.submit(); // Manually submit the form
  });
</script>