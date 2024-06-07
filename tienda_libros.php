<?php include("vista/componentes/header_tienda.php") ?>


<div class="container-fluid"> <!-- Bloque donde comienza el menú donde se encuentra el carrito de compra -->
    <ul>
        <li class="nav-link submenu d-flex justify-content-end align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" style="color: blue;">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
            </svg>
            <span class="badge text-bg-warning m-2">Carrito De Compra</span>

            <!-- Carrito de compra -->
            <div id="carrito" class="row border border-2 border-dark">
                <div class="col-xs-10">
                    <!-- Tabla donde se agregan los arreglos -->
                    <table id="listaCarrito" class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>X</th> <!-- Se utilizará paa borrar cursos   -->
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <a href="#" id="vaciarCarrito" class="col-12 mb-2 btn btn-warning btn-lg">Vaciar Carrito</a>
                    <a href="#" id="descargarCompra" class="col-12  mb-2 btn btn-secondary btn-lg">Descargar Compra</a>
                    <a href="#" id="cargarCompraLS" class="d-none col-12  mb-2 btn btn-primary btn-lg">Cargar Compra LS</a>
                    <a href="#" id="cargarCompraEQUIPO" class=" col-12  mb-2 btn btn-primary btn-lg">Cargar Compra desde Equipo</a>
                </div> <!-- Fin col-xs-12 -->
            </div>
        </li>


    </ul>
    <a class="btn btn-outline-primary" href="#">Login para comprar</a>
</div>
<!-- Bloque Para colocar alguna publicidad de la empresa -->
<div class=" bg-primary-subtle pricing-header p-3 mb-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4 ">Nuestros Libros</h1>
    <p class="lead">Elija el precio ideal de la oferta para ser nuestro cliente</p>
</div>
<!-- Contenedor MAIN del sitio donde están las cards de los precios -->
<div class="container">
    <!-- Fila única que contiene los CARDS -->
    <div class="row flex-wrap justify-content-evenly" id="productos">
        <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal mb-2">Castigo</h4>
                <img src="imagenes/book.png" class="card-img-top img-thumbnail" alt="Libro ideal">
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">7€ </h1>
                <h3>280/pags</h3>
                <h5>cod:<span class="h5"> 1000001</span></h5>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Drama Políciaca</li>
                    <li>2 GB of storage</li>
                    <li>Email support</li>
                    <li>Varios Idiomas</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="1">agregar</button>
            </div>
        </div>
        <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal mb-2">JavaScript Cliente</h4>
                <img src="imagenes/book.png" class="card-img-top img-thumbnail" alt="Libro ideal">
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">45€ </h1>
                <h3>560/pags</h3>
                <h5>cod:<span class="h5"> 1000002</span></h5>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Lenguaje Front</li>
                    <li>Disponible en ebook</li>
                    <li>Priority email support</li>
                    <li>Blueray incluido</li>
                </ul>
                <button type="button" class="btn btn-lg btn-primary" data-id="2">agregar</button>
            </div>
        </div>
        <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal mb-2">El arte de la guerra</h4>
                <img src="imagenes/book.png" class="card-img-top img-thumbnail" alt="Libro ideal">
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">45€ </h1>
                <h3>300/pags</h3>
                <h5>cod:<span class="h5"> 1000003</span></h5>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Indispensable</li>
                    <li>Más de 3mil compras</li>
                    <li>Soporte disponible</li>
                    <li>Disponible en tabla dura</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="3">agregar</button>
            </div>
        </div>
        <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal mb-2">Special Marketing</h4>
                <img src="imagenes/book.png" class="card-img-top img-thumbnail" alt="Libro ideal">
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">65€ </h1>
                <h3>260/pags</h3>
                <h5>cod:<span class="h5"> 1000004</span></h5>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Recomendado estudiantes</li>
                    <li>+2500 vendidos</li>
                    <li>Soporte disponible</li>
                    <li>Disponible en tapa blanda</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="4">agregar</button>
            </div>
        </div>
        <div class="col-3 mx-2 card mb-4 shadow-sm text-center text-center text-center">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal mb-2">Master Programmer</h4>
                <img src="imagenes/book.png" class="card-img-top img-thumbnail" alt="Libro ideal">
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">85€ </h1>
                <h3>160/pags</h3>
                <h5>cod:<span class="h5"> 1000005</span></h5>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Incluye varios lenguajes de programación</li>
                    <li>Indispensable para DAW</li>
                    <li>Soporte disponible</li>
                    <li>Disponible en varios formatos</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary" data-id="5">agregar</button>
            </div>
        </div>
    </div> <!-- Fin del ROW -->
</div>
<!-- JS de autor -->
<!-- <script src="js/script_v2.js"></script> -->
<script src="js/script_v2.js"></script>
<!-- <script src="js/ejerc1_LS.js"></script> -->

<script src="js/java.js"></script>
<?php include("vista/componentes/footer.php") ?>