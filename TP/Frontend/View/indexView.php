<?php
require_once("../Controller/controller.php");
    class View{
        
        private $controller;
        public function __construct() {

            $this->controller=new Controller();
        }
        
        public function showLogin() { ?> 
            <a id="login">Login</a> <?php
        }
        
        public function showLogout() { ?> 
            <a id="logout">Logout</a> <?php
        }
        
        public function showCadre() { ?> 
            <div id="cadre">
            <form>
                <legend id="connex">Connexion</legend><br>
                <label>Username</label> <br>
                <input type="text" name="username" id="username">
                <br>
                <label>Password</label> <br>
                <input type="password" name="password" id="password">
                <br><br>
                <input type="button" id="signin" value="Connexion">
                <input type="button" id="cancel" value="Annuler">
            
            </form>
            </div> <?php
        }
        
        public function showTitle($id_ecole) {
            ?>
            <h1 id="id_ecole" value="<?php echo $id_ecole;?>"> Ecole de formation <?php echo $this->controller->getSchoolName($id_ecole); ?> </h1>
                <h1> <bdi> مدرسة تعليم </bdi></h1> <?php
        }
        
        public function showDiaporama() { ?> 
            <div id="img_container">
            <img src="../../UploadedImages/diapo4.jpg" alt="Image acceuil"/>
            <img src="../../UploadedImages/diapo3.jpg" alt="Image acceuil"/>
            <img src="../../UploadedImages/diapo2.jpg" alt="Image acceuil"/>
            <img src="../../UploadedImages/diapo1.jpg" alt="Image acceuil"/>
                </div> <br><br><?php
        }
        
        public function showMenu($id_ecole) {

                ?> 

                  
                      <ul> <?php

                            $types=$this->controller->getTypes($id_ecole);
                            
                                 foreach ($types as $row) {
                                        ?>
                                        <li class="formation"> 
                                            <a class="lien" href="#"> <?php echo $row['nom_type']  ?>
                                                <div class="dropdown">
                                                    <div class="dropdown-content">

                                                        <?php
                                                                $formations=$this->controller->getFormations($row['id_type'],$id_ecole);
                                                                foreach ($formations as $row2) {
                                                        ?>
                                                                        <p class="sous-titre">
                                                                        <?php echo $row2['nom_formation']; ?>
                                                                        </p>

                                                                <?php 
                                                                    }
                                                                ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <?php
                                        }
            
                        ?>
                      </ul> <?php
        
        }
        
        public function showVideo() { ?> 
            <br>
                <video src="../View/img/Video_accueil.mp4" preload="auto" controls autoplay width="100%"></video>
            <br> <br><?php
        }
        
        
        public function showFormations($id_ecole) { ?>
            
            <table border="3" id="tableau" >
            <thead>
                <tr>
                    <th scope="col">Formation</th>
                    <th scope="col">Volume horaire</th>
                    <th scope="col">Prix HT</th>
                    <th scope="col">Taxe</th>
                    <th scope="col">Prix TTC</th>
                </tr>
            </thead>
                    <tbody> 
                        
                        <?php

                    $types=$this->controller->getTypes($id_ecole);
                    foreach ($types as $row) {
                       
                ?>
                        <tr>
                        <th scope="row"> <?php echo $row['nom_type'] ?> </th>
                        <td><?php echo $row['volume'] ?></td>
                        <td><?php echo $row['prixHT'].' DA' ?></td>
                        <td><?php echo $row['taxe'].' %' ?></td>
                        <td></td>
                        </tr>
            <?php
                         
                    }
                ?>
                </tbody>
        </table> 

        <?php
        }
        
        
        public function showFooter() { ?> 
            <br>
        <footer>
        <a class="lien" href="mailto:fm_bouayache@esi.dz">fm_bouayache@esi.dz</a> <br>
        <a class="lien" href="mailto:wmail@pschool.dz">wmail@pschool.dz</a> 
            </footer><?php
        }
    }
?>