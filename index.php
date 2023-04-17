<?php
require('../bienesraices/includes/funciones.php');
$inicio = true;
incluirTemplate('header', $inicio);

?>

<main class="contenedor seccion">
    <h1>Mas sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h2>Seguridad</h2>
            <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata
                corpora quaeritis. Summus brains sit​​.</p>
        </div>

        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono dinero" loading="lazy">
            <h2>Precio</h2>
            <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata
                corpora quaeritis. Summus brains sit​​.</p>
        </div>

        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h2>A tiempo</h2>
            <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata
                corpora quaeritis. Summus brains sit​​.</p>
        </div>

    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y departamentos en venta</h2>
    <!--Contenido dinamico php-->

    <?php
    $limite_resultados = 3;
     include 'includes/templates/anuncios.php' 

     ?>
    <!--Fin Contenido dinamico php-->
    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton--verde">Ver todas</a>
    </div>
</section>


<!--Encuentra la casa de tus suenos-->
<section class="imagen-contacto">
    <h2>Encuentra la casa de tus suenos</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo en la brevedad</p>
    <a href="contacto.php" class="boton--amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">

                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/12/2021</span> por: <span>Admin</span></p>
                    <p>
                        Consejos para construir una terraza en el techo con los mejores materiales y ahorrando
                        dinero.
                    </p>
                </a>

            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">

                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/12/2021</span> por: <span>Admin</span></p>
                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores
                        para darle vida a tu espacio.
                    </p>
                </a>

            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, my buena
                atencion y la casa que me ofrecieron cumple con todas
                mis expectativas.

                <p>-Antony Holguin</p>
            </blockquote>


        </div>
    </section>
</div> <!--Fin seccion-inferior  -->

<?php
incluirTemplate('footer');
?>