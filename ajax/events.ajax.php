<?php
    // Controlador
    require "../controller/events.controller.php";
    //Modelo
    require "../model/events.model.php";

    if(isset($_GET["action"])){
        switch($_GET["action"]){
            case 'readEvents':
                $users = EventsController::ctrReadEvents();
                echo json_encode(array("type"=>"success", "message"=>$users));
                break;
            default:
                echo json_encode(array("type"=>"error", "message"=>"Accion no coincide"));
        }
    }else{
        echo json_encode(array("type"=>"error", "message"=>"Argumento accion no encontrada"));
    }