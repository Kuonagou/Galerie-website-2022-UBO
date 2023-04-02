<!DOCTYPE html>
<html lang="en">

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



  <title>Connexion</title>  

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
 <div class="row">
    <div class="section-container-spacer">
      <h1>Connexion</h1>
      <p>Cette page est réservé aux organisateur et administrateur et permet de se connecter au site.</p>
    </div>
  
    <div class="section-container-spacer">
       <form action="connexion_action.php" class="reveal-content" method="post">
          <div class="row">
            <div class="col-md-5"> <!-- formulaire de saisie de connection-->
              <h3>Me Connecter</h3>
              <p>* Champs Obigatoires</p>
              <div class="form-group">
                <p>Pseudo *</p>
                <input type="text" class="form-control" name="pseudo" placeholder="t_picard">
              </div>
              <div class="form-group">
                <p>Mot de Passe *</p>
                <input type="password" class="form-control" name="mdp" placeholder="expo_1458@">
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Me connecter</button>
            </div>
            <div class="col-md-7">
              <br>
            <img class="img-responsive" alt="" src="https://images.france.fr/zeaejvyq9bhj/1prH99ZQJ4IpfO1xePlCul/65ec17da2e725707fd238321b3b59ee3/undefined?w=1120&h=490&q=70&fl=progressive&fit=fill">
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