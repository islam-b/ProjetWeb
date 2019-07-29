<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/PROJET_TDW/Backend/Controller/Controller.php');
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


                    <div class="nav flex-column "  role="tablist"  aria-orientation="vertical">


                        <a class="cat-link " href="index.php">Acceuil</a>
                        <a class="cat-link "  href="Gestion_ecole" >Gèrer les écoles</a>
                        <a class="cat-link "  href="Gestion_comment.php">Gérer les commentaires</a>
                        <a class="cat-link"  href="Gestion_member.php">Gérer les membres</a>
                        <a class="cat-link "   href="" >A propos</a>
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


        public function showMainContent() {
            ?>
            <div id="content" class="ml-auto ">
                <div class="row">
                    <div class="col-lg-12" style="padding: 2% 5%">
                        <br>
                        <div class="row">
                            <div class="co-lg-12 ml-3">
                                <h4>Administration du site principale</h4>
                            </div>
                        <br><br>
                        </div>
                            <div class="row" id="choice_container">
                                <div class="col-lg-4">
                                    <div class="card border-primary w-100">
                                        <img class="card-img-top m-auto" style="width: 72%;" src="View/src/Images/school-building.png" alt="Card image cap">
                                        <div class="card-body pt-1 pb-0">
                                            <h5 class="card-title">Gestion des écoles</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a  class="nav-link" href="Gestion_ecole.php?page=1"> Nouvelle école</a></li>
                                            <li class="list-group-item"><a class="nav-link" href="Gestion_ecole.php?page=2"> Modifier une école</a></li>
                                            <li class="list-group-item"><a class="nav-link" href="Gestion_ecole.php?page=3"> Gérer la mise en ligne d'une école</a></li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card border-primary w-100">
                                        <img class="card-img-top w-75 m-auto" style="" src="View/src/Images/comment-png.jpg" alt="Card image cap">
                                        <div class="card-body mt-3">
                                            <h5 class="card-title">Gestion des commentaires</h5>

                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a class="nav-link" href="Gestion_comment.php"> Bloquer des commentaires</a></li>
                                            <li class="list-group-item"><a class="nav-link" href="Gestion_comment.php"> Supprimer des commentaires</a></li>

                                        </ul>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card border-primary w-100">
                                        <br><br>
                                        <img class="card-img-top m-auto "  style="padding-top:7px;width: 80%;" src="View/src/Images/mem.png" alt="Card image cap">
                                        <br>
                                        <div class="card-body mt-4">
                                            <h5 class="card-title">Gestion des membres</h5>

                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="Gestion_member.php" class="nav-link"> Ajouter un membre (Employée)</a></li>
                                            <li class="list-group-item"><a href="Gestion_member.php" class="nav-link"> Supprimer un membre</a></li>

                                        </ul>

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
                                            <?php if (!empty($_SESSION['username'])) { ?> <th>Commentaire</th> <?php }?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $ecoles=$this->controller->getEcolesFormations($type);

                                        foreach ($ecoles as $ecole) {
                                        ?>
                                        <tr>
                                            <td><a href=""> <?php echo $ecole['nom']?></a></td>
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

                                        </tr>
                                            <?php } ?>
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

        public function showGestionEcole() { ?>
            <div id="content" class="ml-auto ">
                <?php
                if (isset($_GET['page'])) $page=$_GET['page'];
                else $page=0;
                switch ($page) {
                    case 2: {echo $this->showEditSchoolForm();}break;
                    case 3: {echo $this->showGestionMiseEnLigne();}break;
                    default: {echo $this->showNewSchoolForm();}break;

                }

                ?>
            </div>
            </div>
            <?php
        }

        public function showGestionComment() { ?>
            <div id="content" class="ml-auto ">
            <div id="gestion_com_c">
                <div class="row"><div class="col-lg-8 offset-1 mt-5 pt-3"><legend>Bloquer ou autoriser des commentaires</legend></div> </div>
                <div class="row" >
                    <div class="col-lg-10 offset-1" >
                        <table class="table table-striped table-bordered">
                            <?php
                            echo $this->showMemberRows();
                            ?>
                        </table>
                    </div>
                </div>
                <div class="row"><div class="col-lg-8 offset-1 mt-5 pt-3"><legend>Supprimer des commentaires</legend></div> </div>
                <div class="row" >
                    <div class="col-lg-3 offset-1" >
                        Type d'écoles:
                        <select class="form-control" >
                            <option value="" selected disabled>Type</option>
                            <option value="univ">Universitaire</option>
                            <option value="prof">Professionelle</option>
                            <option value="second">Secondaire</option>
                            <option value="moy">Moyenne</option>
                            <option value="pri">Primaire</option>
                            <option value="mat">Maternelle</option>
                        </select>
                    </div>
                    <div class="col-lg-3" >
                        Ecole:
                        <select disabled class="form-control"></select>
                    </div>
                    <div class="col-lg-4" >
                        Membre:
                        <select class="form-control">
                            <option value="" selected disabled>Membre</option>
                            <?php $members=$this->controller->getMembers();
                            foreach ($members as $member) {
                                ?>
                                <option value="<?php echo $member['id_user'] ?>"><?php echo $member['username'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3" >
                    <div class="col-lg-10 offset-1" >
                        <table class="table table-striped table-bordered">

                        </table>
                    </div>
                </div>

            </div>

            </div>
            </div>
            <?php
        }

        public function showSchoolOptions($type) {
            ?> <option value="" selected disabled>Ecole</option>
            <?php
            $sc=$this->controller->getEcolesFormations($type);
            foreach ($sc as $sch) {
                ?>
                <option value="<?php echo $sch['id_ecole']; ?>"><?php echo $sch['nom'];?></option>
                <?php
            }
        }

        public function showCommentRows($from_user,$id) {
            ?>
            <thead>
            <tr class="alert-info">
                <th>Contenu</th>
                <th >Propriaitaire</th>

                <th >Ecole</th>
                <th>Date</th>
                <th>Suppresion</th>
            </tr>
            </thead>
            <tbody>

                <?php
                    $comments=$this->controller->getAllcomments($from_user,$id);

                    foreach ($comments as $comment) {
                ?>
                        <tr id="comm_<?php echo $comment['id_comment'];?>">
                <td><?php echo $comment['comment']; ?></td>
                <td><?php echo $comment['username']; ?></td>

                <td><?php echo $comment['nom'] ?></td>
                <td ><?php echo date("d/m/Y H:i",strtotime($comment['date']));?></td>
                <td ><button value="<?php echo $comment['id_comment']; ?>" class="delete_com btn btn-sm btn-outline-danger w-100">Supprimer</button></td>
                </tr>
                        <?php } ?>
            </tbody>
            <?php
        }

        public function showMemberRows() {?>
            <thead>
                            <tr class="alert-info">
                                <th class="w-25">Pseudonyme</th>
                                <th class="w-25"> Nom et prenom</th>

                                <th class="w-25">Rôle</th>
                                <th class="w-25">Commentaire</th>
                            </tr>
            </thead>
                            <tbody>
                            <?php
                            $members=$this->controller->getMembers();
                            foreach($members as $member) {
                            ?>
                                <tr>
                                    <td><?php  echo $member['username'];?></td>
                                    <td><?php echo strtoupper($member['nom'])." ".$member['prenom'];?></td>

                                    <td><?php  echo $member['Role'];?></td>
                                    <td class="px-3"><div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                            <button value="<?php  echo $member['id_user'];?>" class="enable_com btn btn-sm btn-outline-success <?php  if($member['allow_comment']==1) echo 'active';?> w-50">
                                                <input type="radio" name="options"  autocomplete="off" checked> Autorisé
                                            </button>
                                            <button value="<?php  echo $member['id_user'];?>" class="disable_com btn  btn-sm btn-outline-danger <?php  if($member['allow_comment']==0) echo 'active';?> w-50">
                                                <input type="radio" name="options" autocomplete="off"> Bloqué
                                            </button>
                                        </div></td>
                                </tr><?php } ?>
                            </tbody>
                            <?php
        }

        private function showGestionSchoolNavTab($active) {?>
            <div class="row" >
                    <div class="col-lg-12" >
                        <ul class="nav nav-tabs" style="background-color: #cce8fc;">
                            <li class="nav-item">
                                <a class="nav-link  <?php if ($active==1) echo 'active_tab '?>pr-5 pl-5" href="Gestion_ecole.php?page=1">Nouvelle Ecole</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  <?php if ($active==2) echo 'active_tab '?> pr-5 pl-5" href="Gestion_ecole.php?page=2">Modifier Ecole</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($active==3) echo 'active_tab '?> pr-5 pl-5" href="Gestion_ecole.php?page=3">Gérer la mise en ligne</a>
                            </li>
                        </ul>
                    </div>
            </div><?php
        }

        public function showGestionMember() { ?>
            <div id="content" class="ml-auto ">
                <div class="row"><div class="col-lg-8 offset-1 mt-5 pt-3"><legend>Gestion des membres</legend></div> </div>
                <div class="row" >
                    <div class="col-lg-10 offset-1" >
                        <table class="table table-striped table-bordered">
                            <?php echo $this->showMembersforGestionUsers();?>
                        </table>
                    </div>
                </div>
                <div class="row"><div class="col-lg-8 offset-1 mt-5 pt-3"><legend>Changement de rôle</legend></div> </div>
                <div class="row" >
                    <form class="col-lg-10 offset-1" id="role_update">
                        <div class="row">
                            <div class="col-lg-1 my-auto">
                                <div class="my-auto">Membre</div>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option value="" selected disabled>Membre</option>
                                    <?php $members=$this->controller->getMembers();
                                    foreach ($members as $member) {
                                        ?>
                                        <option value="<?php echo $member['id_user'] ?>"><?php echo $member['username'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-1 my-auto">
                                <div class="my-auto">Rôle</div>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option value="Utilisateur">Utilisateur</option>
                                    <option value="Employee">Employée</option>
                                    <option value="Administrateur">Administrateur</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-1 my-auto">
                                <div class="my-auto invisible" id="at_title">Ecole</div>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control invisible">
                                    <?php
                                    $schools=$this->controller->getAllSch();
                                    foreach ($schools as $sc) {
                                    ?>
                                        <option value="<?php echo $sc['id_ecole'];?>"><?php echo $sc['nom'];?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-8 my-auto text-right">
                                <button type="button" class="btn btn-primary ">Sauvegarder</button>
                            </div>

                        </div>
                    </form>

                </div>




            </div>
            </div>
            <?php
        }


        public function showMembersforGestionUsers() {?>
            <thead>
            <tr class="alert-info">
                <th >Pseudonyme</th>
                <th > Nom et prenom</th>
                <th >Rôle</th>
                <th >Commentaire</th>
                <th>Suppresion</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $members=$this->controller->getMembers();
            foreach($members as $member) {
                ?>
                <tr id="user_<?php echo $member['id_user']?>">
                <td><?php  echo $member['username'];?></td>
                <td><?php echo strtoupper($member['nom'])." ".$member['prenom'];?></td>

                <td><?php  echo $member['Role'];?></td>
                <td class="px-3"><div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                        <button value="<?php  echo $member['id_user'];?>" class="enable_com btn btn-sm btn-outline-success <?php  if($member['allow_comment']==1) echo 'active';?> w-50">
                            <input type="radio" name="options"  autocomplete="off" checked> Autorisé
                        </button>
                        <button value="<?php  echo $member['id_user'];?>" class="disable_com btn  btn-sm btn-outline-danger <?php  if($member['allow_comment']==0) echo 'active';?> w-50">
                            <input type="radio" name="options" autocomplete="off"> Bloqué
                        </button>
                    </div>
                </td>
                <td><button  value="<?php echo $member['id_user'];?>" class="delete_member btn btn-sm btn-outline-danger w-100 m-auto">Supprimer</button></td>
                </tr><?php } ?>
            </tbody>
            <?php
        }

        public function showGestionMiseEnLigne() {
            echo $this->showGestionSchoolNavTab(3);
            ?>

           <div id="gestion_mise_ligne">
            <div class="row"><div class="col-lg-8 offset-1 mt-5 pt-3"><legend>Gérer la mise en ligne des écoles</legend></div> </div>
                <div class="row" >
                    <div class="col-lg-4 offset-1" >
                        <label class="mt-3"><b>Selectionnez un type :</b></label>
                        <select class="form-control" >
                            <option value="univ">Universitaire</option>
                            <option value="prof">Professionelle</option>
                            <option value="second">Secondaire</option>
                            <option value="moy">Moyenne</option>
                            <option value="pri">Primaire</option>
                            <option value="mat">Maternelle</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-1 mt-3">
                        <table class="table table-bordered table-striped">
                        </table>
                    </div>
                </div>
           </div>

                <?php
        }

        public function showSchoolRows($type) {
            ?>
            <thead class="alert-info">
            <tr>
                <th>Nom </th>
                <th>Mise en ligne</th>
                <th>Suppression</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $schools=$this->controller->getEcolesFormations($type);
            foreach ($schools as $school) {
                ?>
                <tr id="school_<?php echo $school['id_ecole']; ?>">
                    <td style="vertical-align: middle"><?php echo $school['nom'] ?></td>
                    <td class="px-5">
                        <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                            <button value="<?php echo $school['id_ecole'] ;?>" class="enable_s btn btn-sm btn-outline-success w-50 <?php if ($school['en_ligne']==1) echo 'active';?>">
                                <input type="radio" name="options"  autocomplete="off" checked> Activé
                            </button>
                            <button value="<?php echo $school['id_ecole']; ?>" class="disable_s btn  btn-sm btn-outline-danger w-50 <?php if ($school['en_ligne']==0) echo 'active';?>">
                                <input type="radio" name="options"  autocomplete="off"> Désactivé
                            </button>
                        </div>
                    </td>
                    <td class="px-5"><button value="<?php echo $school['id_ecole']; ?>" class="delete_sc btn btn-sm btn-outline-danger w-100">Supprimer</button></td>
                </tr>
                <?php
            }
            ?> </tbody> <?php
        }

        public function showEditSchoolForm() {
            echo $this->showGestionSchoolNavTab(2);
            ?>

                <div class="row"><div class="col-lg-8 offset-1 mt-5 pt-3"><legend>Modifier une école</legend></div> </div>
                <div class="row" id="edit_school_c">
                    <div class="col-lg-5 offset-1" >
                        <label class="mt-3"><b>Selectionnez un type :</b></label>
                        <select class="form-control" >
                            <option value="univ">Universitaire</option>
                            <option value="prof">Professionelle</option>
                            <option value="second">Secondaire</option>
                            <option value="moy">Moyenne</option>
                            <option value="pri">Primaire</option>
                            <option value="mat">Maternelle</option>
                        </select>
                        <form id="edit_school_form" style="height:450px;">

                        </form>
                    </div>
                    <div class="col-lg-5" id="school_list" >
                    </div>

                </div>
            <?php
        }

        public function showSchoolList($type) {
            ?>

                <label class="mt-3"><b>Selectionnez une école :</b></label>
                <ul class="list-group" >
                    <?php
                    $schools=$this->controller->getEcolesFormations($type);
                    foreach ($schools as $school) {
                        ?>
                        <li class="list-group-item "><a value="<?php echo $school['id_ecole'];?>" class="nav-link school_link"><?php echo $school['nom'];?></a></li>
                    <?php } ?>
                </ul>


            <?php

        }

        public function showEditFormSchool($id_school) {
            $school=$this->controller->getSchool($id_school);
            ?>
            <div class="form-group mt-3">
                Nom :
                <input type="text" class="form-control" value="<?php echo $school['nom']?>">
            </div>
            <div class="form-group mt-3">
                Wilaya :
                <input type="text" class="form-control" value="<?php echo $school['wilaya']?>">
            </div>
            <div class="form-group mt-3">
                Commune :
                <input type="text" class="form-control" value="<?php echo $school['commune']?>">
            </div>
            <div class="form-group mt-3">
                Adresse :
                <input type="text" class="form-control" value="<?php echo $school['adresse']?>">
            </div>
            <div class="form-group mt-3">
                Telephone :
                <input type="text" class="form-control" value="<?php echo $school['telephone']?>">
            </div>
            <div class="text-right"><button type="button" value="<?php echo $school['id_ecole']?>" class=" btn btn-primary">Sauvegarder</button></div>
            <?php
        }

        public function showNewSchoolForm() {
            echo $this->showGestionSchoolNavTab(1);
            ?>

            <div class="row"><div class="col-lg-8 offset-1 mt-5 pt-3"><legend>Créer une nouvelle école</legend></div> </div>
            <div class="row" >
                <form class="col-lg-10 offset-1" id="new_school_form">

                    <div class="row mt-2">
                        <div class="col-lg-2 my-auto">
                            <p class="my-auto">Nom de l'école</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-3">
                           <!-- <p  style="margin-top: 5px;margin-bottom:10px;color:red;">Champ obligatoire</p>-->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2 my-auto">
                            <p class="my-auto">Type</p>
                        </div>
                        <div class="col-lg-7">
                            <select  class="form-control">
                                <option value="" disabled selected>Selectionnez un type</option>
                                <option value="univ">Universitaire</option>
                                <option value="prof">Professionelle</option>
                                <option value="second">Secondaire</option>
                                <option value="moy">Moyenne</option>
                                <option value="pri">Primaire</option>
                                <option value="mat">Maternelle</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <!-- <p  style="margin-top: 5px;margin-bottom:10px;color:red;">Champ obligatoire</p>-->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2 my-auto">
                            <p class="my-auto">Wilaya</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-3">
                            <!-- <p  style="margin-top: 5px;margin-bottom:10px;color:red;">Champ obligatoire</p>-->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2 my-auto">
                            <p class="my-auto">Commune</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-3">
                            <!-- <p  style="margin-top: 5px;margin-bottom:10px;color:red;">Champ obligatoire</p>-->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2 my-auto">
                            <p class="my-auto">Adresse</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-3">
                            <!-- <p  style="margin-top: 5px;margin-bottom:10px;color:red;">Champ obligatoire</p>-->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2 my-auto">
                            <p class="my-auto">Téléphone</p>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-lg-3">
                            <!-- <p  style="margin-top: 5px;margin-bottom:10px;color:red;">Champ obligatoire</p>-->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 offset-6">
                            <button type="button" class="btn btn-primary w-100">Ajouter</button>
                        </div>
                    </div>
                </form>

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
                                <div class="col-lg-12">
                                    <div class="form" id="comment_form">
                                        <h5>Page des commentaires</h5>
                                        <textarea style="height: 75px;" class="form-control" type="text" placeholder="Entrez votre commentaire ici..."></textarea>
                                        <div class="col-lg-2 offset-10 mt-2 ">
                                            <button value="<?php echo $id_ecole ?>" class="btn btn-primary w-100 ml-3">Envoyer</button>
                                        </div>
                                    </div>
                                    <hr class="mb-0">
                                </div>
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
                                        <p class="card-text"><?php echo $comment['comment'];?></p>
                                    </div>
                                    <?php if ($_SESSION['is_employee']>0) { ?>
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
                                    <div id="school_comment1" class="container" style="max-height: 500px;overflow-y: scroll;">


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
                                    <div id="school_comment2" class="container" style="max-height: 500px;overflow-y: scroll;">


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
                $res=$res."<td>".$formation['type']."</td>";
                $res=$res."<td>".$formation['nom']."</td>";
                $res=$res."<td>".$formation['volume']."</td>";
                $res=$res."<td>".$formation['Tarifs']."</td>";
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

        public function showConnexMsg() {
            ?>
            <div id="content" class="ml-auto ">
                <div class="row">
                    <div class="col-lg-12" style="padding: 2% 5%">
                        <br>
                        <div class="row">
                            <div class="co-lg-6 ml-3">
                                <h2>Vous devez ètre connecté !!!</h2>

                            </div>
                            <div class="co-lg-6 ml-3">

                               <button type="button" data-toggle="modal" data-target="#cadre_connex" class="mr-auto w-100 btn btn-primary btn" id="conex_btn">Connexion</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php
        }

    }