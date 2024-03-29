<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMX - Home Challenge</title>
    <!-- ------ PLUGINS CSS ------ -->
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Montserrat&family=Oswald&display=swap"
        rel="stylesheet">
    <!-- ------ CSS ------ -->
    <link rel="stylesheet" href="view/css/hamburger.min.css">
    <link rel="stylesheet" href="view/css/basic.css">
    <link rel="stylesheet" href="view/css/main.css">
    <!-- --- PLUGIS JS --- -->
    <script src="https://kit.fontawesome.com/faf5c76420.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <!-- Contenido del menu movil -->
    <ul id="mobile--menu" class="menu-content">
        <li>
            <a href="#" class="logout-btn">Cerrar Sesión</a>
        </li>
    </ul>
    <nav id="top-nav">
        <a href="#" class="home">
            <?php
                echo($_SESSION["user"]["username"]);
            ?>
        </a>
        <div class="left-buttons">
            <div class="menu-container">
                <a class="hamburger hamburger--slider" href="#">
                    <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                    </span>
                </a>
                <ul id="desktop--menu" class="menu-content">
                    <li>
                        <a href="#" class="logout-btn">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>
    <!-- Contendor de la Principal -->
    <main id="events" iduser="<?php echo($_SESSION["user"]["idUser"])?>">
        <h1>Eventos Disponibles</h1>
        <section class="events-container" id="events-not-registered">
            <!-- <div class="event">
                <h2>Titulo</h2>
                <h3>Fecha</h3>
                <p>Descripcion</p>
                <a href="#" class="start-button">
                    <span>Inscribirse</span>
                    <svg width="13px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </a>
            </div> -->
        </section>
        <div id="events-registered-container">
            <h1>Eventos ya registrados</h1>
            <section class="events-container" id="events-registered">
                <!-- TODO: Cambiar estilo al boton de cancelar -->
            </section>
        </div>
    </main>
    <?php
        // $truncate = EventsUsersModel::mdlCleanEventsUsers();
        // echo "<pre>";
        //     echo ($truncate);
        // echo "</pre>";
        // $users = EventsUsersModel::mdlReadEventsUsers(NULL, NULL);
        // echo "<pre>";
        // var_dump($users);
        // echo "</pre>";
    ?>

    <!-- ======== SCRIPTS ======== -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../common/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/plugins/CSSRulePlugin.min.js"></script>
    <!-- Custom Script -->
    <script src="view/js/main.js"></script>

</body>

</html>