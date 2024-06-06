<?php include("./componentes/header.php") ?>
<?php require("../modelo/conexion.php");
if (isset($_GET['id'])) {
  $id = ($_GET['id']); 
  $sql = "SELECT * FROM usuario WHERE id = $id";
  $result = $conexion->query($sql);
  if ($result->rowCount() == 1) {
    $usuario = $result->fetch(PDO::FETCH_ASSOC); // Get the record data as an associative array
    // mostrando detales
    echo '<div class="container-fluid">';
    echo '<h1 class="bg-info px-4 py-5 text-center fw-bold text-white">' . $usuario['nombre'], $usuario['apellido1'] . '</h1>';
    echo '<div class="py-5">';
    echo '<div class="d-flex justify-content-end">';
    echo '<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" value="falta" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
      Marcar como falta
    </label></div>';
    echo '<div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" value="retraso" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
      Marcar como retraso</label></div>';
    echo '</div>';  
    echo '<div class="col-lg-6 mx-auto">';
    echo '<div class="record-info fs-5 mb-4">';
    foreach ($usuario as $key => $value) {
      // muestra la foto 'foto' si existe
      if ($key === 'foto' && !empty($value)) {
        echo '<td>';
        echo '<img class="img-fluid shadow p-3 mb-5" src="' . $value . '" alt="' . $usuario['nombre'] . '">';
        echo '</td>';        
        echo '<br>';
      } else {
        echo '<p><strong>' . ucfirst($key) . ':</strong> ' . $value . '</p>';
      }
    }
    echo '<br>';
    //volver a la lista
    echo '<a href="../index.php" class="btn btn-primary">Volver a la lista</a>';
    echo '</div></div></div></div><br>';
  } else {
    echo '<p class="text-danger">Error: Alumno no encontrado con ID: ' . $id . '</p>';
  }
} else {
  echo '<p class="text-danger">Error: Se requiere un ID para mostrar los detalles.</p>';
}


?>

<?php include("./componentes/footer.php") ?>

