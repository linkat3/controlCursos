<?php include("vista/componentes/header.php") ?>

<span class="navbar navbar-dark bg-dark d-flex justify-content-end">
<h5 class="text-white ">Tienda Online de Libros del Centro</h5>

    <button id="boton-carrito" type="button" class="btn btn-primary m-2 btn-lg">
        <i class="bi bi-cart4"></i> </button>
    <!-- Carrito -->
    <div class="container-fluid">
        <aside class="col-sm-4 hidden">
            <h2>Carrito</h2>
            <!-- Elementos del carrito -->
            <ul id="carrito" class="list-group"></ul>
            <hr>
            <!-- Elementos del carrito -->
            <ul id="carrito" class="list-group"></ul>
            <hr>
            <!-- Precio total -->
            <p class="text-right text-white">Total: <span id="total"></span>&euro;</p>
            <button id="boton-vaciar" class="btn btn-danger">Vaciar</button>
        </aside>
    </div>
</span>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Elementos generados a partir del JSON -->
            <div class="d-flex justify-content-center">
                <main id="items" class="col-sm-10 row"></main>
            </div>
        </div>
    </div>



</body>
<script src="./js/cart_libros.js"></script>

</html>
<?php include("vista/componentes/footer.php") ?>