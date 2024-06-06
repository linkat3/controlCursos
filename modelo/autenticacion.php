<?php
session_start();
$errors = [];

// Conexión a la base de datos
include("db.php");

if(!isset($_POST['username'], $_POST['clave']))
{
    echo "Se requiere aunteticación";
    header('Location: login.php');
}

// Evitar inyección sql
if($stmt = $conexion->prepare('SELECT id, clave FROM usuario WHERE username = ?'))
{
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();

    // Validar lo ingresado
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $clave);
        $stmt->fetch();

        // Se confirma que la cuenta existe ahora validamos la contraseña
        if ($_POST['clave'] === $clave) {
            // La conexión sería exitosa, se crea la sesión
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: ../vista/ver.php?id=' . $_SESSION['id']);
        } else {
            // Contraseña incorrecta
            header('Location: login.php');
        }
    } else {
        // Usuario incorrecto
        header('Location: login.php');
    }

    $stmt->close();
} else {
    // Error en la consulta
    header('Location: login.php');
    exit;
}
?>
<!-- Si se ha enviado el formulario
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
      session_regenerate_id();
      $_SESSION['loggedin']= TRUE;
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $id; // Store user ID in session
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
} -->
