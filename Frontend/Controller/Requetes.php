<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Frontend/Controller/Controller.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Frontend/View/View.php');
$controller=new Controller();
$view=new View();
$requete=$_POST['num'];

    switch ($requete) {
        case 1:{
            echo json_encode($controller->signUp($_POST['username'],$_POST['password'],$_POST['nom'],$_POST['prenom']));
        }break;
        case 2:{
            echo json_encode($controller->signIn($_POST['username'],$_POST['password']));
        }break;
        case 3:{
            $controller->logout();
        }break;
        case 4: {
            session_start();
            echo $controller->newComment($_SESSION['id_user'],$_POST['id_ecole'],$_POST['comment'],$_POST['is_answer_to']);
        }break;
        case 5:{
            echo json_encode($controller->getEcolesFormations($_POST['type']));
        }break;
        case 6: {
            echo json_encode(array($view->fillFormationsTab($_POST['id_ecole']),$view->fillComments($_POST['id_ecole'])));
        }break;
        default:{

        }
    }