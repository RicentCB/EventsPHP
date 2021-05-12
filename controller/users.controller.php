<?php
    class UsersController{
        static public function ctrReadUsers($item=null, $value=null){
            $clients = UsersModel::mdlReadUsers($item, $value);
            return $clients;
        }
    }