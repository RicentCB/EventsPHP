<?php
    // Controlador
    require "../controller/events.controller.php";
    require "../controller/eventsUsers.controller.php";
    //Modelo
    require "../model/events.model.php";
    require "../model/eventsUsers.model.php";

    if(isset($_GET["action"])){
        switch($_GET["action"]){
            case 'getAvailableEvents':
                $idUser = (int) $_GET["idUser"];
                $eventsAvaileble = EventsController::ctrGetNotRegisteredEvents($idUser);
                echo json_encode(array("type"=>"success", "message"=>$eventsAvaileble));
                break;
            case 'getAlreadyRegisteredEvents':
                $idUser = (int) $_GET["idUser"];
                $eventsAvailable = EventsController::ctrGetRegisteredEvents($idUser);
                echo json_encode(array("type"=>"success", "message"=>$eventsAvailable));
                break;
            default:
                echo json_encode(array("type"=>"error", "message"=>"Accion no coincide con niguna opcion disponible"));
        }
    }else{
        echo json_encode(array("type"=>"error", "message"=>"Argumento accion no encontrada"));
    }