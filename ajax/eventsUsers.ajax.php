<?php
    // Controlador
    require "../controller/events.controller.php";
    require "../controller/eventsUsers.controller.php";
    //Modelo
    require "../model/events.model.php";
    require "../model/eventsUsers.model.php";

    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case 'registerEventUser':
                $users = EventsUsersController::ctrReadEventsUsers();
                echo json_encode(array("type"=>"success", "message"=>$users));
                break;
            default:
                echo json_encode(array("type"=>"error", "message"=>"Accion no coincide con niguna opcion disponible"));
        }
    }else{
        echo json_encode(array("type"=>"error", "message"=>"Argumento accion no encontrada"));
    }