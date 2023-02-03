<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>


    <section class="seccion contenedor">
        <h2>Nuestros trabajo</h2>

        <?php
            $limite = 3;
            include 'includes/templates/diseños.php';
        ?>

        <div class="alinear-derecha">
            <a  href="diseños.php" class="btn btn3">Ver Todos</a> <!-- boton-verde -->
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra el diseño que más te guste</h2>
        <p>Para info y pedidos, manda un mensaje directo</p>
        <a href="contacto.php" class="boton-azul">Contáctanos</a>
    </section>

    <div class="contenedor">
        <section>
            <h3>Testimonios</h3>

            <div class="contenedor-anuncios">
                <div data-aos="fade-right" data-aos-duration="3000" class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atención y la casa que ofrecieron
                        cumple con todas mis expectativas
                    </blockquote>
                    <p>- Antonio Sanz</p>
                </div>

                <div data-aos="fade-up" data-aos-duration="3000" class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atención y la casa que ofrecieron
                        cumple con todas mis expectativas
                    </blockquote>
                    <p>- Antonio Sanz</p>
                </div>

                <div data-aos="fade-left" data-aos-duration="3000" class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atención y la casa que ofrecieron
                        cumple con todas mis expectativas
                    </blockquote>
                    <p>- Antonio Sanz</p>
                </div>

            </div>


        </section>
    </div>

<?php include 'includes/templates/footer.php'; ?>