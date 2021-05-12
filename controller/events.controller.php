<?php
    class EventsController{
        /* Leer Datos de Tabla eventos */
        static public function ctrReadEvents($item=null, $value=null){
            $events = EventsModel::mdlReadEvents($item, $value);
            return $events;
        }
    }