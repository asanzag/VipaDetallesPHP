<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>

        <h2>Rellene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" placeholder="Dinos tú idea..." ></textarea>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer'); ?>