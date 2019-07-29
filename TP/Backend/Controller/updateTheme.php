<?php 

    require_once("../Controller/Controller.php");
    $controller=new Controller();
    $id=$_POST['id'];
    $controller->updateTheme($id);

