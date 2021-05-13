<?php
    class EventsController{
        /* Leer Datos de Tabla eventos */
        static public function ctrReadEvents($item=null, $value=null){
            $events = EventsModel::mdlReadEvents($item, $value);
            return $events;
        }
        // Obtener eventos a los cuales no este registrado el usuario
        static public function ctrGetNotRegisteredEvents($idUser){
            //Leer todos los eventos
            $allEvents = EventsController::ctrReadEvents();
            //Leer eventos a los cuales ya se ha registrado el usuario
            $eventsRegistered = EventsUsersController::ctrReadEventsUsers("usuarioID", $idUser);
            $eventsNotRegistered = array();
            //Verficiar que eventos no se ha inscrito el usuario
            foreach ($allEvents as $event) {
                $isAlreadyRegistered = false;
                foreach($eventsRegistered as $eventRegistered){
                    if($event["eventoID"] == $eventRegistered["eventoID"])
                        $isAlreadyRegistered = true;
                }
                if(!$isAlreadyRegistered)
                    array_push($eventsNotRegistered, $event);
            }
            return $eventsNotRegistered;
        }


        // Obtener eventos a los cuales YA este registrado el usuario
        static public function ctrGetRegisteredEvents($idUser){
            //Leer todos los eventos
            $allEvents = EventsController::ctrReadEvents();
            //Leer eventos a los cuales ya se ha registrado el usuario
            $eventsRegistered = EventsUsersController::ctrReadEventsUsers("usuarioID", $idUser);
            $eventsRegistered = array();
            //Verficiar que eventos no se ha inscrito el usuario
            foreach ($allEvents as $event) {
                $isAlreadyRegistered = false;
                foreach($eventsRegistered as $eventRegistered){
                    if($event["eventoID"] == $eventRegistered["eventoID"])
                        $isAlreadyRegistered = true;
                }
                if($isAlreadyRegistered)
                    array_push($eventsRegistered, $event);
            }
            return $eventsRegistered;
        }
    }