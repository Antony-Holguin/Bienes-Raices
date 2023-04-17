<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
    <title>Bienes raices</title>
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de bienes raices">
                </a>

                <!--Menu hamburguesa-->
                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="Menu hamburguesa">
                </div>
                <!--Fin Menu hamburguesa-->
                
                <div class="derecha">
                
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="Boton modo oscuro">
                
                
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>

            </div> <!--Cierre de barra-->

            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos exclusivos de Lujo</h1>' : ''; ?>
            
        </div>
    </header>