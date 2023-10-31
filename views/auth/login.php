<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="post">
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">E-mail</label>
            <input id="email" type="email" placeholder="Tu Email" name="email">

            <label for="password">Password</label>
            <input id="password" type="password" placeholder="Tu Password" name="password">
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>