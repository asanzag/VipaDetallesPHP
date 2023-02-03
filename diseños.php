<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion">

        <h1>Todos los diseños</h1>

        <?php
            $limite = 10;
            include 'includes/templates/diseños.php';
        ?>
    </main>

<?php incluirTemplate('footer'); ?>