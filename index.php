<?php include("vista/componentes/headerIntro.php") ?>
<?php
include("modelo/db.php"); ?>

<div class="content">
    <div class="p-4 mb-3 rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold titulo">Majada Marcial en Fuerteventura</h1>
            <p class="col-md-8 fs-4">
                A través de este portal, puedes acceder a tu usuario, tanto si formas parte del profesorado, como del alumnado.
                Tan solo seleccionada en el apartado correspondiente e inicia sesión.
            </p>
            <span class="badge text-bg-primary mb-2 fs-3">
                Centro de Estudios Medios y Superiores
            </span>

            <div class="row g-4 d-flex justify-content-around bg-light">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 w-100 shadow">
                        <div class="card-img-top">
                            <img class="img-fluid w-80 rounded" src="./imagenes/profesor.jpg" alt="">
                        </div>
                        <div class="card-body bg-dark tercer-div">
                            <div hidden></div>
                            <div class="text-light pb-2">
                                <h5 class="card-title text-primary">Acceso Profesores: </h5>
                            </div>
                            <a href="./modelo/login_profesor.php" class="btn btn-primary btn-lg" style="float: right;">Entrar</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 w-100 shadow">
                        <div class="card-img-top">
                            <img class="img-fluid w-80 rounded" src="./imagenes/alumno.png" alt="Logo de Alumnos">
                        </div>
                        <div class="card-body bg-dark">
                            <div hidden></div>
                            <div class="text-light pb-2">
                                <h5 class="card-title text-primary">Acceso Alumnos: </h5>
                            </div>
                            <a href="./modelo/login.php" class="btn btn-primary btn-lg" style="float: right;">Entrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<script src="./js/app.js"></script>
<script src="./js/cookies.js"></script>
<?php include("vista/componentes/footer.php") ?>