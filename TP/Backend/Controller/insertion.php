
<?php
            require_once("../Controller/Controller.php");
            $controller=new Controller();

            $nom_formation=$_POST['nom_formation'];
            $nom_type=$_POST['nom_type'];
            $volume_h=$_POST['volume_h'];
            $prixht=$_POST['prixht'];
            $tax=$_POST['tax'];
            $id_ecole=$_POST['id_ecole'];
            $with_type=$_POST['with_type'];
        
            if ($with_type==0) {
                $id_type=$controller->createNewType($nom_type,$volume_h,$prixht,$tax,$id_ecole);
            } else {
                $id_type=$with_type; }

            $controller->createNewFormation($nom_formation,$id_type,$id_ecole);
            
