<?php

    class ControllerMain{
    	static public function ctrMain(){
        session_start();
        if($_SESSION["login"]){
          include "view/main.php";
        }else{
          include "view/login.php";
        }
        }
    }	