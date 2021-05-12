<?php
    class UsersController{
        static public function ctrReadUsers($item=null, $value=null){
            $clients = UsersModel::mdlReadUsers($item, $value);
            return $clients;
        }
        static public function ctrLoginUser($inUser, $inPassword){
            if(true){
                $_SESSION["login"] = true;
                return true;
            }
            return false;
        }
        //TODO: Boton para "cerrar la sesion"
        //validacion para inscribir el usuario en un evento
        //Boton para quitarle a un usuario su evento
        static public function ctrLogoutUser(){
            session_start();
            session_destroy();
            return true;
        }
    }