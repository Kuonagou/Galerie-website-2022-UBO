<!DOCTYPE html>
<html lang="en">

<?php $mysqli = new mysqli('your own database information'); //connexion base de données
    if ($mysqli->connect_errno)
    {
    // Affichage d'un message d'erreur
    echo "Error: Problème de connexion à la BDD \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    // Arrêt du chargement de la page
    exit();
    }?>
<?php 
if(isset($_GET['num'])){ //récupe du numéro d'oeuvre
  $oeu_num=$_GET['num'];
  }
  else {
  echo ("Vous avez oublié le paramètre !");
  exit();
}
?>

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

  <title>Oeuvre</title>  

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
        <p>Nos Oeuvres !</p>
      </div>
      <ul class="nav">
        <li><a class="active" href="./galerie.php" title="">Galerie</a></li>
        <li><a href="./index.php" title="">Accueil</a></li>
        <li><a href="./galerie_exposant.php" title="">Nos Exposants</a></li>
        <li><a href="./livredor.php" title="">Livre d'or</a></li>
        <li><a href="./connexion.php" title="">Connexion</a></li>
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


<div class="row">
  <div class="col-xs-12 col-md-8">

    <?php           
          $requete="select oeu_intitule, oeu_code, oeu_datecreation, oeu_fichierimage, oeu_description from T_OEUVRE_OEU natural join TJ_PRESNTE_PRE natural join T_EXPOSANT_EXP where oeu_code=".$oeu_num; // requete info oeuvres
          $requete1="select exp_nom, exp_prenom, exp_num from T_OEUVRE_OEU natural join TJ_PRESNTE_PRE natural join T_EXPOSANT_EXP where oeu_code=".$oeu_num; // requettes nom des exposant
          $requete2="select count(exp_nom) as nb from T_OEUVRE_OEU natural join TJ_PRESNTE_PRE natural join T_EXPOSANT_EXP where oeu_code=".$oeu_num; //requette pour le nombre d'exposant
          $result = $mysqli->query($requete);
          $result1 = $mysqli->query($requete1);
          $result2 = $mysqli->query($requete2);
          if ($result1 == false and $result == false and $result2 == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
          echo "Error: Problème lors de la requette\n";
          exit();
          }
          else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          {
          $expnb = $result2->fetch_assoc();
            if($expnb['nb'] == 1 ){ //si un seul exposant
              $oeu = $result->fetch_assoc();
              $exp = $result1->fetch_assoc();
              ?>
              <div class="section-container-spacer"> <!-- affichage image intitulé et description-->
                  <h1><?php echo $oeu['oeu_intitule'];?></h1>
                  <p><img class="img-responsive" alt="" src="<?php echo $oeu['oeu_fichierimage'];?>"></p>
                  <p><?php echo $oeu['oeu_description'];?></p>
                </div>

              <p>Cette oeuvre vous sera présenté lors de notre exposition par
              <a href="./exposant.php?expnum=<?php echo $exp['exp_num'];?>"><?php echo $exp['exp_nom'];?> <?php echo $exp['exp_prenom'];?>.</a></p>
              <div class="section-container-spacer">
                <p>Date de création : <?php echo $oeu['oeu_datecreation'];?></p>
              </div> 
              <?php //affichage de exposant l'exposant et date de creation oeuvre
            }
            else{ //si plusieurs exposants oeuvre collective
              $oeu = $result->fetch_assoc()
              ?>
              <div class="section-container-spacer">
                  <h1><?php echo $oeu['oeu_intitule'];?></h1>
                  <p><img class="img-responsive" alt="" src="<?php echo $oeu['oeu_fichierimage'];?>"></p>
                  <p><?php echo $oeu['oeu_description'];?></p>
                </div>

              <p>Cette oeuvre vous sera présenté lors de notre exposition par les artiste(s) suivant :</p>
              <?php
              while($exp = $result1->fetch_assoc()){
              ?>
                <p><a href="./exposant.php?expnum=<?php echo $exp['exp_num'];?>"><?php echo $exp['exp_nom'];?> <?php echo $exp['exp_prenom'];?>.</a></p>
            <?php    
            }?>
            <div class="section-container-spacer">
                <p>Date de publication : <?php echo $oeu['oeu_datecreation'];?></p>
              </div>
          <?php
          }
          }
          ?>
            
  </div>
  
</div>
    


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