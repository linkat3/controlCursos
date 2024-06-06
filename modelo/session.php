<?php
session_start();
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if (!isset($_SESSION['user_id'])) {
    echo '<p>Debes iniciar sesión para poder
    acceder a este apartado.</p>';
    echo '<p>Puedes entrar desde este <a href="../index.php" class="btn btn-warning">link</a></p>';
    //<a href="./modelo/login_profesor.php" class="btn btn-primary">Entrar</a>

    //header('Location: ../index.php');
    exit;
}
?>