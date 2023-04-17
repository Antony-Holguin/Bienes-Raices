<?php
    require('../bienesraices/includes/funciones.php');
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="webp">
                    <source srcset="build/img/nosotros.jpg" type="jpg">
                    <img src="build/img/nosotros.jpg" alt="Imagen nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">

                <blockquote>25 anios de experiencia</blockquote>

                <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata
                    corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead
                    survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus
                    resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks
                    terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus.
                    Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies.
                    Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead. Cum horribilem walking dead resurgere de
                    crazed sepulcris creaturis, zombie sicut de grave feeding iride et serpens. Pestilentia, shaun ofthe
                    dead scythe animated corpses ipsa screams. Pestilentia est plague.</p>

                <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata
                    corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead
                    survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus
                    resi dentevil vultus comedat cerebella viventium. Qui animated corpse.</p>
            </div>
        </div>


    </main>

    <seccion class="contenedor seccion">
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
    </seccion>

<?php
    incluirTemplate('footer');
?>