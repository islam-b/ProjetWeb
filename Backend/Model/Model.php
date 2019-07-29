<?php
class Model
{

    private $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=tdw;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            echo("Echec de connexion : " . $e->getMessage);
        }
    }

    public function getEcolesFormations($type)
    {
        $query = "select * from ecole where type = '".$type."'";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function signUp($username,$password,$nom,$prenom) {
        if (!$this->existingUser($username)) {
            $query="insert into user (username, password, nom ,prenom) values (?,?,?,?)";
            $stmt=$this->bdd->prepare($query);
            $r=$stmt->execute(array($username,$password,$nom,$prenom));
            if ($r!==false) return (array($this->bdd->lastInsertId(),"Inscription avec succes."));
            else return array(-1,"Erreur d'inscription.");
        } else {
            return array(0,"Ce nom d'utilisateur existe deja !");
        }
    }

    public function signIn($username,$password) {

        if ($this->existingUser($username)) {
            $query = "select * from user where username= ? and password= ?";
            $stmt = $this->bdd->prepare($query);
            $r=$stmt->execute(array($username,$password));
            if ($r!==false) {
                $res = $stmt->fetch();
                if ($res['username']!==null) return (array(1,"Connexion avec succés",$res['id_user'],$res['nom'],$res['prenom'],$res['is_employee']));
                return array(-2,"Mot de passe incorrect");
                } else {
                return array(-1, "Erreur de connexion");
                }
            }else {
            return array(0, "Nom d'utilisateur introuvable");
        }

    }

    private function existingUser($username) {
        $query="select * from user where username= ?";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute(array($username));
        $res=$stmt->fetch();
        if ($res['username']!==null) return true;
        else return false;
    }
    public function getComments($id_ecole) {
        $query="select comment,id_comment,id_ecole, date, user.id_user, nom ,prenom from commentaire join user on user.id_user=commentaire.id_user where id_ecole= ? and is_reponse_to=0 order by date desc ";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute(array($id_ecole));
        $res=$stmt->fetchAll();
        return $res;
    }

    public function getAnswers($id_comment) {
        $query="select comment,id_comment,id_ecole, date, user.id_user, nom ,prenom from commentaire join user on user.id_user=commentaire.id_user where is_reponse_to= ? order by date desc";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute(array($id_comment));
        $res=$stmt->fetchAll();
        return $res;
    }

    public function newComment($id_user,$id_ecole,$comment,$is_answer_to) {
        $query="insert into commentaire (id_user,id_ecole,comment,is_reponse_to) values (?,?,?,?)";
        $stmt=$this->bdd->prepare($query);
        return $stmt->execute(array($id_user,$id_ecole,$comment,$is_answer_to));
    }

    public function getFormations($id_ecole) {
        $query="select * from formation where id_ecole = ?";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute(array($id_ecole));
        $res=$stmt->fetchAll();
        return $res;
    }

    public function newSchool($nom,$type,$wilaya,$commune,$adresse,$telephone)
    {
        $query = "insert into ecole (nom, type, categorie,wilaya, commune,adresse, telephone)  values (?,?,'',?,?,?,?)";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($nom, $type, $wilaya, $commune, $adresse, $telephone));
    }
    public function updateSchool($nom,$type,$wilaya,$commune,$adresse,$telephone,$id_ecole)
    {
        $query = "update ecole set nom=? , type= ?,  wilaya=? , commune=? ,adresse=?, telephone=? where id_ecole= ?";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($nom, $type, $wilaya, $commune, $adresse, $telephone,$id_ecole));
    }

    public function updateSchoolState($state,$id_ecole) {
        $query = "update ecole set en_ligne=?  where id_ecole= ?";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($state,$id_ecole));
    }

    public function getSchool($id_ecole) {
        $query="select * from ecole where id_ecole = ?";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute(array($id_ecole));
        $res=$stmt->fetch();
        return $res;
    }

    public function deleteSchool($id_ecole) {
        $query = "delete from ecole  where id_ecole= ?";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($id_ecole));
    }

    public function getMembers() {
        $query="select * from user";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute();
        $res=$stmt->fetchAll();
        return $res;
    }

    public function updateCommentState($id_user,$allow) {
        $query = "update user set allow_comment=?  where id_user= ?";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($allow,$id_user));
    }

    public function getAllcomments($from_user,$id) {
        if ($from_user!=0)  $query="select id_comment,username, ecole.nom,comment,date from commentaire join user on user.id_user=commentaire.id_user join ecole on commentaire.id_ecole=ecole.id_ecole where commentaire.id_user = ?";
        else $query="select id_comment,username, ecole.nom,comment,date from commentaire join user on user.id_user=commentaire.id_user join ecole on commentaire.id_ecole=ecole.id_ecole where commentaire.id_ecole = ?";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute(array($id));
        $res=$stmt->fetchAll();
        return $res;
    }

    public function deleteComment($id_comm) {
        $query = "delete from commentaire  where id_comment= ?";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($id_comm));
    }

    public function deleteUser($id_user) {
        $query = "delete from user  where id_user= ?";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($id_user));
    }

    public function getRole($id_user) {
        $query="select * from user where id_user= ?";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute(array($id_user));
        $res=$stmt->fetch();
        return array($res['Role'],$res['is_employee']);
    }

    public function getAllSch() {
        $query="select * from ecole";
        $stmt=$this->bdd->prepare($query);
        $stmt->execute();
        $res=$stmt->fetchAll();
        return $res;
    }

    public function updateRole($id_user,$role,$is_employee) {
        $query = "update user set role=?, is_employee=?  where id_user= ?";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute(array($role,$is_employee,$id_user));
    }





}
