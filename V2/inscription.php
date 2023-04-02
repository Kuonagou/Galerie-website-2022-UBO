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



  <title>Inscription</title>  

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
        <p>Bonne inscription !</p>

      </div>
      <ul class="nav">
        <!--<li><a href="./P_Apropos.php" title="">Notre Galerie</a></li>-->
        <li><a href="./galerie.php" title="">Galerie</a></li>
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
  <div class="col-xs-12">
    <div class="section-container-spacer"> <!--formulaire pour créer un compte organisateur-->
      <h1>Inscription</h1>
      <p>Cette page est réservé au organisateur et administrateur de cette exposition.</p>
    </div>

    <div class="section-container-spacer">
       <form action="action_insc.php" class="reveal-content" method="post">
          <div class="row">
            <div class="col-md-5">
              <h3>Créer mon compte organisateur/administrateur :</h3>
              <p>* Champs Obigatoires</p>
              <div class="form-group">
                <p>Nom *</p>
                <input type="text" class="form-control" name="nom" placeholder="Picard">
              </div>
              <div class="form-group">
                <p>Prenom *</p>
                <input type="text" class="form-control" name="prenom" placeholder="Thomas">
              </div>
              <div class="form-group">
                <p>Email *</p>
                <input type="email" class="form-control" name="email" placeholder="picard.thomas@gmail.com">
              </div>
              <div class="form-group">
                <p>Pseudo *</p>
                <input type="text" class="form-control" name="pseudo" placeholder="t_picard">
              </div>
              <div class="form-group">
                <p>Mot de Passe *</p>
                <input type="password" class="form-control" name="mdp" placeholder="expo_1458@">
              </div>
              <div class="form-group">
                <p>Confirmation Mot de Passe *</p>
                <input type="password" class="form-control" name="mdp2" placeholder="expo_1458@">
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Créer mon compte</button>
            </div>
          </div>
        </form>
    </div>
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