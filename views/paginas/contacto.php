<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if($mensaje){ ?>
        <p class='alerta exito'><?php echo $mensaje; ?></p>;
    <?php } ?>

    <div class="imagen">
        <picture>
            <source srcset="build/img/webp/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen contacto" loading="lazy">
        </picture>
    </div>

    <h2>Llena el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion personal</legend>

            <label for="nombre">Nombre: </label>
            <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o compra: </label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>--Selecciona--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto: </label>
            <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" 
                name="contacto[precio]" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Como desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" 
                required></input>

                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" 
                name="contacto[contacto]" required>
            </div>

            <br><div id="contacto"></div></br>
        </fieldset>

        <input type="submit"value="Enviar" class="boton-verde">
    </form>
</main>