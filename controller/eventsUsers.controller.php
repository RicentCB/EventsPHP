<?php
    class EventsUsersController{
        // Leer Datos de Tabla eventos 
        static public function ctrReadEventsUsers($item=null, $value=null){
            $clients = EventsUsersModel::mdlReadEventsUsers($item, $value);
            return $clients;
        }

        // Inscribir usuario en un nuevo evento
        static public function ctrCreateEventUsers($idEvent, $idUser){
            $data = array("idEvent"=>$idEvent, "idUser"=>$idUser);
            $ans = EventsUsersModel::mdlCreateEventUsers($data);
            return $ans;
        }

    }