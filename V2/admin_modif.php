<!DOCTYPE html>
<html lang="en">

<?php $mysqli = new mysqli('your own database information');
    if ($mysqli->connect_errno)
    {
    // Affichage d'un message d'erreur
    echo "Error: Problème de connexion à la BDD \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    // Arrêt du chargement de la page
    exit();
    }?>


<head>
  <script src="https://kit.fontawesome.com/46cf2896e2.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  <link href="./assets/apple-icon-180x180.png" rel="apple-touch-icon">
  <link href="./assets/favicon.ico" rel="icon">



  <title>Modifier mon profil</title>  

<link href="./main.82cfd66e.css" rel="stylesheet"></head>

<body>

 <!-- Add your content of header -->
<header class="">
  <div class="navbar navbar-default visible-xs">
    <button type="button" class="navbar-toggle collapsed">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="./admin_accueil.php" class="navbar-brand">La Couleur</a>
  </div>

  <nav class="sidebar">
    <div class="navbar-collapse" id="navbar-collapse">
      <div class="site-header hidden-xs">
          <a class="site-brand" href="./admin_accueil.php" title="">
            <img class="img-responsive site-logo" alt="" src="./assets/images/mashup-logo.svg">
            La Couleur
          </a>
        <p>Sur cette page vous pourez modifier vos données.</p>
      </div>
      <ul class="nav">
        <li><a href="./admin_accueil.php" title="">Profils et Comptes</a></li>
        <li><a href="./admin_visiteur.php" title="">Visiteurs</a></li>
        <li><a href="./admin_modif.php" class="active" title="">Modifier mes données</a></li>
        <li><form action="admin_accueil.php" method="post"><br><button type="submit" class="btn-link" name="quitter" >Déconnexion</button></form></li>
      </ul>

      <nav class="nav-footer">
        <p class="nav-footer-social-buttons">
          <a class="fa-icon" title="">
            <i class="fa-solid fa-palette"></i>
          </a>
          <a class="fa-icon" title="">
            <i class="fa-solid fa-paint-roller"></i>
          </a>
          <a class="fa-icon"  title="">
            <i class="fa-solid fa-brush"></i>
          </a>
        </p>
        <p> La Couleur | Website created by Anouk UBO</p>
      </nav>  
    </div> 
  </nav>
</header>

<main class="" id="main-collapse">
<?php 
session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role']) || !isset($_SESSION['mdp'])){
//Si la session n'est pas ouverte, redirection vers la page du formulaire
header("Location:connexion.php");
}
else{
  $pseudo=htmlspecialchars(addslashes($_SESSION['login'])); //récup du pseuso connecté 

  $login=htmlspecialchars(addslashes($_SESSION['login']));
  $mdplogin=htmlspecialchars(addslashes($_SESSION['mdp']));

    $sql="SELECT CPT_PSEUDO,CPT_MDP FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO='$login' and CPT_MDP=MD5('$mdplogin');";
    $result = $mysqli->query($sql); //verification que le compte associé au mot de passe existe 
      if($result !=false ){
        if($result ->num_rows == 1){
      if($_POST){
        if(isset($_POST['quitter'])){//quitter
          session_destroy();
          unset($_SESSION['login']);
          unset($_SESSION['role']); //deconnexion
          ?>
          <META http-equiv="refresh" content="0"; URL="connexion.php">
          <?php
        }
        else{
    	    if(isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['mdp1']) && isset($_POST['prenom'])){//changer données de mon profil
            $nom=htmlspecialchars(addslashes($_POST['nom'])); 
            $prenom=htmlspecialchars(addslashes($_POST['prenom']));
            $mail=htmlspecialchars(addslashes($_POST['mail']));
            $mdp1=htmlspecialchars(addslashes($_POST['mdp1']));
            $requete8="SELECT CPT_PSEUDO,CPT_MDP FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO='$pseudo' and CPT_MDP=MD5('$mdp1');";//mot de passe conforme à celui du profil
            $result8 = $mysqli->query($requete8);
            if($result8!=false and $result8->num_rows ==1){ //si le mot de passe du compte est correct
            	  $requete9="UPDATE T_PROFIL_PRO set pro_nom='$nom',pro_prenom='$prenom', pro_mail='$mail' where cpt_pseudo='$pseudo' ";  //requette de changement des données 
            	  $result9 = $mysqli->query($requete9);
            	  if ($result9 == false){ //Erreur lors de l’exécution de la requête
            	    echo "Error: Un problème est survenu de notre coté veuillez réessayer \n";
            	    exit();
            	  }
            	  else {//La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
            	    header("Location:admin_modif.php");
            	  }
            }
            else{//mot de passe saisie est non valide pour ce profil
              ?> 
              <div class="col-xs-12 col-md-6">
              <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
              </div>
              <div class="col-xs-12 col-md-4 section-container-spacer">
              <h1><br></h1>
              <h1><br></h1>
              <p>Le mot de passe saisit n'est pas valide.</p>
              <p><a href="./admin_modif.php" class="btn btn-primary" title="">Retour vers modification</a></p>
              <META http-equiv="refresh" content="5"; URL="admin_modif.php">
              </div><?php
            }
    	    }
          else{//le fais de pouvoir modifier le pseudo demande de changer toutes les données exposant vis et autre de cet utilisateur avec le nouveau pseudo ce qui est faisable mais pas aujourd'hui (besoin de plus de temps)
           if(isset($_POST['pseudoancien']) && isset($_POST['newpseudo']) && isset($_POST['newpseudo1'])){//changer pseudo
            /*$pseudoancien=htmlspecialchars(addslashes($_POST['pseudoancien'])); 
              $newpseudo1=htmlspecialchars(addslashes($_POST['newpseudo1']));
              $newpseudo=htmlspecialchars(addslashes($_POST['newpseudo']));
              if($newpseudo1==$newpseudo){ 
                if($pseudo==$pseudoancien){
                    $requete7="UPDATE T_COMPTEUTILISATEUR_CPT set CPT_PSEUDO='$newpseudo' where cpt_pseudo='$pseudo' "; 
                    $result7 = $mysqli->query($requete7); //requette info tous les autres profil et comptes
                    if ($result7 == false){ //Erreur lors de l’exécution de la requête
                      echo "Error: Un problème est survenu de notre coté veuillez réessayer \n";
                      exit();
                    }
                    else {//La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                      header("Location:admin_modif.php");
                    }
                }
                else{//mauvais pseudo actuel ?> 
                  <div class="col-xs-12 col-md-6">
                  <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
                  </div>
                  <div class="col-xs-12 col-md-4 section-container-spacer">
                  <h1><br></h1>
                  <h1><br></h1>
                  <p>Votre pseudo actuel n'est pas valide.</p>
                  <p><a href="./admin_modif.php" class="btn btn-primary" title="">Retour vers modification</a></p>
                  <META http-equiv="refresh" content="5"; URL="admin_modif.php">
                  </div><?php
                }
              }
              else{//pseudo non identiques ?>
                <div class="col-xs-12 col-md-6">
                <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
                </div>
                <div class="col-xs-12 col-md-4 section-container-spacer">
                <h1><br></h1>
                <h1><br></h1>
                <p>Votre nouveau pseudo et sa confirmation ne sont pas identiques.</p>
                <p><a href="./admin_modif.php" class="btn btn-primary" title="">Retour vers modification</a></p>
                <META http-equiv="refresh" content="5"; URL="admin_modif.php">
                </div><?php
              }*/
            }
            else{//changer de mot de passe
              if(isset($_POST['mdpancien']) && isset($_POST['mdpnew1']) && isset($_POST['mdpnew'])){//changer mot de passe
                $ancienmdp=htmlspecialchars(addslashes($_POST['mdpancien'])); 
                $new1=htmlspecialchars(addslashes($_POST['mdpnew1']));
                $new=htmlspecialchars(addslashes($_POST['mdpnew']));
                $requete5="SELECT CPT_PSEUDO,CPT_MDP FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO='$pseudo' and CPT_MDP=MD5('$ancienmdp');"; //requete vérifiant si le mot de passe actuel est le bon
                $result5 = $mysqli->query($requete5);
                if($new1==$new){ 
                  if($result5!=false and $result5->num_rows == 1){
                    $requete6="UPDATE T_COMPTEUTILISATEUR_CPT set cpt_mdp= md5('$new') where cpt_pseudo='$pseudo' ";  //changement de mot de passe
                    $result6 = $mysqli->query($requete6);
                    if ($result6 == false){ //Erreur lors de l’exécution de la requête
                      echo "Error: Un problème est survenu de notre coté veuillez réessayer \n";
                      exit();
                    }
                    else {//La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                      header("Location:admin_modif.php");
                    }
                  }
                  else{//mauvais ancien mot de passe ?>
                    <div class="col-xs-12 col-md-6">
                    <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
                    </div>
                    <div class="col-xs-12 col-md-4 section-container-spacer">
                    <h1><br></h1>
                    <h1><br></h1>
                    <p>Votre mot de passe actuel n'est pas valide.</p>
                    <p><a href="./admin_modif.php" class="btn btn-primary" title="">Retour vers modification</a></p>
                    <META http-equiv="refresh" content="5"; URL="admin_modif.php">
                    </div><?php 
                  }
                }
                else{//mot de passe non identiques ?>
                  <div class="col-xs-12 col-md-6">
                  <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
                  </div>
                  <div class="col-xs-12 col-md-4 section-container-spacer">
                  <h1><br></h1>
                  <h1><br></h1>
                  <p>Le nouveau mot de passe et sa confirmation ne sont pas identiques.</p>
                  <p><a href="./admin_modif.php" class="btn btn-primary" title="">Retour vers modification</a></p>
                  <META http-equiv="refresh" content="5"; URL="admin_modif.php">
                  </div><?php
                }
              }
            }
          }
        }
      }
      else{         //si quelqu'un est bien connecter       
                  $requete="select cpt_pseudo, pro_nom, pro_prenom, pro_role, pro_valide, pro_mail, pro_datecreation from T_PROFIL_PRO natural join T_COMPTEUTILISATEUR_CPT where CPT_PSEUDO='$pseudo'";
                  $result1 = $mysqli->query($requete); //requette info personne connectée
                  if ($result1 == false ) //Erreur lors de l’exécution de la requête
                  { // La requête a echoué
                    echo "Error: Un problème est survenu de notre coté veuillez réessayer \n";
                    exit();
                  }
                  else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                  {
                    $user = $result1->fetch_assoc();?>
                    <div class="col-xs-12 section-container-spacer">
                          <h3> Bonjour <?php echo $pseudo;?> !</h3>
                            <p> Vos infos personnelles : </p>
                              <table class="table table-hover">
                              <tr>
                              <th>Pseudo</th>
                              <th>Nom</td>
                              <th>Prenom</th>
                              <th>Role</th>
                              <th>Date de création</th>
                              <th>Mail</th>
                              <th>Validité du profil<th>
                              </tr>
                              <tr>
                              <td><?php echo $user['cpt_pseudo'];?></td>
                              <td><?php echo $user['pro_nom'];?></td>
                              <td><?php echo $user['pro_prenom'];?></td>
                              <td><?php echo $user['pro_role'];?></td>
                              <td><?php echo $user['pro_datecreation'];?></td>
                              <td><?php echo $user['pro_mail'];?></td>
                              <td><?php echo $user['pro_valide'];?></td>
                              </tr>
                              </table>

                              <div class="section-container-spacer"> <!-- formulaire modif données -->
                              <div class="row">
                              <h3>Modifier mes données</h3>
                              <p>Modifiez les champs que vous souhaitez puis tapez votre mot de passe et confirmer le.</p>
                              <div class="col-md-5">
                              <form action="admin_modif.php" method="post">
                              <div class="form-group">
                                <p>Nom</p>
                                <input type="text" class="form-control" name="nom" value="<?php echo $user['pro_nom'];?>">
                              </div>
                              <div class="form-group">
                                <p>Prenom</p>
                                <input type="text" class="form-control" name="prenom" value="<?php echo $user['pro_prenom'];?>">
                              </div>
                              </div>
                              <div class="col-md-5">
                              <div class="form-group">
                                <p>Mail</p>
                                <input type="email" class="form-control" name="mail" value="<?php echo $user['pro_mail'];?>">
                              </div>
                              <div class="form-group">
                                <p>Mot de Passe</p>
                                <input type="password" class="form-control" name="mdp1" placeholder="Veuillez saisir votre mot de passe">
                              </div>
                                <button type="submit" class="btn btn-primary btn-lg" style ="background-color: #77D5F2; border-color: #77D5F2">Valider</button>
                              </form>
                            </div></div></div>

                    <!--  <div class="section-container-spacer">--> <!-- formulaire modif pseudo en cours de construction --> <!--
                              <div class="row">
                              <div class="col-md-5">
                                <h3>Modifier mon pseudo</h3>
                              <form action="admin_modif.php" method="post">
                              <div class="form-group">
                                <p>Ancien pseudo</p>
                                <input type="text" class="form-control" name="pseudoancien" value="<?php // echo $user['cpt_pseudo'];?>">
                              </div>
                              <div class="form-group">
                                <p>Nouveau pseudo</p>
                                <input type="text" class="form-control" name="newpseudo">
                              </div>
                              <div class="form-group">
                                <p>Confirmation du nouveau pseudo</p>
                                <input type="text" class="form-control" name="newpseudo1">
                              </div>
                                <button type="submit" class="btn btn-primary btn-lg" style ="background-color: #77D5F2; border-color: #77D5F2">Valider</button>
                              </div></form>
                              <div class="col-md-1">
                                <br>
                              </div>-->
                              <div class="col-md-5">
                              <h3>Modifier mon mot de passe</h3> <!-- formulaire modif mot de passe-->
                              <form action="admin_modif.php" method="post">
                              <div class="form-group">
                                <p>Ancien mot de passe</p>
                                <input type="text" class="form-control" name="mdpancien">
                              </div>
                              <div class="form-group">
                                <p>Nouveau mot de passe</p>
                                <input type="password" class="form-control" name="mdpnew">
                              </div>
                              <div class="form-group">
                                <p>Confirmation du nouveau mot de passe</p>
                                <input type="password" class="form-control" name="mdpnew1">
                              </div>
                                <button type="submit" class="btn btn-primary btn-lg" style ="background-color: #77D5F2; border-color: #77D5F2">Valider</button>
                              </div></form>
                            </div></div></div>


                              <?php } 
                  }
              }}       
      }
$mysqli->close();
 ?>    
</main>

<script>
document.addEventListener("DOMContentLoaded", function (event) {
  navbarToggleSidebar();
  navActivePage();
});
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID 

<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>

--> <script type="text/javascript" src="./main.85741bff.js"></script></body>

</html>