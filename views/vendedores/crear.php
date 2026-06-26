<main class="contenedor seccion">
        <h1>Crear Vendedor(a)</h1>

        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>  
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/vendedores/crear">
            <?php include 'formulario.php'; ?>
            <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde"> 
            <a href="/admin" class="boton boton-verde">Volver</a>
        </form>
</main>