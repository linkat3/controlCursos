<?php $url_base = "http://localhost/MajadaP/controlCursos/";  ?>
<!doctype html>
<html lang="es">

<head>
    <title>Centro Majada Marcial, Fuerteventura</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="http://localhost/MajadaP/controlCursos/vista/estilos/estilo.css">
    <link rel="stylesheet" href="http://localhost/MajadaP/controlCursos/vista/estilos/features.css">
    <link rel="stylesheet" href="<?php echo $url_base; ?>vista/estilos/signin.css">
    <link rel="stylesheet" href="<?php echo $url_base; ?>vista/estilos/intro.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body data-bs-theme="light">
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/MajadaP/controlCursos/index.php" aria-current="page">Cursos <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>modelo/">El Centro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>tienda_libros.php">Tienda de Libros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>contacto.php">Formulario de Contacto</a>
                        </li>
                        <li class="nav-item">
                            <button onclick="cambiarTema()" class="btn rounded-fill bg-light">
                            <i class="bi bi-moon-fill" id="tema-icon"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
  <!-- Cookies -->
 <section class="cookies">
    <h2 class="cookies__titulo">¿Aceptas nuestras Cookies?</h2>
    <p class="cookies__texto">Usamos cookies para mejorar tu experiencia en la web.</p>
    <div class="cookies__botones">
        <button class="cookies__boton cookies__boton--no">No</button>
        <button class="cookies__boton cookies__boton--si">Si</button>
    </div>
</section>
<!-- Aquí se generarán todas las etiquetas <script> si acepta el usuario -->
<div id="nuevosScripts"></div>
    <main class="container">
        <br>
        <br>
        