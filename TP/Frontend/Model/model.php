<?php
    
    class Model {
        
        private $bdd;
        
        public function __construct() {
            try {
                $this->bdd = new PDO('mysql:host=localhost;dbname=tdw;charset=utf8', 'root', '');
            } catch (PDOException $e) {
                echo("Echec de connexion : " . $e->getMessage);
            }
        }
        
        public function getTypes($id_ecole) {
            $query="select * from types_formation where id_ecole= ".$id_ecole;
            $res=$this->bdd->query($query);
            return $res;
             
        }
        
        public function getFormations($id_type,$id_ecole) {
             $query="select * from formation where id_type=".$id_type." and id_ecole=".$id_ecole;
            $res=$this->bdd->query($query);
            return $res;
        }
        
        public function signIn($username,$password) {
            $query="select * from user where username = '".$username."'";
            $res=$this->bdd->query($query);
     
            foreach ($res as $row) {
                if ($row['password']===$password) {
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['password']=md5($password);        
                }
            }
        }
        
        public function logOut() {
            session_start();
            session_destroy();
        }
        
        public function getTheme() {
            $stmt = $this->bdd->prepare("select * from theme where id = 1"); 
            $stmt->execute(); 
            $row = $stmt->fetch();
            return $row;
        }

        public function getSchoolName($id_ecole) {
            $stmt = $this->bdd->prepare("select * from ecole where id_ecole = ?");
            $stmt->execute(array($id_ecole));
            $row = $stmt->fetch();
            return $row['nom'];
        }
    }

