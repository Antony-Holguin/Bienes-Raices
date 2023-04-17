<?php
require('../bienesraices/includes/funciones.php');
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Anuncios</h1>
    <section class="seccion contenedor">
        <h2>Casas y departamentos en venta</h2>
        <?php
        $limite_resultados = 10;
        include 'includes/templates/anuncios.php';
        ?>
    </section>

</main>

<?php
incluirTemplate('footer');
?>