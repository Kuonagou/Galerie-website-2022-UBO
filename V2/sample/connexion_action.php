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



  <title>Action</title>  

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
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor.</p>
      </div>
      <ul class="nav">
        <!--<li><a href="./P_Apropos.php" title="">Notre Galerie</a></li>-->
        <li><a href="./galerie.php" title="">Galerie</a></li>
        <li><a href="./index.php" title="">Accueil</a></li>
        <li><a href="./P_exposants.php" title="">Nos Exposants</a></li>
        <li><a href="./livredor.php" title="">Livre d'or</a></li>
        <li><a href="./connexion.php" title="">Connexion</a></li>
      </ul>

      <nav class="nav-footer">
        <p class="nav-footer-social-buttons">
          <a class="fa-icon" href="https://www.instagram.com/" title="">
            <i class="fa fa-instagram"></i>
          </a>
          <a class="fa-icon" href="https://dribbble.com/" title="">
            <i class="fa fa-dribbble"></i>
          </a>
          <a class="fa-icon" href="https://twitter.com/" title="">
            <i class="fa fa-twitter"></i>
          </a>
        </p>
        <p> La Couleur | Website created by Anouk UBO |<a href="./inscription.php" title=""> Inscription</a></p>
      </nav>  
    </div> 
  </nav>
</header>
<main class="" id="main-collapse">

<div class="row">
<?php
$pseudo=htmlspecialchars(addslashes($_POST['pseudo']));
$mdp=htmlspecialchars(addslashes($_POST['mdp']));
$sql2="SELECT CPT_PSEUDO FROM T_COMPTEUTILISATEUR_CPT WHERE CPT_PSEUDO=$id or CPT_MDP=$mdp or CPT_PSEUDO='t_picard'";
$result5 = $mysqli->query($sql2);
if($result5==NULL && !$pseudo==NULL && !$mdp==NULL){

if ($result3 == false || $result4 == false) //Erreur lors de l’exécution de la requête
{
// La requête a echoué
echo "Un Problème est survenu de notre côté veuillez recommencer \n";
if ($result7 == false) //Erreur lors de l’exécution de la requête
{
// La requête a echoué
echo "Query: je ne fais pas le delete  " . $sql . "\n";
echo "Errno: " . $mysqli->errno . "\n";
echo "Error: " . $mysqli->error . "\n";
}
exit;
}
else //Requête réussie
{?>       <div class="col-xs-12 col-md-6">
          <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
          </div>
<div class="col-xs-12 col-md-4 section-container-spacer">
            <h1><br></h1>
            <h1><br></h1>
            <?php
echo "<br />";
echo "Inscription réussie !" . "\n";
?>
<p>Bonjour, <?php echo htmlspecialchars($_POST['nom']);?> <?php echo htmlspecialchars($_POST['prenom']); ?>.</p>
<p>Ta connexion à bien réussi ! Voivi les infos de ton compte <?php echo htmlspecialchars($_POST['email']); ?>.</p>
<p><a href="./index.php" class="btn btn-primary" title="">Retour vers l'accueil</a></p>
<META http-equiv="refresh" content="10; URL=index.php">
</div>
<?php
}
}
else {?>
          <div class="col-xs-12 col-md-6">
          <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
          </div>
          <div class="col-xs-12 col-md-4 section-container-spacer">
            <h1><br></h1>
            <h1><br></h1>
          <p>Le formulaire n'a pas été rempli correctement. Vous allez être redirigé, si cela n'as pas lieu cliquer sur le bouton ci-dessous</p>
          <p><a href="./inscription.php" class="btn btn-primary" title="">Retour vers inscription</a></p>
          <!--<META http-equiv="refresh" content="5; URL=inscription.php">-->
          </div>
  <?php
}
//Ferme la connexion avec la base MariaDB*/
$mysqli->close();
?>
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