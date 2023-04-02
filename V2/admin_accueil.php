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



  <title>Accueil Admin</title>  

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
        <p>Sur cette page vous pourez accéder aux données des comptes et profils .</p>
      </div>
      <ul class="nav">
        <li><a href="./admin_accueil.php" class="active" title="">Profils et Comptes</a></li>
        <li><a href="./admin_visiteur.php" title="">Visiteurs</a></li>
        <li><a href="./admin_modif.php" title="">Modifier mes données</a></li>
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
    $login=htmlspecialchars(addslashes($_SESSION['login']));
    $mdplogin=htmlspecialchars(addslashes($_SESSION['mdp']));

    $sql="SELECT CPT_PSEUDO,CPT_MDP FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO='$login' and CPT_MDP=MD5('$mdplogin');";
    $result = $mysqli->query($sql); //verification que le compte associé au mot de passe existe 
      if($result !=false ){
        if($result ->num_rows == 1){
        //vérifier que le pseudo et role existe dans la base
      
      if($_POST){  
        if(isset($_POST['quitter'])){ //deconnexion
          session_destroy();
          unset($_SESSION['login']);
          unset($_SESSION['role']);
          ?>
          <META http-equiv="refresh" content="0"; URL="connexion.php">
          <?php
        }
        else{
	        if(isset($_POST['newpseudo']) && isset($_POST['activ'])){ //activer désactiver un compte
	                $newpseudo=htmlspecialchars(addslashes($_POST['newpseudo'])); 
	                $activ=htmlspecialchars(addslashes($_POST['activ']));// on récupère D ou A
	                $requete4="UPDATE T_PROFIL_PRO set pro_valide='$activ' where cpt_pseudo='$newpseudo' ";  //requete activation desactivation du compte
	                $result4 = $mysqli->query($requete4);
	                if ($result4 == false) //Erreur lors de l’exécution de la requête
	                { // La requête a echoué
	                  echo "Error: Un problème est survenu de notre coté veuillez réessayer \n";
	                  exit();
	                }
	                else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
	                {
	                  header("Location:admin_accueil.php");
	                }
	        }
        }
      }
      else{         //si quelqu'un est bien connecter
              $pseudo=htmlspecialchars(addslashes($_SESSION['login']));        
              $requete="select cpt_pseudo, pro_nom, pro_prenom, pro_role, pro_valide, pro_mail, pro_datecreation from T_PROFIL_PRO natural join T_COMPTEUTILISATEUR_CPT where CPT_PSEUDO='$pseudo'";
              $result1 = $mysqli->query($requete); //requette info personne connectée

              $requete2="select cpt_pseudo, pro_nom, pro_prenom, pro_role, pro_valide, pro_mail, pro_datecreation from T_PROFIL_PRO natural join T_COMPTEUTILISATEUR_CPT";
              $result2 = $mysqli->query($requete2); //requette info tous les autres profil et comptes

              $requete3="select count( distinct cpt_pseudo) as nb from T_PROFIL_PRO natural join T_COMPTEUTILISATEUR_CPT";
              $result3 = $mysqli->query($requete3); //requette nombre profil et comptes
              if ($result1 == false and $result2 == false and $result3 == false) //Erreur lors de l’exécution de la requête
              { // La requête a echoué
                echo "Error: Un problème est survenu de notre coté veuillez réessayer \n";
                exit();
              }
              else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
              {
                $user = $result1->fetch_assoc();
                if (htmlspecialchars($_SESSION['role'])=='A'){//espace admin ?>
                          <div class="col-xs-12 section-container-spacer">
                          <h1>Espace Administrateur : </h1>
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
                          </table><?php
                            $nombre = $result3->fetch_assoc();?>
                            <p>Information sur les <?php echo $nombre['nb'];?> comptes :</p> 
                            <table class="table table-hover">
                              <tr>
                              <th>Pseudo</th>
                              <th>Nom</td>
                              <th>Prenom</th>
                              <th>Role</th>
                              <th>Date de création</th>
                              <th>Mail</th>
                              <th>Validité du profil</th>
                              </tr>
                              <?php
                            while ($info = $result2->fetch_assoc())
                            {?>
                              <tr>
                              <td><?php echo $info['cpt_pseudo'];?></td>
                              <td><?php echo $info['pro_nom'];?></td>
                              <td><?php echo $info['pro_prenom'];?></td>
                              <td><?php echo $info['pro_role'];?></td>
                              <td><?php echo $info['pro_datecreation'];?></td>
                              <td><?php echo $info['pro_mail'];?></td>
                              <td><?php echo $info['pro_valide'];?></td>
                              </tr>
                            <?php
                            }
                            ?>
                            </table>  
                          </div>

                          <div class="section-container-spacer">
                          <div class="row">
                          <div class="col-md-4">
                          <form action="admin_accueil.php" method="post">
                          <p>Activer au désactiver un profil</p>
                          <select name="newpseudo" class="form-control">
                            <?php
                            $resulta = $mysqli->query($requete2);
                            while ($choix = $resulta->fetch_assoc())
                            {?>
                               <option value="<?php echo $choix['cpt_pseudo']?>"><?php echo $choix['cpt_pseudo'];?></option>
                            <?php } ?>
                          </select>
                          <br>
                          <select name="activ" class="form-control">
                            <option value="A">Activé</option>
                            <option value="D">Désactivé</option>
                          </select>
                          <br>
                          <button type="submit" class="btn btn-primary btn-lg" style ="background-color: #77D5F2; border-color: #77D5F2">Valider</button>
                          </form>
                        </div></div></div><?php

               }
                else{ //espace organisateur
                            ?>
                              <div class="col-xs-12 section-container-spacer">
                              <h1>Espace Organisateur : </h1>
                              <h3> Bonjour <?php echo $pseudo;?> !</h3>
                              <p> Vos infos personnelles : </p>
                              <table class="table table-hover">
                              <tr>
                              <th>Pseudo</th>
                              <td><?php echo $user['cpt_pseudo'];?></td>
                              </tr>
                              <tr>
                              <th>Nom</td>
                              <td><?php echo $user['pro_nom'];?></td>
                              </tr>
                              <tr>
                              <th>Prenom</th>
                              <td><?php echo $user['pro_prenom'];?></td>
                              </tr>
                              <tr>
                              <th>Role</th>
                              <td><?php echo $user['pro_role'];?></td>
                              </tr>
                              <tr>
                              <th>Mail</th>
                              <td><?php echo $user['pro_mail'];?></td>
                              </tr>
                              <tr>
                              <th>Date de création</th>
                              <td><?php echo $user['pro_datecreation'];?></td>
                              </tr>
                              <tr>
                              <th>Validité du profil</th>
                              <td><?php echo $user['pro_valide'];?></td>
                              </tr>
                              </table></div><?php
                          } 
              }   
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