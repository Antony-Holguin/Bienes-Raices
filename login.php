<?php
require 'includes/config/database.php';
$db = conectarDB();
//Validar usuario
$errores = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Capturar las variables
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (!$email || empty($email)) {
        $errores[] = 'El email es invalido o esta vacio';
    }

    if (!$password || empty($password)) {
        $errores[] = 'La contrasena no es valida';
    }


    if (empty($errores)) {
        //Consultar si hay registro con el email especificado
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultados = mysqli_query($db, $query);



        //Consultar numeros de columnas
        if ($resultados->num_rows) {  //Si hay resultados 
            $usuario = mysqli_fetch_assoc($resultados);
            $autenticado = password_verify($password, $usuario['password']);
            if($autenticado){
                session_start();
                echo '<pre>';
                    var_dump($_SESSION);
                echo '</pre>';
            }else{
                $errores[] = 'La contrasena es invalida';
            }
        } else {
            $errores[] = 'El usuario no existe';
        }
    }
}


//Incluir cabecera
require('../bienesraices/includes/funciones.php');
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesion</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Email y password</legend>
            <label for="email">Email:</label> <input required type="email" placeholder="Tu email" id="email" name="email">
            <label for="Password">Password:</label> <input type="password" placeholder="Password" id="password" name="password">
        </fieldset>
        <input type="submit" value="Iniciar sesion" class="boton boton--verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>