<?php
    class EventsUsersController{
        /* Leer Datos de Tabla eventos */
        static public function ctrReadEventsUsers($item=null, $value=null){
            $clients = EventsUsersModel::mdlReadEventsUsers($item, $value);
            return $clients;
        }
    }