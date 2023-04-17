<?php
//Importar la base
include __DIR__ . '/../config/database.php';
$db = conectarDB();
//Hacer la consulta
$query = "SELECT * FROM propiedades LIMIT $limite_resultados";
//Guardar en una variable el resultado de la consulta
$resultado = mysqli_query($db, $query);

function truncate(string $texto, int $cantidad) : string
{
    if(strlen($texto) >= $cantidad) {
        return "<span title='$texto'>" . substr($texto, 0, $cantidad) . " ...</span>";
    } else {
        return $texto;
    }
}
?>

<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">


            <img src="imagenes/<?php echo $propiedad['imagen_propiedades']; ?>" alt="">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo_propiedades'] ?></h3>
                <p><?php echo truncate($propiedad['descripcion_propiedades'],40); ?></p>
                <p class="precio"><?php echo $propiedad['precio_propiedades']?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo  $propiedad['banos_habitaciones']?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo  $propiedad['estacionamiento_propiedades']?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo  $propiedad['nhabitaciones_propiedades']?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad['id_propiedades']?>" class="boton--amarillo--block">Ver propiedad</a>
            </div>
        </div>
    <?php endwhile; ?>
</div> <!--Fin .contenedor_anuncios-->

<?php
//Cerrar conexion


?>