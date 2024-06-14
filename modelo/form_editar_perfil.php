<?php
require("../modelo/conexion.php");

session_start();
$userId = $_GET['id'];
// var_dump($userId);

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
  $email = $row['email'];
  $foto = $row['foto'];
}
if ($_POST) {
  $id = (isset($_POST['id']) ? $_POST['id'] : "");
  $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
  $sexo = (isset($_POST['apellido1']) ? $_POST['apellido1'] : "");
  $edad = (isset($_POST['apellido2']) ? $_POST['apellido2'] : "");
  $tipo = (isset($_POST['direccion']) ? $_POST['direccion'] : "");
  $tipo = (isset($_POST['telef']) ? $_POST['telef'] : "");
  $foto = (isset($_POST['foto']) ? $_POST['foto'] : "");
  $email = (isset($_POST['email']) ? $_POST['email'] : "");



  $stm = $conexion->prepare("UPDATE usuario SET nombre=:nombre,apellido1=:apellido1,apellido2=:apellido2,direccion=:direccion,telef=:telef,foto=:foto,email=:email WHERE id=:id");
  $stm->bindParam(":nombre", $nombre);
  $stm->bindParam(":apellido1", $apellido1);
  $stm->bindParam(":apellido2", $apellido2);
  $stm->bindParam(":direccion", $direccion);
  $stm->bindParam(":telef", $telf);
  $stm->bindParam(":foto", $foto);
  $stm->bindParam(":email", $email);
  $stm->bindParam(":id", $id);
  $stm->execute();
}

?>

<?php include("../vista/componentes/header.php") ?>
<div class="fs-4">
  <form action="" method="post">
    <!-- <input type="hidden" name="id" value="<?php echo ['id']; ?>"> -->
    <input type="hidden" class="form-control" name="id" value="">

    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <!-- <input type="text" class="form-control fs-4" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"> -->
      <input type="text" class="form-control fs-4" name="nombre" value="<?php echo isset($nombre) ? $nombre : ""; ?>" >

    </div>
    <div class="form-group">
      <label for="apellidos">Apellidos:</label>
      <!-- <input type="text" class="form-control fs-4" id="apellidos" name="apellidos" value="<?php echo $usuario['Apellidos']; ?>"> -->
      <input type="text" class="form-control fs-4" name="apellido1" value="<?php echo isset($apellido1) ? $apellido1 : ""; ?>" >
      <br>
      <input type="text" class="form-control fs-4" name="apellido2" value="<?php echo isset($apellido2) ? $apellido2 : ""; ?>" >

    </div>
    <div class="form-group">
      <label for="correo">Correo electrónico:</label>
      <!-- <input type="email" class="form-control fs-4" id="correo" name="correo" value="<?php echo $usuario['email']; ?>"> -->
      <input type="email" class="form-control fs-4" name="correo" value="<?php echo isset($email) ? $email : ""; ?>" >

    </div>
    <div class="form-group">
      <label for="direccion">Dirección:</label>
      <!-- <input type="direccion" class="form-control fs-4" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>"> -->
      <input type="text" class="form-control fs-4" name="direccion" value="<?php echo isset($direccion) ? $direccion : ""; ?>" >

    </div>
    <div class="form-group">
      <label for="telef">Teléfono:</label>
      <!-- <input type="telef" class="form-control fs-4" id="telef" name="telef" value="<?php echo $usuario['telef']; ?>"> -->
      <input type="text" class="form-control fs-4" name="telf" value="<?php echo isset($telef) ? $telef : ""; ?>" >

    </div>
    <div class="form-group">
      <label for="">Foto</label>
      <input type="text" class="form-control" name="foto" value="<?php echo isset($foto) ? $foto : ""; ?>" placeholder="url o dirección de la foto">
    </div>
    <button type="submit" class="btn btn-primary mt-2 fs-4 mt-4" id="actualizar">Actualizar perfil</button>
  </form>
</div>

<?php include("../vista/componentes/footer_login.php") ?>