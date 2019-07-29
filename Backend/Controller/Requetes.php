<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Backend/Controller/Controller.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Backend/View/View.php');
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
            echo $controller->newSchool($_POST['nom'],$_POST['type'],$_POST['wilaya'],$_POST['commune'],$_POST['adresse'],$_POST['telephone']);
        }break;
        case 5:{
            echo $view->showSchoolList($_POST['type']);
        }break;
        case 6: {
            echo $view->showEditFormSchool($_POST['id_school']);
        }break;
        case 7: {
            echo $controller->updateSchool($_POST['nom'],$_POST['type'],$_POST['wilaya'],$_POST['commune'],$_POST['adresse'],$_POST['telephone'],$_POST['id_ecole']);
        }break;
        case 8: {
            echo $view->showSchoolRows($_POST['type']);
        }break;
        case 9: {
            echo $controller->updateSchoolState($_POST['state'],$_POST['id_ecole']);
        }break;
        case 10: {
            echo $controller->deleteSchool($_POST['id_ecole']);
        }break;
        case 11: {
            echo $controller->updateCommentState($_POST['id_user'],$_POST['allow']);
        }break;
        case 12: {
        echo $view->showSchoolOptions($_POST['type']);
         }break;
        case 13: {
            echo $view->showCommentRows($_POST['from_user'],$_POST['id']);
        }break;
        case 14: {
            echo $controller->deleteComment($_POST['id_comm']);
        }break;
        case 15: {
            echo $controller->deleteUser($_POST['id_user']);
        }break;
        case 16: {
            echo json_encode($controller->getRole($_POST['id_user']));
        }break;
        case 17: {
            echo $controller->updateRole($_POST['id_user'],$_POST['role'],$_POST['is_employee']);
        }break;
        default:{

        }
    }