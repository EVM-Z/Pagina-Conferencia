<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    // Definir archivo para cachear (puede ser .php también)
    $archivoCache = 'cache/'.$pagina.'.html';
    // Cuanto tiempo deberá estar este archivo almacenado
    // El tiempo esta en segundos 3600 s = 10 h
    $tiempo = 36000;
    // Checar que el archivo exista, el tiempo sea el adecuado y muestralo
    if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
    include($archivoCache);
        exit;
    }
    // Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
    ob_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Inicio</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
    
    <?php
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<link rel="stylesheet" href="css/colorbox.css">';
        }
        else if($pagina == 'conferencia'){
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />';
        }
    ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-1/css/fontawesome.min.css" integrity="sha512-QDQ0562x770FtnCCP199moaEUwDztn4b20jnXDDwYjPtTgUAAAVjyYX6zurspEoOdlqOxQ6YMRJ8GnISDDjsew==" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />


    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Add your site or application content here -->


    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>

                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fas fa-calendar-times"></i>10-12 Dic.</p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Cancun, Q. Roo</p>
                    </div>

                    <h1 class="nombre-sitio">cancunwebcamp</h1>
                    <p class="slogan">La mejor conferencia de <span>Diseño Web</span></p>
                </div>
                <!--.informacion-evento-->
            </div>
        </div>
        <!--.hero-->
    </header>

    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.svg" alt="Logo GDLWebCam">
                </a>
            </div>
            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
        </div>
        <!--.contenedor-->
    </div>
    <!--.barra-->