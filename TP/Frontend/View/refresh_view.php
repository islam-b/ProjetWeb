<?php 

    require_once("./indexView.php");
    $view=new View();
    $area=$_POST['area'];

    switch ($area) {
        case "ul": {
            echo $view->showMenu($_POST['id_ecole']);
            
        }break;
        case "tbody": {
            echo $view->showFormations($_POST['id_ecole']);
        }
    }

