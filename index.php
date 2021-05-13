<?php
    require_once "global.php";
    require_once "controller/main.controller.php";

    // Controlador
    require "controller/users.controller.php";
    require "controller/events.controller.php";
    require "controller/eventsUsers.controller.php";

    //Modelo
    require "model/users.model.php";
    require "model/events.model.php";
    require "model/eventsUsers.model.php";

    $main = new ControllerMain();
    $main -> ctrMain();