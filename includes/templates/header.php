<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img data-aos="zoom-in" data-aos-duration="3000" src="/build/img/vipa.png" alt="Logotipo de VipaDetalles">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <nav class="navegacion animate__animated animate__lightSpeedInRight">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="diseños.php">Diseños</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
            </div>
            <?php echo $inicio ? "<h1>Detalles artesanales hechos a mano</h1>" : ''; ?>
        </div>
    </header>