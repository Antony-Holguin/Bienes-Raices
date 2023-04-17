<?php
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //Filtro que solo se puedan pasar solo datos numericos y no cualquier cosa
if (!($id)) {
    header('Location: /bienesraices/admin');
}

//Base de datos
require('../../../bienesraices/includes/config/database.php');
$db = conectarDB();

//consultas de vendedores para llenar en ComboBox
$consultas = "SELECT * FROM propiedades WHERE id_propiedades = $id";
$resultado = mysqli_query($db, $consultas);
$propiedad = mysqli_fetch_assoc($resultado);
$imagen_propiedad = $propiedad['imagen_propiedades'];


$consultas = "SELECT * FROM vendedor";
$resultado = mysqli_query($db, $consultas);


$titulo = $propiedad['titulo_propiedades'];
$precio = $propiedad['precio_propiedades'];
$descripcion = $propiedad['descripcion_propiedades'];
$habitacion = $propiedad['nhabitaciones_propiedades'];
$bano = $propiedad['banos_habitaciones'];
$estacionamiento = $propiedad['estacionamiento_propiedades'];
$vendedor_id = $propiedad['id_vendedor'];
//Tamano de imagen maximo 1 MB
$max_tamano_imagen = 1000 * 1000;

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitacion = mysqli_real_escape_string($db, $_POST['habitacion']);
    $bano = mysqli_real_escape_string($db, $_POST['bano']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $creado = date('Y/m/d');
    $vendedor_id = mysqli_real_escape_string($db, $_POST['vendedor_id']);

    $imagen = $_FILES['imagen'];  //Este array forma parte de los globales, contiene varios datos

    //Validaciones
    $errores = [];



    if (empty($titulo)) {
        $errores[] = "Debes agregar un titulo";
    }

    if (empty($precio) || strlen($precio) > 10) {
        $errores[] = "Debes agregar un precio, ademas debe ser un precio maximo de 10 digitos";
    }

    if ($imagen['size'] > $max_tamano_imagen) {
        $errores[] = "El tamano de la imagen es muy grande (MAX 100-KB)";
    }

    if (empty($descripcion)) {
        $errores[] = "Debes agregar descripcion de la propiedad";
    } else {
        if (strlen($descripcion) < 50) {
            $errores[] = "La descripcion debe tener 50 caracteres";
        }
    }

    if (empty($habitacion)) {
        $errores[] = "Debes agregar un numero de habitaciones";
    }

    if (empty($bano)) {
        $errores[] = "Debes agregar un numero de banos";
    }

    if (empty($estacionamiento)) {
        $errores[] = "Debes agregar un numero de estacionamientos";
    }

    if (empty($vendedor_id)) {
        $errores[] = "Debe seleccionar un vendedor";
    }




    if (empty($errores)) {
        //Crear carpeta de imagenes
        $carpeta_imagenes = '../../imagenes/';

        //Si no se valida, la carpeta se crea multiples veces

        if (!(is_dir($carpeta_imagenes))) {
            mkdir($carpeta_imagenes);
        }

        $nombre_imagen = '';

        /**Subir archivos */
        if ($imagen['name']) { //Si hay una nueva imagen, se actualiza, caso contrario se deja la que estaba
            /**Si no esta vacio es porque hay un archivo */
            unlink($carpeta_imagenes . $propiedad['imagen_propiedades']);/**Este metodo sirve para borrar un archivo en el servidor */
            
            $nombre_imagen = md5(uniqid(rand(), true)) . ".jpg";  //No olvidar el punto, este le dara la extension del archivo
            move_uploaded_file($imagen['tmp_name'], $carpeta_imagenes . $nombre_imagen);
        }else{
            $nombre_imagen = $propiedad['imagen_propiedades'];
        }



        $query = "UPDATE propiedades SET titulo_propiedades = '$titulo', 
        precio_propiedades = $precio,
        imagen_propiedades = '$nombre_imagen',
        descripcion_propiedades = '$descripcion', 
        nhabitaciones_propiedades = $habitacion,
        banos_habitaciones = $bano,
        estacionamiento_propiedades = $estacionamiento,
        id_vendedor = $vendedor_id WHERE id_propiedades = $id;
        ";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /bienesraices/admin?resultado=2'); //Query String
        }
    }
}



require('../../includes/funciones.php');
incluirTemplate('header');
?>
<main class="contenedor seccion">

    <h1>Actualizar propiedad</h1>
    <a href="../" class="boton boton--verde">Volver</a>

    <!-- Imprimir mensajes de errores -->
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo  $error; ?>
        </div>

    <?php endforeach; ?>

    <form method="post" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" placeholder="Titulo propiedad" name="titulo" id="titulo" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" placeholder="Precio" name="precio" id="precio" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
            <img src="../../imagenes/<?php echo $imagen_propiedad; ?>" class="imagen-small">


            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion propiedad</legend>

            <label for="habitacion">Habitaciones:</label>
            <input type="number" id="habitacion" name="habitacion" placeholder="Ej:3" min="1" max="9" value="<?php echo $habitacion ?>">

            <label for="bano">Banos</label>
            <input type="number" id="bano" name="bano" placeholder="Ej:3" min="1" max="9" value="<?php echo $bano ?>">

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej:3" min="1" max="9" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor_id" id="vendedor_id">
                <option value="">-----Seleccione----</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedor_id == $row['id_vendedor'] ? 'selected' : ''; ?> value="<?php echo $row['id_vendedor']; ?> "><?php echo $row['nombre_vendedor'] . " " . $row['apellido_vendedor']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar propiedad" class="boton boton--verde">
    </form>

</main>



<?php
incluirTemplate('footer');
?>