<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
?>

<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="diseños.php">Diseños</a>
                <a href="contacto.php">Contacto</a>
                <?php if($auth): ?>
                    <a href="/admin/index.php">Admin</a>
                    <a href="cerrar-sesion.php">Cerrar Sesión</a>
                <?php endif; ?>
                <?php if(!$auth): ?>
                    <a href="login.php">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>