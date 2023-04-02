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



  <title>Visiteurs gestion</title>  

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
        <p>Un petit tour du coté des visiteurs.</p>
      </div>
      <ul class="nav">
        <li><a href="./admin_accueil.php" title="">Profils et Comptes</a></li>
        <li><a href="./admin_visiteur.php" class="active" title="">Visiteurs</a></li>
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

<?php
    function passgen2($nbChar){ //fonction pour créer un mot de passe aléatoire
    return substr(str_shuffle(
'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789$#&'),1, $nbChar); }
    //si que des chiffres juste supprimer les lettres et ça marchera pareil
   // echo passgen2(10); //exemple d'utilisation?> 

<main class="" id="main-collapse">
<?php 
  session_start();
  if(!isset($_SESSION['login']) || !isset($_SESSION['role'])){
  //Si la session n'est pas ouverte, redirection vers la page du formulaire de connexion
  header("Location:connexion.php");
  }
  else{ //si la session est ouverte je récupère de pseudo de la personne connecter
      $pseudo=htmlspecialchars(addslashes($_SESSION['login'])); 

      $login=htmlspecialchars(addslashes($_SESSION['login']));
      $mdplogin=htmlspecialchars(addslashes($_SESSION['mdp']));

    $sql="SELECT CPT_PSEUDO,CPT_MDP FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO='$pseudo' and CPT_MDP=MD5('$mdplogin');";
    $result = $mysqli->query($sql); //verification que le compte associé au mot de passe existe 
      if($result !=false ){
        if($result ->num_rows == 1){
          if($_POST){
            if(isset($_POST['quitter'])){ //gestion de la déconnexion
              session_destroy();
              unset($_SESSION['login']);
              unset($_SESSION['role']);
              ?>
              <META http-equiv="refresh" content="0"; URL="connexion.php">
              <?php
            }
        else{
          if(isset($_POST['visnum'])){ //suppression des données du visiteurs
                  $visnum=htmlspecialchars(addslashes($_POST['visnum'])); //recup du num visiteurs
                  $requete9="SELECT vis_num FROM T_VISITEUR_VIS WHERE vis_mail is NULL and vis_num=$visnum;";
                  $result9 = $mysqli->query($requete9);
                  if($result9 != false and $result9->num_rows == 1){
                      $requete5="DELETE FROM T_VISITEUR_VIS WHERE VIS_NUM = $visnum;";//supression des données du profil
                      $result5 = $mysqli->query($requete5);
                      if ($result5 == false) //Erreur lors de l’exécution de la requête
                      { // La requête a echoué
                        echo "Error: Un problème est survenu de notre coté veuillez réessayer suppression ticket vis \n";
                        exit();
                      }
                      else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                      {
                        header("Location:admin_visiteur.php");
                      }
                  }
                  else{
                    $requete4="DELETE FROM T_COMMENTAIRE_COM WHERE VIS_NUM = $visnum;"; //supression du commentaire

                    $requete5="DELETE FROM T_VISITEUR_VIS WHERE VIS_NUM = $visnum;"; //supression des données du profil
                    $result4 = $mysqli->query($requete4);
                    $result5 = $mysqli->query($requete5);
                    if ($result4 == false && $result5 == false) //Erreur lors de l’exécution de la requête
                    { // La requête a echoué
                      echo "Error: Un problème est survenu de notre coté veuillez réessayer suppression com + ticket \n";
                      exit();
                    }
                    else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                    {
                      header("Location:admin_visiteur.php");
                    }
                  }
          }
          else{
              if(isset($_POST['com']) && isset($_POST['etat'])){ //desactivé/activé commentaire
                  $com=htmlspecialchars(addslashes($_POST['com'])); //recupération des champs num com
                  $etat=htmlspecialchars(addslashes($_POST['etat']));//P ou C
                  $requete6="UPDATE T_COMMENTAIRE_COM set com_etat='$etat' WHERE VIS_NUM ='$com';";//changement d'état du commentaire
                  $result6 = $mysqli->query($requete6);
                  if ($result6 == false) //Erreur lors de l’exécution de la requête
                  { // La requête a echoué
                    echo "Error: Un problème est survenu de notre coté veuillez réessayer changement etat\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit();
                  }
                  else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                  {
                    header("Location:admin_visiteur.php");
                  }
              }
              else{
                  if(isset($_POST['vispseudo']) && isset($_POST['vismdp'])){ //création d'un nouveau ticket visiteurs
                  $visp=htmlspecialchars(addslashes($_POST['vispseudo'])); //recupération pseudo
                  $vism=htmlspecialchars(addslashes($_POST['vismdp'])); // recupération mdp
                  $requete8="SELECT CPT_PSEUDO,CPT_MDP FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO='$visp' and CPT_MDP=MD5('$vism');"; //vérification que le compte existe bien
                  $result8 = $mysqli->query($requete8);
                  if($result8 != false and $result8->num_rows ==1 ){ // si le compte existe
                      $mdprandom=passgen2(15);// création mdp //possibilité de vérifié si le new mdp n'est pas déjà utilisé
                      $requete7="INSERT INTO T_VISITEUR_VIS VALUES (NULL,'$mdprandom', current_timestamp(), NULL, NULL, NULL, '$visp');";//création du ticket
                      $result7 = $mysqli->query($requete7);
                      if ($result7 == false) //Erreur lors de l’exécution de la requête
                      { // La requête a echoué
                        echo "Error: Un problème est survenu de notre coté veuillez réessayer changement etat\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                      }
                      else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                      {
                        header("Location:admin_visiteur.php");
                      }
                }
                else{//pas de concordance pseudo mdp
                  ?> 
                  <div class="col-xs-12 col-md-6">
                  <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
                  </div>
                  <div class="col-xs-12 col-md-4 section-container-spacer">
                  <h1><br></h1>
                  <h1><br></h1>
                  <p>Il n'existe pas de compte chez nous avec ce pseudo et ce mot de passe</p>
                  <p><a href="./admin_visiteur.php" class="btn btn-primary" title="">Retour vers gestion des visiteurs</a></p>
                  <META http-equiv="refresh" content="5"; URL="admin_visiteur.php">
                  </div><?php
                }
              }

            }
        }
      }
    }
      else{ //si quelqu'un est bien connecté       
              $requete="select vis_num, vis_dateheure, cpt_pseudo, com_dateheure, com_etat, vis_mail,vis_prenom,vis_nom, com_num, com_text, vis_mdp from T_VISITEUR_VIS left outer join T_COMMENTAIRE_COM using (vis_num) order by com_num, vis_num;"; 
              $result = $mysqli->query($requete); //requette info visiteur avec un commentaire
              if ($result == false) //Erreur lors de l’exécution de la requête
              { // La requête a echoué
                echo "Error: Un problème est survenu de notre coté veuillez réessayer \n";
                exit();
              }
              else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
              {?>

                            <div class="col-xs-12 section-container-spacer">
                            <h1>Visiteurs et commentaires</h1> 
                            <table class="table table-hover">
                              <tr>
                              <th>Numéro</th>
                              <th>Mot de passe du ticket</th>
                              <th>Date et heure</th>
                              <th>Pseudo créateur</th>
                              <th>Numéro commentaire</th>
                              <th>Texte du commentaire</th>
                              <th>Mail</th>
                              <th>Nom Prenom</th>
                              <th>Date et heure commentaire</th>
                              <th>Etat</th>
                              </tr>
                              <?php
                            while ($com = $result->fetch_assoc())
                            {?>
                              <tr>
                              <td height="150px"><?php echo $com['vis_num'];?></td>
                              <td><?php echo $com['vis_mdp'];?></td>
                              <td><?php echo $com['vis_dateheure'];?></td>
                              <td><?php echo $com['cpt_pseudo'];?></td>
                              <td><?php echo $com['com_num'];?></td>
                              <td><?php echo $com['com_text'];?></td>
                              <td><?php echo $com['vis_mail'];?></td>
                              <td><?php echo $com['vis_nom'];?> <?php echo $com['vis_prenom'];?></td>
                              <td><?php echo $com['com_dateheure'];?></td>
                              <td><?php echo $com['com_etat'];?></td>
                              </tr>
                            <?php
                            }
                            ?>
                            </table>  
                          </div>

              <div class="section-container-spacer">
                 <div class="row">
                    <div class="col-md-4">
                          <h3>Créer un ticket visiteur</h3> <!-- formulaire en charge de la création d'un ticket -->
                          <br>
                          <form action="admin_visiteur.php" method="post">
                          <div class="form-group">
                            <input type="text" class="form-control" name="vispseudo" value="<?php echo $pseudo; ?>">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" name="vismdp" placeholder="Votre mot de passe">
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg" style ="background-color: #77D5F2; border-color: #77D5F2">Créer</button>
                          </div></form>

                    <div class="col-md-4">
                          <form action="admin_visiteur.php" method="post">
                          <h3>Supprimer les données d'un visiteur</h3> <!-- formulaire en charge de la suppression des données d'un visiteur -->
                          <select name="visnum" class="form-control">
                            <?php
                            $resulta = $mysqli->query($requete);
                            while ($choix = $resulta->fetch_assoc())
                            {?>
                               <option value="<?php echo $choix['vis_num']?>"><?php echo $choix['vis_num'];?></option>
                            <?php } ?> <!-- formulaire à choix multiple des numéros des tickets -->
                          </select>
                          <br>
                          <br>
                          <br>
                          <button type="submit" class="btn btn-primary btn-lg" style ="background-color: #77D5F2; border-color: #77D5F2">Supprimer</button>
                          </form>
                        </div>
                        <div class="col-md-4">
                          <form action="admin_visiteur.php" method="post">
                          <h3>Afficher ou cacher un commentaire</h3> <!-- formulaire en charge de l'affichage ou non du commentaire -->
                          <select name="com" class="form-control">
                            <?php
                            $resultat = $mysqli->query($requete);
                            while ($etat = $resultat->fetch_assoc())
                            {?>
                               <option value="<?php echo $etat['vis_num'];?>"><?php echo $etat['vis_num'];?></option>
                            <?php } ?> <!-- formulaire à choix multiples des numéros des tickets -->
                          </select>
                          <br>
                          <select name="etat" class="form-control">
                               <option value="P">P</option>
                               <option value="C">C</option>
                          </select>
                          <br>
                          <button type="submit" class="btn btn-primary btn-lg" style ="background-color: #77D5F2; border-color: #77D5F2">Changer</button>
                          </form></div></div></div>
<?php                        
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