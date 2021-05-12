<?php
    // Controlador
    require "../controller/users.controller.php";
    //Modelo
    require "../model/users.model.php";

    if(isset($_GET["action"])){
        switch($_GET["action"]){
            case 'readUsers':
                $users = UsersController::ctrReadUsers();
                echo json_encode(array("type"=>"success", "message"=>$users));
                break;
            default:
                echo json_encode(array("type"=>"error", "message"=>"Accion no coincide con niguna opcion disponible"));
        }
    }else{
        echo json_encode(array("type"=>"error", "message"=>"Argumento accion no encontrada"));
    }