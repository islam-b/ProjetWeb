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
            $query="select * from types_formation where id_ecole = ".$id_ecole;
            $res=$this->bdd->query($query);
            return $res;
             
        }
        
        public function getFormations($id_type,$id_ecole) {
             $query="select * from formation where id_type=".$id_type." and id_ecole = ".$id_ecole;
            $res=$this->bdd->query($query);
            return $res;
        }
        

        public function createNewType($nom_type,$volume_h,$prixht,$tax,$id_ecole) {

            $query="insert into types_formation (id_ecole,nom_type, volume, prixHT, taxe) VALUES (".$id_ecole.",'".$nom_type."','".$volume_h."','".$prixht."','".$tax."')";
            $this->bdd->query($query);
            return $this->bdd->lastInsertId();
        }
        
        public function createNewFormation($nom_formation,$id_type,$id_ecole) {

         $query="insert into formation (id_ecole,id_type,nom_formation) VALUES (".$id_ecole.",'".$id_type."','".$nom_formation."')";
            $this->bdd->query($query);
            return $this->bdd->lastInsertId();
            
        }
        public function deleteType($id_to_delete) {
             $query="delete from formation where id_type='".$id_to_delete."'";
                $this->bdd->query($query);
                $query="delete from types_formation where id_type='".$id_to_delete."'";
                $this->bdd->query($query);
        }
        
        public function deleteFormation($id_to_delete) {
            $query="select * from formation where id_formation='".$id_to_delete."'";
                $res=$this->bdd->query($query);
                $row=$res->fetch();
                $id_type=$row['id_type'];
                echo $id_type;
                $query="delete from formation where id_formation='".$id_to_delete."'";
                $this->bdd->query($query);

                $query="select * from formation where id_type='".$id_type."'";
                $res=$this->bdd->query($query);
                if (!($data=$res->fetch())) {
                    $this->bdd->query("delete from types_formation where id_type='".$id_type."'");
                }
        }
        
        public function updateType($id_type,$nom_type,$volume,$prixHT,$taxe) {
            $query="update types_formation SET nom_type='".$nom_type."', volume='".$volume."', prixHT='".$prixHT."', taxe='".$taxe."' where id_type='". $id_type."'";
            return $this->bdd->query($query);
        }
        
        public function updateForm($id_form,$nom_form) {
             $query="update formation SET nom_formation='".$nom_form."' where id_formation='". $id_form."'";
            $this->bdd->query($query);
        }
        
        
        public function updateTheme($id) {
            $row=$this->getTheme($id);
            $titre=$row['titre'];
            $bgColor=$row['primaryColor'];
            $bdColor=$row['secondaryColor'];
            $textColor=$row['textColor'];
            $font=$row['font'];
            $query="update theme SET titre='".$titre."', primaryColor='".$bgColor."', secondaryColor='".$bdColor."', textColor='".$textColor."', font='".$font."' where id= 1";
            $this->bdd->query($query);
            return $query;
        }
        public function addTheme($titre,$bgColor,$bdColor,$textColor,$font) {
           
            $query="insert into theme (titre, primaryColor, secondaryColor, textColor, font) VALUES ('".$titre."','".$bgColor."','".$bdColor."','".$textColor."','".$font."')";
             $stmt = $this->bdd->prepare($query);
           $stmt->execute();
            $id=$this->bdd->lastInsertId();
            return $id;
        }
        
        public function getTheme($id) {
            $stmt = $this->bdd->prepare("select * from theme where id ='".$id."'"); 
            $stmt->execute(); 
            $row = $stmt->fetch();
         
            return $row;
        
        }
        public function getThemes() {
            $statement = $this->bdd->prepare("SELECT * FROM theme where id<>1");
                $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
           return $results;
            
    
        
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

        public function getSchoolName($id_ecole) {
            $stmt = $this->bdd->prepare("select * from ecole where id_ecole = ?");
            $stmt->execute(array($id_ecole));
            $row = $stmt->fetch();
            return $row['nom'];
        }
        
  
    }

?>