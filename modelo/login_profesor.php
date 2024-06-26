<?php
// Iniciar sesión
session_start();
// Conexión a la base de datos
require_once "db.php";

$errors = [];

// Si se ha enviado el formulario
if (isset($_POST['login_button'])) {
  $username = mysqli_real_escape_string($conexion, $_POST['username']);
  $clave = mysqli_real_escape_string($conexion, $_POST['clave']);

  // Comprobar si el nombre de usuario es válido
  $query = "SELECT * FROM usuario WHERE username='$username' AND clave='$clave'";
  $results = mysqli_query($conexion, $query);

  if (mysqli_num_rows($results) == 1) {
    // Nombre de usuario válido, verificar contraseña
    $row = mysqli_fetch_assoc($results);
    if ($_POST['clave'] === $clave) {
      // Inicio de sesión válido
      $_SESSION['user_id'] = $row['id']; // Store user ID
      $_SESSION['username'] = $row['username']; // Store username
      $_SESSION['email'] = $row['email'];
      $_SESSION['tipo'] = $row['tipo'] ;
      header('location: ../vista/ficha_profesor.php?id=' . $_SESSION['user_id']);
      exit; // Stop further execution after redirect

    } else {
      // Contraseña inválida
      $errors[] = "Nombre de usuario/contraseña inválidos";
    }
  } else {
    // Nombre de usuario inválido
    $errors[] = "Nombre de usuario/contraseña inválidos";
  }
}
?>

<?php include "../vista/componentes/header.php" ?>
<link href="../vista/estilos/signin.css" rel="stylesheet">
<main class="form-signin pb-3 mb-2">
  <form action="login_profesor.php" method="POST" autocomplete="off">
    <img class="img-fluid pb-2" src="../imagenes/profesor.jpg" alt="Logo Profesores" width="72" height="57">
    <h1 class="h3 mb-2 text-primary d-flex justify-content-center">Área de Profesores</h1>
    <h3 class="h3 mb-3 fw-normal">Por favor, inicia sesión</h3>
    <?php
    if (count($errors) > 0) {
      echo "<div class='alert alert-danger' role='alert'>";
      foreach ($errors as $error) {
        echo $error . "<br>";
      }
      echo "</div>";
    }
    ?>
    <div class="form-floating m-3 p-2">
      <input type="text" name="username" class="form-control" id="floatingInput" required placeholder="Nombre de usuario">
      <label for="floatingInput" placeholder="Nombre de usuario"> User</label>
    </div>
    <div class="form-floating m-2 p-2">
      <input type="password" name="clave" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword" placeholder="Password"> </label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> recordarme
      </label>
    </div>
    <button name="login_button" class="w-100 btn btn-lg btn-outline-primary" type="submit" value="Acceder">Entrar</button>

  </form>
</main>
<?php include "../vista/componentes/footer_login.php" ?>