<?php

    require_once("../Controller/Controller.php");
    $controller=new Controller();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $res=$controller->signin($username,$password);
    if ($res==true) {
        echo ("TRUE");
    }
?>