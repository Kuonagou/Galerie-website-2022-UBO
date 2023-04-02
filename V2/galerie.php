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
  <meta content="Page description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  



  <title>Galerie</title>  

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
        <!--<li><a href="./P_Apropos.php" title="">Notre Galerie</a></li>-->
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

 
<div class="hero-full-wrapper">
  <h1>Nos Oeuvres </h1><br></br>
  <div class="grid">
  <div class="gutter-sizer"></div>
    <div class="grid-sizer"></div>
    <?php           
          $requete="select oeu_intitule, oeu_fichierimage,oeu_datecreation, oeu_code from T_OEUVRE_OEU;";
          $result1 = $mysqli->query($requete);// recup des infos sur les oeuvres

          if ($result1 == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
          }
          else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          {
            while ($oeu = $result1->fetch_assoc()) //affichage de la galerie des oeuvres
            {?>
              <div class="grid-item" method="post">
                <img class="img-responsive" alt="" src="<?php echo $oeu['oeu_fichierimage'];?>">
                <a href="./oeuvre.php?num=<?php echo $oeu['oeu_code'];?>" class="project-description">
                  <div class="project-text-holder">
                    <div class="project-text-inner">
                      <h3><?php echo $oeu['oeu_intitule'];?></h3>
                      <p>En savoir plus ...</p>
                    </div>
                  </div>
                </a>
              </div>
            <?php
            }
          }
          ?>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function (event) {
     masonryBuild();
  });
</script>

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

--><script type="text/javascript" src="./main.85741bff.js"></script></body>

</html>