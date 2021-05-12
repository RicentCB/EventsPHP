<?php
    class EventsController{
        /* Leer Datos de Tabla eventos */
        static public function ctrReadEvents($item=null, $value=null){
            $clients = EventsModel::mdlReadEvents($item, $value);
            return $clients;
        }
    }