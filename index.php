<?php
    require_once "controller/main.controller.php";

    // Controlador
    require "controller/users.controller.php";
    require "controller/events.controller.php";

    //Modelo
    require "model/users.model.php";
    require "model/events.model.php";

    $main = new ControllerMain();
    $main -> ctrMain();