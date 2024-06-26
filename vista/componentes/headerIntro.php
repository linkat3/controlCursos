<?php $url_base = "http://localhost/Programacion/TercerTrimestre/controlCursos/controlCursos/";  ?>
<!doctype html>
<html lang="es">

<head>
    <title>Centro Majada Marcial, Fuerteventura</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="http://localhost/Programacion/TercerTrimestre/controlCursos/controlCursos/vista/estilos/estilo.css">
    <link rel="stylesheet" href="http://localhost/Programacion/TercerTrimestre/controlCursos/controlCursos/vista/estilos/features.css">
    <link rel="stylesheet" href="http://localhost/Programacion/TercerTrimestre/controlCursos/controlCursos/vista/estilos/signin.css">
    <link rel="stylesheet" href="http://localhost/Programacion/TercerTrimestre/controlCursos/controlCursos/vista/estilos/intro.css">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/Programacion/TercerTrimestre/controlCursos/controlCursos/index.php" aria-current="page">Cursos <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base; ?>modelo/">El Centro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.php">Formulario de Contacto</a>
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
    <div class="intro">
        <img src="./imagenes/logomajada_centrado.png" alt="Logo Majada">
        <h1 class="logo">
            <span class="logo-parts">M</span>
            <span class="logo-parts">A</span>
            <span class="logo-parts">J</span>
            <span class="logo-parts">A</span>
            <span class="logo-parts">D</span>
            <span class="logo-parts">A</span>
            <span class="logo-parts"> </span>
            <span class="logo-parts"> </span>
            <span class="logo-parts">M</span>
            <span class="logo-parts">A</span>
            <span class="logo-parts">R</span>
            <span class="logo-parts">C</span>
            <span class="logo-parts">I</span>
            <span class="logo-parts">A</span>
            <span class="logo-parts">L</span>

        </h1>
    </div>
    <main class="container">
        <br>