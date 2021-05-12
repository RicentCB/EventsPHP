<?php
    require_once ("conection.php");

    class UsersModel{
        /*-----------------------------------------
            Leer Datos de usuario
        -----------------------------------------*/
        static public function mdlReadUsers($item, $value){
            $sql  = "SELECT * FROM Usuarios ";
            
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