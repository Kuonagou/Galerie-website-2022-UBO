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



  <title>Action connexion</title>  

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
    <a href="./index.php" class="navbar-brand">La Couleur</a>
  </div>

  <nav class="sidebar">
    <div class="navbar-collapse" id="navbar-collapse">
      <div class="site-header hidden-xs">
          <a class="site-brand" href="./index.php" title="">
            <img class="img-responsive site-logo" alt="" src="./assets/images/mashup-logo.svg">
            La Couleur
          </a>
        <p>Bienvenue !</p>
      </div>
      <ul class="nav">
        <li><a href="./galerie.php" title="">Galerie</a></li>
        <li><a href="./index.php" title="">Accueil</a></li>
        <li><a href="./galerie_exposant.php" title="">Nos Exposants</a></li>
        <li><a href="./livredor.php" title="">Livre d'or</a></li>
        <li><a class="active" href="./connexion.php" title="">Connexion</a></li>
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

if($_POST){
  /*Affectation dans des variables du pseudo/mot de passe s'ils existent,affichage d'un message sinon*/
if ($_POST["pseudo"] && $_POST["mdp"]){ //récup mot de passe et pseudo
 $pseudo=htmlspecialchars(addslashes($_POST['pseudo']));
 $mdp=htmlspecialchars(addslashes($_POST['mdp']));

    $sql="SELECT CPT_PSEUDO,CPT_MDP FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO='$pseudo' and CPT_MDP=MD5('$mdp');";
    $result = $mysqli->query($sql); //verification que le compte associé au mot de passe existe 
      if($result!=false ){
        if($result->num_rows == 1){
          $sql1="SELECT PRO_VALIDE,PRO_ROLE FROM T_PROFIL_PRO WHERE CPT_PSEUDO='$pseudo'";
          $result1 = $mysqli->query($sql1); //recupèration role validite et donnée du profil associé au compte
          if($result1!=false ){
            $val=$result1->fetch_assoc();
            if($result1->num_rows == 1 && $val["PRO_VALIDE"]=='A'){ //connexion a admin_accueil
              //Mise à jour des données de la session
              $_SESSION['login']=$pseudo; 
              $_SESSION['role']=$val["PRO_ROLE"];
              $_SESSION['mdp']=$mdp;
              header("Location:admin_accueil.php");
            }
            else{
              ?> 
              <div class="col-xs-12 col-md-6">
              <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
              </div>
              <div class="col-xs-12 col-md-4 section-container-spacer">
                <h1><br></h1>
                <h1><br></h1>
              <p>Votre profil n'est pas activé</p>
              <p><a href="./connexion.php" class="btn btn-primary" title="">Retour vers connexion</a></p>
              <META http-equiv="refresh" content="5"; URL="connexion.php">
              </div><?php
            }
          }else{//seconde requête à échouer
            exit;
          }
        }else{
        // La requête a echoué
        ?> 
      <div class="col-xs-12 col-md-6">
              <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
              </div>
              <div class="col-xs-12 col-md-4 section-container-spacer">
                <h1><br></h1>
                <h1><br></h1>
              <p>Vous n'avez pas de compte chez nous !</p>
              <p><a href="./connexion.php" class="btn btn-primary" title="">Retour vers connexion</a></p>
              <META http-equiv="refresh" content="5"; URL="connexion.php">
              </div><?php
        }
      }
      else{  //redirection vers connexion 
      ?> 
      <div class="col-xs-12 col-md-6">
              <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
              </div>
              <div class="col-xs-12 col-md-4 section-container-spacer">
                <h1><br></h1>
                <h1><br></h1>
              <p>Il n'existe pas de compte avec ses indentifiants chez nous.</p>
              <p><a href="./connexion.php" class="btn btn-primary" title="">Retour vers connexion</a></p>
              <META http-equiv="refresh" content="5"; URL="connexion.php">
              </div><?php
      }
}
else{  //redirection vers connexion
      ?> 
      <div class="col-xs-12 col-md-6">
              <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
              </div>
              <div class="col-xs-12 col-md-4 section-container-spacer">
                <h1><br></h1>
                <h1><br></h1>
              <p>Le formulaire n'a pas été rempli correctement. Vous allez être redirigé, si cela n'as pas lieu cliquer sur le bouton ci-dessous</p>
              <p><a href="./connexion.php" class="btn btn-primary" title="">Retour vers connexion</a></p>
              <META http-equiv="refresh" content="5"; URL="connexion.php">
              </div><?php
}//fin
//Ferme la connexion avec la base MariaDB*/
$mysqli->close();
}
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