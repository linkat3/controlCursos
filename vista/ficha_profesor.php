<?php include("./componentes/header.php") ?>
<?php require("../modelo/conexion.php");
require_once("../modelo/session.php");

$userId = $_GET['id'];

$tipo = $_SESSION['tipo'];
if (isset($_GET['id'])){ 


  $id = ($_GET['id']);
  $sql = "SELECT nombre, concat_ws(' ', apellido1,apellido2) AS Apellidos, email, cial, direccion, telef, foto FROM usuario WHERE id = $id";
  $result = $conexion->query($sql);
  if ($result->rowCount() == 1) {
    $usuario = $result->fetch(PDO::FETCH_ASSOC);
    // mostrar los detalles
    echo '<div class="container-fluid m-0 p-0">';
    echo '<h1 class="bg-info px-4 py-5 text-center fw-bold text-white">' .  'Bienvenido Profesor ' . $usuario['nombre'] . '</h1>';
    echo '<div class="py-5">';
    echo '<div class="col-lg-8 mx-auto">';
    // Editar perfil del usuario en sesión
    echo '<div class="d-flex justify-content-end">';
    //Editar perfil
    echo '<a href="../modelo/form_editar_perfil.php?id='.$userId.'" class="btn btn-warning btn-md fs-5"> Editar Perfil</a>';
    echo '</div>';
    echo '<div class="record-info fs-4 mb-2">';
    foreach ($usuario as $key => $value) {
      // muestra la foto 'foto' si existe
      if ($key === 'foto' && !empty($value)) {
        echo '<td>';
        echo '<img class="img-fluid shadow p-3 mb-5 mx-auto d-block" style="max-width: 50vh;"  src="' . $value . '" alt="Profesor' . $usuario['nombre'] . '">';
        echo '</td>';
        echo '<br>';
      } else {
        echo '<p><strong>' . ucfirst($key) . ':</strong> ' . $value . '</p>';        
      }     
    } 
    if ($tipo == 'Profesor') { 
    echo '<br>';
    //pasar asistencia o lista
    echo '<a href="asistencia_alumnos.php" class="btn btn-outline-primary btn-md px-3 me-sm-3 fw-bold fs-4">Pasar Lista</a>';
    //asignar notas
    echo '<a href="asignar_notas.php" class="btn btn-outline-warning btn-md px-3 me-sm-3 fw-bold fs-4">Asignar Notas</a>';
    }
    if ($tipo == 'Admin') {
    //ver lista de alumnos totales
    echo '<a href="lista_alumnos.php" class="btn btn-outline-primary btn-md px-3 me-sm-3 fw-bold fs-4">Listado de Alumnos</a>';
    
    //materias o modulos
    echo '<a href="../modelo/mostrar_materia.php" class="btn btn-outline-success btn-md px-3 me-sm-3 fw-bold fs-4">Mostrar Materias</a>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '</div></div>';
    }
    //cerrar sesión  
    echo '<a href="../modelo/logout.php" class="btn btn-primary btn-sm px-4 me-sm-3 fw-bold fs-5" style="float: right;">Cerrar Sesión</a>';
    echo '</div></div><br>';
  } else {
    echo '<p class="text-danger">Error: Alumno no encontrada con ID: ' . $id . '</p>';
  }
} else {
  echo '<p class="text-danger">Error: Se requiere un ID para mostrar los detalles.</p>';
}


?>
<?php include("./componentes/footer.php") ?>

