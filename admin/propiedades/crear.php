<?php
//Base de datos
require('../../includes/funciones.php');
$auth = estaAutenticado();
if(!$auth){
    header('Location: ../');
}
require('../../../bienesraices/includes/config/database.php');
$db = conectarDB();

//consultas de vendedores para llenar en ComboBox
$consultas = "SELECT * FROM vendedor";
$resultado = mysqli_query($db, $consultas);


$titulo = '';
$precio = '';
$descripcion = '';
$habitacion = '';
$bano = '';
$estacionamiento = '';
$vendedor_id = '';
//Tamano de imagen maximo 1 MB
$max_tamano_imagen = 1000*1000;

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db,$_POST['precio']);
    $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
    $habitacion = mysqli_real_escape_string($db,$_POST['habitacion']);
    $bano = mysqli_real_escape_string($db,$_POST['bano']);
    $estacionamiento = mysqli_real_escape_string($db,$_POST['estacionamiento']);
    $creado = date('Y/m/d');
    $vendedor_id = mysqli_real_escape_string($db,$_POST['vendedor_id']);

    $imagen = $_FILES['imagen'];  //Este array forma parte de los globales, contiene varios datos

    //Validaciones
    $errores = [];



    if (empty($titulo)) {
        $errores[] = "Debes agregar un titulo";
    }

    if (empty($precio) || strlen($precio) >10) {
        $errores[] = "Debes agregar un precio, ademas debe ser un precio maximo de 10 digitos";
    }

    if(!$imagen['name']){
        $errores[] = "La imagen es obligatoria";
    }

    if($imagen['size'] > $max_tamano_imagen){
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
        if(!(is_dir($carpeta_imagenes))){
            mkdir($carpeta_imagenes);
        }
        $nombre_imagen = md5(uniqid(rand(), true)).".jpg";  //No olvidar el punto, este le dara la extension dela archivo
        move_uploaded_file($imagen['tmp_name'], $carpeta_imagenes.$nombre_imagen); //  ../../imagenes/sfwageau74htr7.jpg


        $query = "INSERT INTO propiedades (titulo_propiedades, precio_propiedades, imagen_propiedades,descripcion_propiedades, nhabitaciones_propiedades, banos_habitaciones, estacionamiento_propiedades, creado,id_vendedor) VALUES ('$titulo',
        '$precio', '$nombre_imagen','$descripcion', '$habitacion', '$bano', '$estacionamiento', '$creado','$vendedor_id')";

        $resultado = mysqli_query($db, $query);

        if($resultado){
            header('Location: /bienesraices/admin?resultado=1'); //Query String
        }
    }
}




incluirTemplate('header');
?>
<main class="contenedor seccion">

    <h1>Crear</h1>
    <a href="../" class="boton boton--verde">Volver</a>

    <!-- Imprimir mensajes de errores -->
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo  $error; ?>
        </div>

    <?php endforeach; ?>

    <form action="crear.php" method="post" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" placeholder="Titulo propiedad" name="titulo" id="titulo" value="<?php echo $titulo?>">

            <label for="precio">Precio:</label>
            <input type="number" placeholder="Precio" name="precio" id="precio" value="<?php echo $precio?>">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion?></textarea>
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
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedor_id == $row['id_vendedor'] ? 'selected' : '';?> value="<?php echo $row['id_vendedor']; ?> "><?php echo $row['nombre_vendedor']." ".$row['apellido_vendedor']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear propiedad" class="boton boton--verde">
    </form>

</main>



<?php
incluirTemplate('footer');
?>