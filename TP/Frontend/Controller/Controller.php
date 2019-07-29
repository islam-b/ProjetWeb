<?php
require_once("../Model/model.php");

class Controller {
    private $model;

    public function __construct()
    {
        $this->model=new Model();
    }

        public function getFormations($id_type,$id_ecole) {

            return $this->model->getFormations($id_type,$id_ecole);
            
        }
        public function getTypes($id_ecole) {

            return $this->model->getTypes($id_ecole);
        }
        
        public function signIn($username,$password) {

            return $this->model->signIn($username,$password);
        }
         public function logOut() {

            return $this->model->logOut();
        }
        
        public function getTheme() {

            return $this->model->getTheme();
        }
        public function getSchoolName($id_ecole) {
         return $this->model->getSchoolName($id_ecole);
        }
    }
