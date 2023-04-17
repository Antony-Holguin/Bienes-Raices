<?php
//Importar la conexion de base de datos
require '../../bienesraices/includes/config/database.php';
$db = conectarDB();

//Escribir query
$query = "SELECT * FROM propiedades";

//Consulta a la base de datos
$resultado_consulta = mysqli_query($db, $query);


$resultado = $_GET['resultado'] ?? null; //Operador de fusion de null

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Si hay una peticion POST
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //Eliminar imagen
        $query = "SELECT imagen_propiedades FROM propiedades WHERE id_propiedades = ${id}";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../../imagenes/' . $propiedad['imagen_propiedades']);


        //Eliminar propiedad
        $query = "DELETE FROM propiedades WHERE id_propiedades = ${id}";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /bienesraices/admin?resultado=3');
        }
    }
}

require('../includes/funciones.php');
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Casa Registrada correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Propiedad Actualizada Correctamente</p>

    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta exito">Casa eliminada correctamente</p>
    <?php endif; ?>



    <a href="../admin/propiedades/crear.php" class="boton boton--verde">Nueva propiedad</a>

    <!--Tabla con registros de base de datos-->
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultado_consulta)) : ?>
                <tr>
                    <td><?php echo $row['id_propiedades']; ?></td>
                    <td><?php echo $row['titulo_propiedades']; ?></td>
                    <td> <img src="<?php echo '../imagenes/' . $row['imagen_propiedades']; ?>" class="imagen-tabla"> </td>
                    <td><?php echo $row['precio_propiedades'] ?></td>
                    <td>

                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $row['id_propiedades'] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="../admin/propiedades/actualizar.php?id=<?php echo $row['id_propiedades']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>


<?php

//Cerrar conexion
mysqli_close($db);
incluirTemplate('footer');
?>