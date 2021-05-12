<?php
    // Controlador
    require "../controller/users.controller.php";
    //Modelo
    require "../model/users.model.php";

    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case 'login':
                $inUser = $_POST["user"];
                $inPass= $_POST["pass"];
                $user = UsersController::ctrLoginUser($inUser, $inPass);
                if($user)
                    echo json_encode(array("type"=>"success"));
                else
                    echo json_encode(array("type"=>"error", "message"=>"Error al iniciar sesion"));
                break;
            default:
                echo json_encode(array("type"=>"error", "message"=>"Accion no coincide con niguna opcion disponible"));
        }
    }else{
        echo json_encode(array("type"=>"error", "message"=>"Argumento accion no encontrada en Users Ajax"));
    }