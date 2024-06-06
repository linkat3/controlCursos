<?php
include_once "../modelo/conectar.php";
include_once "../vista/componentes/header.php";
include_once "../controlador/Estudiantes.php";
include_once "../controlador/Materias.php";
include_once "../controlador/Notas.php";
require_once("../modelo/session.php");
$userId = $_GET['id'];
$estudiante = Estudiante::obtenerUno($_GET["id"]);
$materias = Materia::obtener();
$notas = Nota::obtenerDeEstudiante($estudiante->id);
$materiasConCalificacion = Nota::combinar($materias, $notas);

?>
<div class="row">
    <div class="col-12">
        <h1>Notas de <?php echo $estudiante->nombre ?></h1>
    </div>
    <div class="col-12 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $sumatoria = 0.0; // Initialize sum for average calculation (assuming needed)

        foreach ($materiasConCalificacion as $materia) {
          $sumatoria += floatval(array_shift($materia["nota"])); // Add first grade (assuming single or first grade)

          // Display subject name and grade(s) in each row
          ?>
          <tr>
            <td><?php echo $materia["nombre"]; ?></td>
            <td>
              <span>
                <?php
                if (isset($materia["nota"]) && is_array($materia["nota"]) && count($materia["nota"]) > 0) {
                  $position = 0; // Initialize counter
                  foreach ($materia["nota"] as $grade) {
                    if ($position < count($materia["nota"])) {
                      echo $grade . ", "; // Display grade with comma and space
                      $position++;
                    }
                  }
                  // Remove trailing comma
                  echo rtrim($materia["nota"][$position - 1], ", ");
                } else {
                  echo "Sin nota";
                }
                ?>
              </span>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <td>Promedio</td>
          <td>
            <strong>
              <?php
              if (count($materias) > 0) { // Check for division by zero
                $promedio = $sumatoria / count($materias);
                echo $promedio;
              } else {
                echo "Sin materias";
              }
              ?>
            </strong>
          </td>
        </tr>
      </tfoot>
    </table>
        <?php echo '<a href="ver.php?id=' . $userId . '" class="btn btn-warning btn-md m-1"> Volver</a>' ?>

    </div>
</div>
<?php
include_once "../vista/componentes/footer.php";
