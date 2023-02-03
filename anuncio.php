<?php

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }

    require 'includes/config/database.php';
    $db = conectarDB();


    $query = "SELECT * FROM diseños WHERE id = {$id}";


    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows) {
        header('Location: /');
    }

    $diseño = mysqli_fetch_assoc($resultado);


    require 'includes/funciones.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $diseño['titulo']; ?></h1>

            <img src="/imagenes/<?php echo $diseño['imagen']; ?>" alt="imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $diseño['precio']; ?>€</p>

            <?php echo $diseño['descripcion']; ?>
        </div>
    </main>

<?php
    mysqli_close($db);

    incluirTemplate('footer');
    
?>