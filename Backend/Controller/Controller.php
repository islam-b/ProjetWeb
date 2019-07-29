<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Backend/Model/Model.php');
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

    public function newSchool($nom,$type,$wilaya,$commune,$adresse,$telephone)  {
        return $this->model->newSchool($nom,$type,$wilaya,$commune,$adresse,$telephone) ;
    }

    public function updateSchool ($nom,$type,$wilaya,$commune,$adresse,$telephone,$id_ecole)  {
        return $this->model->updateSchool($nom,$type,$wilaya,$commune,$adresse,$telephone,$id_ecole) ;
    }

    public function updateSchoolState($state,$id_ecole) {
        return $this->model->updateSchoolState($state,$id_ecole);
    }
    public function getSchool($id_ecole)
    {
        return $this->model->getSchool($id_ecole);
    }
    public function deleteSchool($id_ecole) {
        return $this->model->deleteSchool($id_ecole);
    }

    public function getMembers() {
        return $this->model->getMembers();
    }

    public function updateCommentState($id_user,$allow) {
        return $this->model->updateCommentState($id_user,$allow);
    }

    public function getAllcomments($from_user,$id) {
        return $this->model->getAllcomments($from_user,$id);
    }
    public function deleteComment($id_comm) {
        return $this->model->deleteComment($id_comm);
    }

    public function deleteUser($id_user) {
        return  $this->model->deleteUser($id_user);
    }

    public function getRole($id_user) {
        return  $this->model->getRole($id_user);
    }

    public function getAllSch() {
        return $this->model->getAllSch();
    }

    public function updateRole($id_user,$role,$is_employee) {
        return $this->model->updateRole($id_user,$role,$is_employee);
    }



    }