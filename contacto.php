<?php include("vista/componentes/header.php") ?>
<form class="pb-2 m-4">
    <h1>Formulario de Contacto</h1>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<h2 class="d-flex justify-content-center">Mapa del Centro</h2>
<!-- Mapa del centro , frame de google maps-->
<div class="d-flex justify-content-center align-items-center m-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3337.004497938251!2d-13.86965622482475!3d28.51238648952706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc47c62bf0f8b75b%3A0xd77378a1756f2606!2sCIFP%20Majada%20Marcial!5e1!3m2!1ses!2ses!4v1716278562350!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php include("vista/componentes/footer.php") ?>