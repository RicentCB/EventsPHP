<?php
    require_once "controller/main.controller.php";

    // Controlador
    require "controller/users.controller.php";

    //Modelo
    require "model/users.model.php";

    $main = new ControllerMain();
    $main -> ctrMain();