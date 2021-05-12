<?php
    class UsersController{
        static public function ctrReadUsers($item=null, $value=null){
            $table = "usuarios";
            $clients = UsersModel::mdlReadUsers($item, $value);
            return $clients;
        }
    }