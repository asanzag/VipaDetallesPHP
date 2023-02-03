<?php
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();


    $query = "SELECT * FROM diseños LIMIT {$limite}";


    $resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
    <?php while($diseño = mysqli_fetch_assoc($resultado)): ?>
    <div data-aos="zoom-out-down" data-aos-duration="3000" class="anuncio">

        <img loading="lazy" src="/imagenes/<?php echo $diseño['imagen']; ?>" alt="anuncio">
        
        <div class="contenido-anuncio">
            <h3><?php echo $diseño['titulo']; ?></h3>

            <p><?php echo $diseño['descripcion']; ?></p>

            <p class="precio"><?php echo $diseño['precio']; ?>€</p>

            <a href="anuncio.php?id=<?php echo $diseño['id']; ?>" class="boton-azul-block">
                Ver Producto
            </a>

        </div> <!-- .contenido-anuncio -->
    </div><!-- .anuncio -->
    <?php endwhile; ?>
</div><!-- contenedor-anuncios -->

<?php
    mysqli_close($db);
?>