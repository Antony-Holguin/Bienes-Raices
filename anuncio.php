<?php
    require('../bienesraices/includes/funciones.php');
    incluirTemplate('header');

    //Importar conexion
    include 'includes/config/database.php';
    $db = conectarDB();
    //Crear query
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /bienesraices');
    }
    $query = "SELECT * FROM propiedades WHERE id_propiedades = $id";
    //Guardar el resultado en una variable
    $resultado = mysqli_query($db, $query);

    if($resultado->num_rows === 0){
        header('Location: /bienesraices');
    }

    $propiedad = mysqli_fetch_assoc($resultado);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo_propiedades']?></h1>
            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen_propiedades']?>" alt="Anuncio 1">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad['precio_propiedades']?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['banos_habitaciones']?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento_propiedades']?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['nhabitaciones_propiedades']?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion_propiedades']?></p>
        </div>
    
    </main>

<?php
    incluirTemplate('footer');
?>