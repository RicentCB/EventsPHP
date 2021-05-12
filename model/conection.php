<?php
    class Conexion{

        static public function connect(){

            $serv = "blue-database.cnr6gomwrolg.us-east-1.rds.amazonaws.com";
            $db = "amxtest";
            $user = "amx_test";
            $pass = "32k/*<PKq.y!YYrV";
    
            $link = new PDO("mysql:host=".$serv.";dbname=".$db."",
                        $user,
                        $pass);
    
            $link->exec("set names utf8");
    
            return $link;
    
        }
    
    }