<?php
    class UsersController{
        static public function ctrReadUsers($item=null, $value=null){
            $clients = UsersModel::mdlReadUsers($item, $value);
            return $clients;
        }
        static public function ctrLoginUser($inUser, $inPassword){
            require_once("../global.php");
            if($inUser == '')
                $inUser = 'UserDefault';
            if(true){
                session_start();
                $_SESSION["login"] = true;
                $_SESSION["user"] = array("username"=>$GLOBALVAR["nameDefaultUser"], "idUser"=>$GLOBALVAR["idDefaultUser"]);
                return true;
            }
            return false;
        }
        //TODO:validacion para inscribir el usuario en un evento
        //Boton para quitarle a un usuario su evento
        static public function ctrLogoutUser(){
            session_start();
            session_destroy();
            return true;
        }
    }