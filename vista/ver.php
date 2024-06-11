<?php include("./componentes/header.php") ?>
<?php require("../modelo/conexion.php");
require_once("../modelo/session.php");
$userId = $_GET['id'];

if (isset($_GET['id'])) {
  $id = ($_GET['id']);
  $sql = "SELECT nombre, concat_ws(' ', apellido1,apellido2) AS Apellidos, email, cial, direccion, telef, foto FROM usuario WHERE id = $id";
  $result = $conexion->query($sql);
  if ($result->rowCount() == 1) {
    $usuario = $result->fetch(PDO::FETCH_ASSOC);
    // mostrar los detalles
    echo '<div class="container-fluid loggedin card">';
    echo '<h1 class="bg-info px-4 py-5 text-center fw-bold text-white">Detalles del Alumno</h1>';
    echo '<div class="py-5">';
    echo '<div class="col-lg-6 mx-auto">';
    echo '<div class="record-info fs-4 mb-4">';
    foreach ($usuario as $key => $value) {
      // muestra la foto 'foto' si existe
      if ($key === 'foto' && !empty($value)) {
        echo '<td>';
        echo '<img class="img-fluid shadow p-3 mb-5"  src="' . $value . '" alt="Alumno' . $usuario['nombre'] . '">';
        echo '</td>';
        echo '<br>';
      } else {
        echo '<p><strong>' . ucfirst($key) . ':</strong> ' . $value . '</p>';        
      }     
    } 

    echo '<br>';
    //ver notas
    echo '<a href="ver_notas.php?id=' . $userId . '" class="btn btn-outline-warning btn-lg px-4 me-sm-3 fw-bold">Ver Notas</a>';
    //ver faltas

    echo '<a href="asistencias_faltas.php?id=' . $userId . '" class="btn btn-outline-danger btn-lg px-4 me-sm-3 fw-bold">Ver Faltas</a>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '</div></div>';
    //cerrar sesión  
    echo '<a href="../modelo/logout.php" class="btn btn-outline-primary btn-sm px-4 me-sm-3 fw-bold" style="float: right;">Cerrar Sesión</a>';
    echo '</div></div><br>';
  } else {
    echo '<p class="text-danger">Error: Alumno no encontrada con ID: ' . $id . '</p>';
  }
} else {
  echo '<p class="text-danger">Error: Se requiere un ID para mostrar los detalles.</p>';
}


?>
<br>
<br>
<?php include("./componentes/footer.php") ?>

