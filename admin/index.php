<?php

require '../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth) {
    header('Location: /');
}
    // Importar la conexión
    require '../includes/config/database.php';
    $db =  conectarDB();


    // Escribir el query
    $query = "SELECT * FROM diseños";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);

    // Muestra mensaje condicional        
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            // Eliminar el archivo
            $query = "SELECT imagen FROM diseños WHERE id = {$id}";

            $resultado = mysqli_query($db, $query);
            $diseño = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $diseño['imagen']);

            // Eliminar el diseño
            $query = "DELETE FROM diseños WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('Location: /admin?resultado=3');
            }
        }


        var_dump($id);

    }

    // Incluye un template
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de VipaDetalles</h1>
        <?php if( intval( $resultado ) === 1): ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif( intval( $resultado ) === 2 ): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif( intval( $resultado ) === 3 ): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nuevo Diseño</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
                <?php while( $diseño = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $diseño['id']; ?> </td>
                    <td><?php echo $diseño['titulo']; ?></td>
                    <td> <img src="/imagenes/<?php echo $diseño['imagen']; ?>" class="imagen-tabla"> </td>
                    <td><?php echo $diseño['precio']; ?>€</td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $diseño['id']; ?>">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="admin/propiedades/actualizar.php?id=<?php echo $diseño['id']; ?>" class="boton-azul-block" >Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php
    
    // Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');
?>