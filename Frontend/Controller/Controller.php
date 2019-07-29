<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Frontend/Model/Model.php');
class Controller
{
    private $model;
    public function __construct() {
        $this->model=new Model();
    }

    public function getEcolesFormations($type) {
        return $this->model->getEcolesFormations($type);
    }

    public function signUp($username,$password,$nom,$prenom) {
        $res=$this->model->signUp($username,$password,$nom,$prenom);
        if ($res[0]>0) {
            $this->signIn($username,$password);
        }
        return $res;
    }

    public function signIn($username,$password) {
        $res=$this->model->signIn($username,$password);
        if ($res[0]>0) {
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['id_user']=$res[2];
            $_SESSION['nom']=$res[3];
            $_SESSION['prenom']=$res[4];
            $_SESSION['is_employee']=$res[5];
            $_SESSION['allow_comment']=$res[6];
        }
        return $res;
    }

    public function logOut() {
        session_start();
        session_destroy();
    }

    public function getComments($id_ecole) {
        return $this->model->getComments($id_ecole);
    }

    public function getAnswers($id_comment)
    {
        return $this->model->getAnswers($id_comment);
    }

    public function newComment($id_user,$id_ecole,$comment,$is_answer_to) {
        return $this->model->newComment($id_user,$id_ecole,$comment,$is_answer_to);
    }

    public function getFormations($id_ecole) {
        return $this->model->getFormations($id_ecole);
    }

    public function can_comment($id_user) {
        $res=$this->model->can_comment($id_user);
        if ($res!=0) return true;
        else return false;
    }




}