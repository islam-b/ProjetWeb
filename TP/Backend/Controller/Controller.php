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

            return $this->model->getTypes($id_ecole,$id_ecole);
        }
        
        public function createNewType($nom_type,$volume_h,$prixht,$tax,$id_ecole) {
        

            return $this->model->createNewType($nom_type,$volume_h,$prixht,$tax,$id_ecole);
        }
        
         public function createNewFormation($nom_formation,$id_type,$id_ecole) {

            return $this->model->createNewFormation($nom_formation,$id_type,$id_ecole);
        }
        
        public function deleteType($id_to_delete) {

            $this->model->deleteType($id_to_delete);
        }
        public function deleteFormation($id_to_delete) {

            $this->model->deleteFormation($id_to_delete);
        }
        
        public function updateType($id_type,$nom_type,$volume,$prixHT,$taxe) {


           return $this->model->updateType($id_type,$nom_type,$volume,$prixHT,$taxe);
        }
        
        public function updateForm($id_form,$nom_form) {

            $this->model->updateForm($id_form,$nom_form);
        }
        
        public function signIn($username,$password) {

            return $this->model->signIn($username,$password);
        }
         public function logOut() {
            

            return $this->model->logOut();
        }
        
         public function addTheme($titre,$bgColor,$bdColor,$textColor,$font) {
        

            return $this->model->addTheme($titre,$bgColor,$bdColor,$textColor,$font);
        }
        public function updateTheme($id) {
        

            return $this->model->updateTheme($id);
        }
        
        public function getThemes() {

            return $this->model->getThemes();
        }

        public function getSchoolName($id_ecole) {
            return $this->model->getSchoolName($id_ecole);
        }
    }
