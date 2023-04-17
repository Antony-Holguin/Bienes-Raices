<?php
    require('../bienesraices/includes/funciones.php');
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="webp">
            <source src="build/img/destacada3.jpg" type="jpg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Informacion personal</legend>
               <label for="nombre">Nombre:</label> <input type="text" placeholder="Tu nombre" id="nombre">
               <label for="email">Email:</label> <input type="email" placeholder="Tu email" id="email">
               <label for="telefono">Telefono:</label> <input type="tel" placeholder="Tu telefono" id="telefono">
               <label for="mensaje">Mensaje</label> <textarea name="mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <label for="opciones">Vende o compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled="true" selected>-----Seleccione-----</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label> <input type="tel" placeholder="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label> <input type="radio" name="contacto" value="Telefono" id="contactar-telefono">
                    <label for="contactar-email">Email</label> <input type="radio" name="contacto" value="Email" id="contactar-email">
                </div>

                <p>Si selecciona telefono, elija la fecha y la hora</p>
                <label for="fecha">Precio o presupuesto</label> <input type="date" id="fecha">

                <label for="hora">Hora:</label> <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton--verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>