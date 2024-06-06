<?php
// Iniciar sesión
session_start();
// Conexión a la base de datos
require_once("db.php"); 

$errors = [];

// Si se ha enviado el formulario
if (isset($_POST['login_button'])) {
  $username = mysqli_real_escape_string($conexion, $_POST['username']);
  $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
 
  // Comprobar si el nombre de usuario es válido
  $query = "SELECT * FROM usuario WHERE username='$username'";
  $results = mysqli_query($conexion, $query);
  $_SESSION['user_id'] = $row['id']; // Store user ID
  $_SESSION['username'] = $row['username']; // Store username
  $_SESSION['email'] = $row['email']; // Store email (or other relevant data)
  if (mysqli_num_rows($results) == 1) {
    // Nombre de usuario válido, verificar contraseña
    $row = mysqli_fetch_assoc($results);
    if ($_POST['clave']===$clave) {
      // Inicio de sesión válido
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $row['id']; // Store user ID in session
      header('location: ../vista/ver.php?id=' . $_SESSION['user_id']);
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
<main class="form-signin mb-3 pb-3">
  <form action="login.php" method="POST" autocomplete="off">
    <img class="img-fluid" src="../imagenes/alumno.png" alt="" width="72" height="57">
    <h1 class="h3 m-2 text-success d-flex justify-content-center">Área de Alumnos</h1>
    <h3 class="h3 fw-normal">Por favor, inicia sesión</h3>
    <?php
              if (count($errors) > 0) {
                echo "<div class='alert alert-danger' role='alert'>";
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                echo "</div>";
              }
    ?>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="clave" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> recordarme
      </label>
    </div>
    <button name="login_button" class="w-100 btn btn-lg btn-outline-primary" type="submit" value="Acceder">Entrar</button>

  </form>
</main>
<?php include "../vista/componentes/footer.php" ?>