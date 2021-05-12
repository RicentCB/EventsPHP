<?php
    require_once ("conection.php");

    class EventsUsersModel{
        /* Leer Datos de usuario */
        static public function mdlReadEventsUsers($item, $value){
            $sql  = "SELECT * FROM eventos_usuarios ";
            
            if($item == null){
                $stmt = Conexion::connect() -> prepare($sql);
                $stmt -> execute();
                return $stmt -> fetchALl();
            }else{
                $sql .= "WHERE $item LIKE :item ";
                $stmt = Conexion::connect() -> prepare($sql);
                $stmt -> bindParam(":item", $value);
                $stmt -> execute();
                return $stmt -> fetch();
            }
        }
    }