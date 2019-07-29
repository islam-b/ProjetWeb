<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Frontend/Controller/Controller.php');
    class View {

        private $controller;
        public function __construct() {
            $this->controller=new Controller();
        }
        public function showLogo() {
            ?>
            <div class="logo mr-auto ml-auto shadow-lg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-7 offset-5" >
                            <div class="row ml-5">
                                <div class="col-lg-2 mr-4">
                                    <img src="View/src/images/kl.png">
                                </div>
                            <div class="col-lg-9 offset-1 m-auto"> <h1 class="m-auto">Comparateur d'écoles de formations</h1></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php
        }

         public function showDiaporama()
        {
            ?>
            <div id="diapo_container" class=" mr-auto ml-auto shadow-lg  mb-5 bg-white">
               <img class="ml-auto mr-auto diapo" src="View/src/images/d2.jpg"  width="100%" alt="2">

            </div>
            <hr class="mb-0">
            <?php
        }

        public function showMenu($page) {
            ?>

                <div id="m_page">
                <div id="menu_container" class="fix">
                    <div class="nav flex-column " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="cat-link <?php if ($page==0) echo 'active_link'?>" href="index.php#content">Acceuil</a>
                        <a class="cat-link <?php if ($page==1) echo 'active_link'?>"  href="formations_universitaires.php#content" >Formations universitaires</a>
                        <a class="cat-link <?php if ($page==2) echo 'active_link'?>"  href="formations_professionelles.php#content">Formations professionnels </a>
                        <a class="cat-link <?php if ($page==3) echo 'active_link'?>"   href="formations_secondaires.php#content" >Formations secondaires</a>
                        <a class="cat-link <?php if ($page==4) echo 'active_link'?>"   href="formations_moyennes.php#content" >Formations moyennes</a>
                        <a class="cat-link <?php if ($page==5) echo 'active_link'?>"  href="formations_primaires.php#content" >Formations primaires</a>
                        <a class="cat-link <?php if ($page==6) echo 'active_link'?>"  href="formations_maternelles.php#content" >Formations maternelles</a>
                        <a class="cat-link <?php if ($page==7) echo 'active_link'?>"  href="Comparaison.php#content" >Comparer deux écoles</a>
                        <a class="cat-link <?php if ($page==8) echo 'active_link'?>"   href="" >A propos</a>
                        <br>
                        <?php if (empty($_SESSION['username'])) { ?>
                        <button type="button" data-toggle="modal" data-target="#cadre_connex" class="btn btn-outline-primary btn-sm" id="conex_btn">Connexion</button>
                            <a data-toggle="modal" data-target="#cadre_inscrip" id="inscrip_link" class="ml-auto mr-2">Incription... </a>
                        <?php } else { ?>
                            <button type="button" class="btn btn-outline-danger btn-sm" id="deconex_btn">Deconnexion</button>
                        <?php } ?>


                    </div>
                    <div id="publicite">
                        <img src="View/src/images/pub.jpg" >
                    </div>
                </div>


            <?php
        }


        public function showContent() {
            ?>
            <div id="content" class="ml-auto ">
                <div class="row">
                    <div class="col-lg-12" style="padding: 2% 5%">
                        <div id="categorie_container">

                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="View/src/images/univ.jpg" alt="Card image cap">
                                <div class="card-body" >
                                    <h5 class="card-title">Formations universitaires</h5>
                                    <p class="card-text">Consulter et comparer les formations universitaries (Prix, Volume ,...)</p>
                                    <span><a href="formations_universitaires.php#content" class="btn btn-primary">Plus de details...</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="View/src/images/prof.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Formations professionelles</h5>
                                    <p class="card-text">Consulter et comparer les formations professionelles (Prix, Volume ,...)</p>
                                    <a href="formations_professionelles.php#content" class="btn btn-primary">Plus de details</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="View/src/images/secon.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Formations secondaires</h5>
                                    <p class="card-text">Consulter et comparer les formations secondaires (Prix , Volume horaires, Taxe)</p>
                                    <a href="formations_secondaires.php#content" class="btn btn-primary">Plus de details</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="View/src/images/moy.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Formations moyennes</h5>
                                    <p class="card-text">Consulter et comparer les formations moyennes (Tarifs,...etc)</p>
                                    <a href="formations_moyennes.php#content" class="btn btn-primary">Plus de details</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="View/src/images/pri.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Formations primaires</h5>
                                    <p class="card-text">Consulter et comparer les formations primaires (Tarifs,...etc)</p>
                                    <a href="formations_primaires.php#content" class="btn btn-primary">Plus de details</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="View/src/images/mat.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Formations maternelles</h5>
                                    <p class="card-text">Consulter et comparer les formations maternelles (Tarifs.etc)</p>
                                    <a href="formations_maternelles.php#content" class="btn btn-primary">Plus de details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php


        }

        public function showEcoleFormations($type) {
            ?>
            <div id="content" class="ml-auto pt-5">
                <div class="row">
                    <div class="col-lg-12" style="padding: 2% 5%">

                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="tab_ecole" class="table table-striped table-bordered w-100" >
                                        <thead class="alert-primary">
                                        <tr>
                                            <th >Nom</th>
                                            <?php if ($type=='univ' || $type=='prof') {?> <th>Categorie</th><?php }?>
                                            <th>Wilaya</th>
                                            <th>Commune</th>
                                            <th>Adresse</th>
                                            <th>Telephone</th>

                                            <?php if (!empty($_SESSION['username'])) { ?> <th>Commentaire</th> <th>Gérer</th><?php }?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $ecoles=$this->controller->getEcolesFormations($type);

                                        foreach ($ecoles as $ecole) {
                                            if ($ecole['en_ligne']>0) {
                                        ?>
                                        <tr>
                                            <td>
                                                <form method="post" action="../TP/Frontend/Controller/index.php">
                                                    <input type="hidden" name="id_ecole" value="<?php echo $ecole['id_ecole']?>" >
                                                    <button class="school_link" type="submit"> <?php echo $ecole['nom']?>
                                                </button></form>
                                            </td>
                                            <?php if ($type=='univ' || $type=='prof') {?> <td><?php echo $ecole['categorie'] ?></td><?php }?>
                                            <td ><?php echo $ecole['wilaya'] ?></td>
                                            <td><?php echo $ecole['commune'] ?></td>
                                            <td><?php echo $ecole['adresse'] ?></td>
                                            <td><?php echo $ecole['telephone'] ?></td>
                                            <?php if (!empty($_SESSION['username'])) { ?>
                                                <td style="vertical-align: middle" class="p-3">
                                                    <form method="post" action="Comments.php#content">
                                                        <input type="hidden" name="id_ecole" value="<?php echo $ecole['id_ecole']?>" >
                                                        <button class="comment_btn btn btn-secondary btn-sm w-100" type="submit">Commenter</button>
                                                    </form>
                                                    </td>
                                            <?php }?>
                                            <?php if (!empty($_SESSION['username'])) { ?>
                                                <td style="vertical-align: middle" class="p-3">
                                                    <form method="POST" action="../TP/Backend/Controller/index.php">
                                                        <input type="hidden" name="id_ecole" value="<?php echo $ecole['id_ecole']?>" >
                                                        <button class=" btn btn-secondary btn-sm w-100" type="submit">Gérer</button>
                                                    </form>
                                                </td>
                                            <?php }?>

                                        </tr>
                                            <?php }} ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                    </div>
                    </div>
                </div>
            </div>
            <?php


        }

        public function showCadreConnex() {
            ?>
            <div class="modal fade" id="cadre_connex" tabindex="-1" role="dialog" aria-labelledby="connex_title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="connex_title">Connexion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <form class="form col-lg-10 offset-1" id="connex_form">
                                <div class="form-group">
                                    Nom d'utilisateur:
                                    <input class="form-control" type="text" >
                                </div>
                                <div class="form-group">
                                   Mot de passe:
                                <input class="form-control" type="password" >
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button id="signin_btn" type="button" class="btn btn-primary">Se connecter</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        public function showCadreInscription() {
            ?>
            <div class="modal fade" id="cadre_inscrip" tabindex="-1" role="dialog" aria-labelledby="inscrip_title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inscrip_title">Inscription</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form col-lg-10 offset-1" id="inscrip_form">
                                <div class="form-group">

                                    <input class="form-control" type="text" placeholder="Pseudonyme">
                                </div>
                                <div class="form-group">

                                    <input class="form-control" type="password" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">

                                    <input class="form-control" type="password" placeholder="Confirmation mot de passe">
                                </div>
                                <div class="form-group">

                                    <input class="form-control" type="text" placeholder="Nom">
                                </div>
                                <div class="form-group">

                                    <input class="form-control" type="text" placeholder="Prenom">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button id="signup_btn" type="button" class="btn btn-primary">S'inscrire</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }


        public function showComments($id_ecole) {
            ?>
            <div id="content" class="ml-auto">
                <div class="row">
                    <div class="col-lg-12" style="padding: 2% 5%">
                        <div class="container">

                            <div class="row fix" id="comment_part">
                                <?php if ($this->controller->can_comment($_SESSION['id_user'])) {?>
                                <div class="col-lg-12">
                                    <div class="form" id="comment_form">
                                        <h5>Page des commentaires</h5>
                                        <textarea style="height: 75px;" class="form-control" type="text" placeholder="Entrez votre commentaire ici..."></textarea>
                                        <div class="col-lg-2 offset-10 mt-2 ">
                                            <button value="<?php echo $id_ecole ?>" class="btn btn-primary w-100 ml-3">Envoyer</button>
                                        </div>
                                    </div>
                                    <hr class="mb-0">
                                </div> <?php } ?>
                            </div>
                            <?php
                            $comments=$this->controller->getComments($id_ecole);
                            foreach ($comments as $comment) {
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                <div class="card ">
                                    <div class="card-header">
                                        <div style="display: flex;flex-direction: row;justify-content: space-between">
                                            <span style="font-weight: bold"><?php echo strtoupper($comment['nom'])." ".$comment['prenom'];?></span>
                                            <span><?php echo date("d/m/Y H:i",strtotime($comment['date']));?></span>
                                        </div>
                                    </div>
                                    <div class="card-body" style="text-align: left ;">
                                        <p class="card-text"><?php echo $comment['comment'];?> </p>
                                    </div>
                                    <?php if (($_SESSION['is_employee']==$id_ecole)&&($this->controller->can_comment($_SESSION['id_user']))) { ?>
                                    <div class="card-footer" style="text-align: right;">
                                        <div class="row form_ans" id="answer_form_<?php echo $comment['id_comment']?>" >
                                        <div class="col-lg-10">
                                            <textarea style="height: 40px;" class="form-control" type="text" placeholder="Entrez votre reponse ici..."></textarea>
                                            <input hidden value="<?php echo $id_ecole?>">
                                        </div>
                                        <div class="col-lg-2"><button value="<?php echo $comment['id_comment'] ?>" class="btn btn-sm btn-primary w-100 m-auto">Repondre</button></div>
                                        </div>
                                     </div>
                                    <?php } ?>
                                 </div>
                                </div>
                            </div>
                                <?php
                                $answers=$this->controller->getAnswers($comment['id_comment']);
                                foreach ($answers as $answer) {
                                ?>
                            <div class="row">
                                <div class="col-lg-11 offset-1">
                                <div class="card ">
                                    <div class="card-header alert-info">
                                        <div style="display: flex;flex-direction: row;justify-content: space-between">
                                        <span style="font-weight: bold"><?php echo strtoupper($answer['nom'])." ".$answer['prenom'];?></span>
                                            <span><?php echo date("d/m/Y H:i",strtotime($answer['date']));?></span>
                                        </div>
                                    </div>
                                    <div class="card-body" style="text-align: left ;">

                                        <p class="card-text"><?php echo $answer['comment'];?></p>
                                    </div>
                                 </div>
                                </div>
                            </div>
                                <?php } }?>
                    </div>
                </div>
            </div>
            </div>
                <?php
        }

        public function showComparaison() {
            ?>
            <div id="content" class="ml-auto">
                <div class="row">
                    <div class="col-lg-12" style="padding: 2% 5%">
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5>Comparer deux ecoles</h5>
                            </div>
                        </div>
                            <div id ="select_form" class="row mt-2">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        Type d'école
                                        <select style="font-size:14px;" class="form-control">
                                            <option disabled selected>Selectionnez</option>
                                            <option value="univ">Universitaire</option>
                                            <option value="prof">Professionelle</option>
                                            <option value="second">Secondaire</option>
                                            <option value="moy">Moyenne</option>
                                            <option value="pri">Primaire</option>
                                            <option value="mat">Maternelle</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        Ecole 1
                                        <select disabled class="form-control"></select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        Ecole 2
                                        <select disabled class="form-control"></select>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6" >
                                    <table id="school_tab1" class="table table-striped table-bordered w-100">
                                        <thead>
                                        <tr class="alert-info">
                                            <th >Type</th>
                                            <th >Nom</th>
                                            <th >Volume horaire</th>
                                            <th >Tarif</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <h6>Commentaires</h6>
                                    <div id="school_comment1" class="container" >


                                    </div>
                                </div>
                                <div class="col-lg-6" style="border-width: 0px 0px 0px 1px;border-color:lightgrey; border-style:solid;">
                                    <table id="school_tab2" class="table table-striped table-bordered w-100">
                                        <thead>
                                        <tr class="alert-info">
                                            <th >Type</th>
                                            <th >Nom</th>
                                            <th >Volume horaire</th>
                                            <th >Tarif</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <h6>Commentaires</h6>
                                    <div id="school_comment2" class="container" >


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        public function fillFormationsTab($id_ecole) {
            $formations=$this->controller->getFormations($id_ecole);
            $res="";
            foreach ($formations as $formation) {
                $res=$res."<tr>";
                $res=$res."<td>".$formation['nom_type']."</td>";
                $res=$res."<td>".$formation['nom_formation']."</td>";
                $res=$res."<td>".$formation['volume']."</td>";
                $res=$res."<td>".$formation['prixHT']." DA </td>";
                $res=$res."</tr>";
            }
            return $res;
        }

        public function fillComments($id_ecole) {
            $comments=$this->controller->getComments($id_ecole);
            $res="";
            foreach ($comments as $comment) {
                $res=$res.'<div class="card">';
                $res=$res.'<div class="card-header">';
                $res=$res.'<div style="display: flex;flex-direction: row;justify-content: space-between">';
                $res=$res.'<span style="font-weight: bold">'.strtoupper($comment['nom'])." ".$comment['prenom'].'</span>';
                $res=$res.'<span>'.date("d/m/Y H:i",strtotime($comment['date'])).'</span>';
                $res=$res.'</div>';
                $res=$res.'</div>';
                $res=$res.'<div class="card-body" style="text-align: left ;">';
                $res=$res.'<p class="card-text">'.$comment['comment'].'</p>';
                $res=$res.'</div>';
                $res=$res.'</div>';
            }
            return $res;
        }

        public function showFooter() {
            ?>
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 offset-1 mt-lg-5">
                            <h5 style="color:lightgrey">Liens:</h5>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a href="index.php">Acceuil</a>
                                <a  href="formations_universitaires.php" >Formations universitaires</a>
                                <a  href="formations_professionelles.php" >Formations professionelles</a>
                                <a  href="formations_moyennes.php" >Formations moyennes</a>
                                <a  href="formations_secondaires.php" >Formations secondaires</a>
                                <a  href="formations_primaires.php" >Formations primaires</a>
                                <a  href="formations_maternelles.php" >Formations maternelles</a>

                            </div>
                        </div>
                            <div class="col-lg-4 offset-2 mt-lg-5">
                                <h5 style="color:lightgray">Contact:</h5>
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a href="index.php">adressse@domaine.dz</a>
                                    <a  href="#v-pills-profile" >+213 069 41 51 63</a>
                                </div>
                        </div>
                    </div>
                </div>

            </footer>
            <?php
        }


    }