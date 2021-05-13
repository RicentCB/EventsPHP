<?php
    require_once ("conection.php");

    class EventsUsersModel{
        /* Leer Datos de los eventos por usuario */
        static public function mdlTest(){
            $sql  = "DESCRIBE eventos_usuarios ";
            
            $stmt = Conexion::connect() -> prepare($sql);
            $stmt -> execute();
            return $stmt -> fetchALl();

        }
        static public function mdlCleanEventsUsers(){
            $sql  = "DELETE FROM eventos_usuarios ";
            
            $stmt = Conexion::connect() -> prepare($sql);
            if($stmt -> execute())
                return true;
            else
                return false;
        }
        /* Leer Datos de los eventos por usuario */
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
                return $stmt -> fetchAll();
            }
        }
        // Crear un evento por usuario
        static public function mdlCreateEventUsers($data){
            $idUser = $data["idUser"];
            $idEvent = $data["idEvent"];
            
            $sql = "INSERT INTO `eventos_usuarios`(`eventoID`, `usuarioID`) ";            
            $sql .= "VALUES (:idEvent, :idUser)";

            $pdo = Conexion::connect();
            $stmt = $pdo -> prepare($sql);

            $stmt -> bindParam(":idEvent", $idEvent);
            $stmt -> bindParam(":idUser", $idUser);

            if($stmt->execute())
                return true;
            else
                return false;
            $stmt -> close();
            $stmt = null;

        }
    }