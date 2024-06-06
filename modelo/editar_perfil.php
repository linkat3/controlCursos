<?php
require("../modelo/conexion.php");

session_start();
$userId = $_GET['id'];
var_dump($userId);

$sql = "SELECT nombre, concat_ws(' ', apellido1,apellido2) AS Apellidos, email, cial, direccion, telef FROM usuario WHERE id = $userId";
$result = $conexion->query($sql);
if ($result->rowCount() == 1) {
    $usuario = $result->fetch(PDO::FETCH_ASSOC);
}

?>
<?php
if (isset($_GET['id'])) {

  $id = (isset($_GET['id']) ? $_GET['id'] : "");
  $stm = $conexion->prepare("SELECT * FROM usuario WHERE id=:id");
  //$stm = $conexion->prepare($sql); 

  // Check if id exists in database before populating form
  $stm->bindParam(":id", $id);
  $stm->execute();
  $row = $stm->fetch(PDO::FETCH_LAZY);
  $nombre = $row['nombre'];
  $apellido1 = $row['apellido1'];
  $apellido2 = $row['apellido2'];
  $direccion = $row['direccion'];
  $telef = $row['telef'];
  $foto = $row['foto'];


  
}
if ($_POST) {
  $id=(isset($_POST['id']) ? $_POST['id']:"");
  $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
  $sexo = (isset($_POST['apellido1']) ? $_POST['apellido1'] : "");
  $edad = (isset($_POST['apellido2']) ? $_POST['apellido2'] : "");
  $tipo = (isset($_POST['direccion']) ? $_POST['direccion'] : "");
  $tipo = (isset($_POST['telef']) ? $_POST['telef'] : "");
  $foto = (isset($_POST['foto']) ? $_POST['foto'] : "");


  $stm = $conexion->prepare("UPDATE usuario SET nombre=:nombre,apellido1=:apellido1,apellido2=:apellido2,direccion=:direccion,telef=:telef,foto=:foto WHERE id=:userId");
  $stm->bindParam(":nombre", $nombre);
  $stm->bindParam(":apellido1", $apellido1);
  $stm->bindParam(":apellido2", $apellido2);
  $stm->bindParam(":direccion", $direccion);
  $stm->bindParam(":foto", $foto);
  $stm->bindParam(":id",$id);
  $stm->execute();
}

?>

<?php include("../vista/componentes/header.php") ?>

<form action="editar_perfil.php" method="post">
  <input type="hidden" name="id" value="<?php echo ['id']; ?>"> <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>">
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos:</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['Apellidos']; ?>">
  </div>
  <div class="form-group">
    <label for="correo">Correo electrónico:</label>
    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $usuario['email']; ?>">
  </div>
  <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="direccion" class="form-control" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>">
  </div>
  <div class="form-group">
    <label for="telef">Teléfono:</label>
    <input type="telef" class="form-control" id="telef" name="telef" value="<?php echo $usuario['telef']; ?>">
  </div>
  <button type="submit" class="btn btn-primary mt-2">Actualizar perfil</button>
</form>


<?php include("../vista/componentes/footer.php") ?>