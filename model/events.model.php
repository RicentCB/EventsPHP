<?php
    require_once ("conection.php");

    class EventsModel{
        /*-----------------------------------------
            Leer Datos de eventos
        -----------------------------------------*/
        static public function mdlReadEvents($item, $value){
            $sql  = "SELECT * FROM Eventos ";
            
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