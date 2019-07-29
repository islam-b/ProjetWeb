<?php
require_once("../Controller/controller.php");

    class View {
        
        private $controller;

        public function __construct()
        {
            $this->controller=new Controller();
        }


        public function showLogin() { ?> 
            <a id="login">Login</a> <?php
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
        public function showMessage() { ?>
            <p>Voud devez vous connectez d'abord </p> <?php
        }
        public function showLogout() { ?>
            <a id="logout">Logout</a> <?php
        }
        public function showTitle($id_ecole) { ?>
            <h1 id="id_ecole" value="<?php echo $id_ecole; ?>"> Gestion des formations <br> <?php echo $this->controller->getSchoolName($id_ecole); ?></h1> <?php
        }
        
        public function showForm($id_ecole) {

            $types=$this->controller->getTypes($id_ecole);  ?>
            
            <form id="formation_form">
            <fieldset>
                <legend>Nouvelle formation</legend>
                <label>Nom :</label> <input type="text" placeholder="Foramtion"> 
                <label> Type de la formation : </label> 
                <select id="selection_type">
                <?php
                    foreach ($types as $row) {
                ?>
                    <option value="<?php echo $row['id_type'] ?>"><?php echo $row['nom_type'] ?></option>
                    <?php } ?>
                    <option value="" disabled selected>Choix type</option>
                    <option id="new_type" value="0">Nouveau...</option>
                </select>
                <input id="type_input" type="text">
                <label>Volume Horaire : </label><input type="text" placeholder="60 heures" disabled>  
                <label>Prix HT :</label>  <input type="text" placeholder="18000 DA" disabled>  
                <label>Taxe :</label> <input id="tx" type="text" placeholder="17 %" disabled>  
                <input type="button" id="new_formation" value="Ajouter">
                <input hidden value="<?php echo $id_ecole; ?>">
            </fieldset>
        </form> <?php
        }
        
        public function showFormations($id_ecole) { ?>
                <br>
                <h3>Formations: </h3>
                <?php
                $types=$this->controller->getTypes($id_ecole);
 
                foreach ($types as $row) {
            ?>
            <table border="3" class="tableau_formation" >
                                        <thead>
                                            <tr>
                                                <th scope="col">Formation</th>
                                                <th scope="col">Volume horaire</th>
                                                <th scope="col">Prix HT</th>
                                                <th scope="col">Taxe</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="type_row_<?php echo $row['id_type']?>">
                                                        <th scope="row"> <?php echo $row['nom_type'] ?> </th>
                                                        <td><?php echo $row['volume'] ?></td>
                                                        <td><?php echo $row['prixHT'].' DA' ?></td>
                                                        <td><?php echo $row['taxe'].' %' ?></td>
                                                        <td> <button class="delete_type" value="<?php echo $row['id_type'] ?>">Supprimer</button> 
                                                            <button class="edit_type" value="<?php echo $row['id_type'] ?>">Modifier</button> </td>
                                                    </tr>
                                            <tr class="edit_type_form" id="form_<?php echo $row['id_type']?>">
                                            
                                                        <td><input type="text" value="<?php echo $row['nom_type'] ?>"></td>
                                                        <td><input type="text" value="<?php echo $row['volume'] ?>"></td>
                                                        <td><input type="text" value="<?php echo $row['prixHT'] ?>"></td>
                                                        <td><input type="text" value="<?php echo $row['taxe'] ?>"></td>
                                                        <td> <button class="save_type" value="<?php echo $row['id_type'] ?>">Enregistrer</button>  </td>
                                      
                                            </tr>
                                            </tbody>
                                    </table>
                     
                                    <?php
                                    $formations=$this->controller->getFormations($row['id_type'],$id_ecole);
                                    if ($formations->rowCount()>0) {
                                    ?>
                                     <ul>
                                    
                                    <?php
                        
                                    }
                                            foreach ($formations as $row2) {
                                    ?>
                                       
                                            <li id="form_item_<?php echo $row2['id_formation'] ?>"> 
                                                <p class="formation"> <?php echo $row2['nom_formation']; ?> </p>
                                                <button class="delete_form" value="<?php echo $row2['id_formation'] ?>">Supprimer</button>
                                                <button class="edit_form" value="<?php echo $row2['id_formation'] ?>">Modifier</button>
                                            </li>
                                            <li class="edit_form_form" id="form_input_<?php echo $row2['id_formation'] ?>">
                                            <input type="text"  value="<?php echo $row2['nom_formation']; ?>">
                                            <button class="save_form" value="<?php echo $row2['id_formation'] ?>">Enregistrer</button>
                                            </li>
                                     
                                            <?php 
                                                }
                                            ?>
                                       </ul>
                                    
                                    <br>
            
                    <?php
                    }
                    
        }
        
        public function showPanel() { ?> 

            <br>
            <form id="themeForm" method="post" action="../Controller/addTheme.php" enctype="multipart/form-data">
                    <h3>Personnaliser le site </h3>
                    
                    
                    <label>Police du titre :</label>
                    <select name="title">
                    <option value="fantasy">Fantasy</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Calibri">Calibri</option>
                    </select> <br><br>
                    <label>Couleur de fond: </label>
                    <input type="color" name="primaryColor"> <br><br>
                    <label>Couleur de bordure: </label>
                    <input type="color" name="secondaryColor"> <br><br>
                    <label>Images d'acceuil</label> 
                <input type="file" id="files" name='files[]' multiple="multiple" accept="image/*">
                <output id="list_f"></output><br>
                    <label>Police: </label>
                    <select name="font">
                    <option value="fantasy">Fantasy</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Calibri">Calibri</option>
                    </select> <br><br>
                <label>Couleur du texte: </label>
                    <input type="color" name="textColor"> <br>
                    <input id="saveTheme" type="submit" value="Sauvegarder">
                    <br><br>
                
            </form> 
            <br><br>
    
            <?php
        }
        
        public function showThemes() {
            ?>
        <h3>Themes :</h3>
        <div id="themes_container"> 
            </div>

        <?php    
        }
        
        
        
    }
?>





















