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
                $idEvent = $_POST["idEvent"];
                $idUser = $_POST["idUser"];
                $registered = EventsUsersController::ctrCreateEventUsers($idEvent, $idUser);
                echo json_encode(array("type"=>"success", "message"=>$registered));
                break;
            case 'readEventUsersIdUser':
                $idUser = $_POST["idUser"];
                // $registered = EventsUsersController::ctrReadEventsUsers("usuarioID", $idUser);
                $registered = EventsUsersController::ctrGetNotRegisteredEvents($idUser);
                
                echo json_encode(array("type"=>"success", "message"=>$registered));
                break;
            default:
                echo json_encode(array("type"=>"error", "message"=>"Accion no coincide con niguna opcion disponible"));
        }
    }else{
        echo json_encode(array("type"=>"error", "message"=>"Argumento accion no encontrada"));
    }