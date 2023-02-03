<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth) {
    header('Location: /');
}


    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    // Base de datos
    require '../../includes/config/database.php';
    $db =  conectarDB();

    // Obtener los datos de la propiedad
    $consulta = "SELECT * FROM diseños WHERE id = {$id}";
    $resultado = mysqli_query($db, $consulta);
    $diseño = mysqli_fetch_assoc($resultado);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = $diseño['titulo'];
    $precio = $diseño['precio'];
    $descripcion = $diseño['descripcion'];
    $imagenDiseño = $diseño['imagen'];


    // Ejecutar el código despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //echo "<pre>";
        //var_dump($_POST);
        //echo "</pre>";

        //echo "<pre>";
        //var_dump($_FILES);
        //echo "</pre>";


        $titulo = mysqli_real_escape_string( $db,  $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $creado = date('Y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];


        if(!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $descripcion ) < 50 ) {
            $errores[] = 'La Descripción es Obligatoria y debe tener al menos 50 caracteres';
        }

        // Validar por tamaño (1mb máximo)
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida ) {
            $errores[] = 'La Imagen es muy pesada';
        }


        //echo "<pre>";
        //var_dump($errores);
        //echo "</pre>";

        // Revisar que el array de errores esté vacío

        if(empty($errores)) {

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';
            

            /** SUBIDA DE ARCHIVOS */

            if($imagen['name']) {
                // Eliminar la imagen previa

                unlink($carpetaImagenes . $diseño['imagen']);

                // Generar un nombre unico
                $nombreImagen = md5( uniqid( rand(), true ) ) . "jpg";

                // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            } else {
                $nombreImagen = $diseño['imagen'];
            }

            
            // Insertar en la base de datos
            $query = " UPDATE diseños SET titulo = '{$titulo}', precio = '{$precio}', imagen = '{$nombreImagen}', descripcion = '{$descripcion}' WHERE id = {$id} ";

            //echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=2');
            }
        }
    }

    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Diseño</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Diseño" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" placeholder="Precio Diseño" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenDiseño; ?>" class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <input type="submit" value="Actualizar Diseño" class="boton boton-verde">

        </form>
    </main>

<?php incluirTemplate('footer'); ?>